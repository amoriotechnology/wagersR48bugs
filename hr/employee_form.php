<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <i class="pe-7s-note2"></i>
      </div>
      <div class="header-title">
         <h1 id="headpartemployeeadd"><?php echo ('Add Employee') ?></h1>
         <h1 id="headpartsalespartner" style="display: none;"><?php echo ('Add Sales Partner') ?></h1>
         <small></small>
         <ol class="breadcrumb">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('hrm') ?></a></li>
            <li class="active" style="color:orange display: none;"><?php echo html_escape($title) ?></li>
         </ol>
      </div>
   </section>
   <style>
      .popup label{
      color:white;
      }
      .popup {
      border-top-right-radius: 20px;
      border-bottom-left-radius: 20px;
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border: 1px solid #000;
      padding: 20px;
      background-color: #fff;
      z-index: 9999;
      width: 90%;
      max-width: 800px;
      box-sizing: border-box;
      }
      .popup .row {
      margin-top: 10px;
      }
      .popup .col-sm-6 {
      width: 50%;
      box-sizing: border-box;
      }

      .popupsalespartner label{
      color:white;
      }
      .popupsalespartner {
      border-top-right-radius: 20px;
      border-bottom-left-radius: 20px;
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border: 1px solid #000;
      padding: 20px;
      background-color: #fff;
      z-index: 9999;
      width: 90%;
      max-width: 800px;
      box-sizing: border-box;
      }
      .popupsalespartner .row {
      margin-top: 10px;
      }
      .popupsalespartner .col-sm-6 {
      width: 50%;
      box-sizing: border-box;
      }
      input[type=number]::-webkit-inner-spin-button, 
      input[type=number]::-webkit-outer-spin-button { 
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      margin: 0; 
      }
      .select2-selection{
      display:none;
      }
      .btnclr{
      background-color:<?php echo $setting_detail[0]['button_color']; ?>;
      color: white;
      }
      .ui-selectmenu-text{
      display:none;
      }
   </style>
   <!-- New Employee Type -->
   <!-- <div class="row"> -->
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading">
            <div class="panel-title" style="height:35px;">
                <div class="panel-title form_employee"  style="float:left ;">
                  <div class="row"> 
                     <div class="col-md-6">
                        <label for="ISF" class="col-form-label" style="font-size: 14px; margin-top: 7px;"><?php echo('Select Employee / Sales Partner');?>
                        <i class="text-danger">*</i>
                        </label>
                     </div>
                     <div class="col-md-6">
                        <select class="form-control" id="selectemployeeTypes" required>
                           <option value="">Select Employee / Sales Partner</option>
                           <option value="addEmployees">Employee</option>
                           <option value="salesPartner">Sales Partner</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="panel-title form_employee"  style="float:right ;">
                  <a href="<?php echo base_url('Chrm/manage_employee') ?>"   style="color:white;"    class="btnclr btn"><i class="ti-align-justify"> </i> Manage Employee </a>
               </div>
            </div>
         </div>
         <!-- Create Employee -->
         <div class="panel-body" id="employeeForms" style="display: none;">
            <?php //echo form_open('Chrm/employee_create', array('onsubmit' => 'return validateForm()')); ?>
            <?php echo form_open_multipart('Chrm/employee_create',array('onsubmit' => 'return validateForm()') ) ?>
            <div class="row">
               <!-- Left Side -->
               <div class="col-sm-6">
                  <div class="form-group row">
                     <label for="first_name" class="col-sm-4 col-form-div"><?php echo display('first_name') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-8">
                        <input name="first_name" class="form-control" type="text" placeholder="<?php echo display('first_name') ?>" required oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="middle_name" class="col-sm-4 col-form-div"><?php echo "Middle Name"; ?></label>
                     <div class="col-sm-8">
                        <input name="middle_name" class="form-control" type="text" placeholder="<?php echo "Middle Name"; ?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="last_name" class="col-sm-4 col-form-div"><?php echo display('last_name') ?><i class="text-danger">*</i></label>
                     <div class="col-sm-8">
                        <input name="last_name" class="form-control" type="text" placeholder="<?php echo display('last_name') ?>" required oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                     </div>
                  </div>
                  <div class="form-group row" id="designation">
                     <label for="designation" class="col-sm-4 col-form-label"> <?php echo display('designation') ?> <i class="text-danger">*</i> </label>
                     <div class="col-sm-7">
                        <select name="designation"  id="desig"  class="form-control" style="width: 100%;"required>
                           <option value="">Select Designation</option>
                           <?php  foreach($desig as $ds){ ?>
                           <option value="<?php  echo $ds['designation'] ;?>"><?php  echo $ds['designation'] ;?></option>
                           <?php  } ?>
                        </select>
                     </div>
                     <div class="col-sm-1">
                        <a  class="btnclr client-add-btn btn" aria-hidden="true"   data-toggle="modal" data-target="#designation_modal" ><i class="fa fa-plus"></i></a>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="phone" class="col-sm-4 col-form-div"><?php echo display('phone') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-8">
                        <input name="phone" class="form-control" type="number" placeholder="<?php echo display('phone') ?>" id="phone" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="Profile Image" class="col-sm-4 col-form-label">
                     Email 
                     </label>
                     <div class="col-sm-8">
                        <input name="email" class="form-control" type="email" placeholder="<?php echo display('email') ?>" id="email" oninput="validateEmail(this)">
                        <span id="validateemails" style="margin-top: 10px;"></span>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="address_line_1" class="col-sm-4 col-form-div"><?php echo display('address_line_1') ?></label>
                     <div class="col-sm-8">
                        <textarea name="address_line_1" rows='1' class="form-control" placeholder="<?php echo display('address_line_1') ?>" id="address_line_1"></textarea> 
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="address_line_2" class="col-sm-4 col-form-div"><?php echo display('address_line_2') ?></label>
                     <div class="col-sm-8">
                        <textarea name="address_line_2" rows='1' class="form-control" placeholder="<?php echo display('address_line_2') ?>" id="address_line_2"></textarea> 
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="city" class="col-sm-4 col-form-div"><?php echo display('city') ?></label>
                     <div class="col-sm-8">
                        <input name="city" class="form-control" type="text" placeholder="<?php echo display('city') ?>" id="city" oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="state" class="col-sm-4 col-form-label"><?php echo display('state'); ?> <i class="text-danger"></i></label>
                     <div class="col-sm-8">
                        <input class="form-control" name="state" id="state" type="text" style="border:2px solid #D7D4D6;"    placeholder="<?php echo display('state') ?>"  oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="zip" class="col-sm-4 col-form-div"><?php echo display('zip') ?></label>
                     <div class="col-sm-8">
                        <input name="zip" class="form-control" type="text" placeholder="<?php echo display('zip') ?>" id="zip" oninput="exitnumbers(this, 10)">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="country" class="col-sm-4 col-form-div"><?php echo display('country') ?></label>
                     <div class="col-sm-8">
                        <select name="country" class="form-control">
                           <option value="United States of America" rel="">United States of America</option>
                           <option value="Afganistan" rel="">Afghanistan</option>
                           <option value="Albania" rel="">Albania</option>
                           <option value="Algeria" rel="">Algeria</option>
                           <option value="American Samoa" rel="">American Samoa</option>
                           <option value="Andorra" rel="">Andorra</option>
                           <option value="Angola" rel="">Angola</option>
                           <option value="Anguilla" rel="">Anguilla</option>
                           <option value="Antigua &amp; Barbuda" rel="">Antigua &amp; Barbuda</option>
                           <option value="Argentina" rel="">Argentina</option>
                           <option value="Armenia" rel="">Armenia</option>
                           <option value="Aruba" rel="">Aruba</option>
                           <option value="Australia" rel="">Australia</option>
                           <option value="Austria" rel="">Austria</option>
                           <option value="Azerbaijan" rel="">Azerbaijan</option>
                           <option value="Bahamas" rel="">Bahamas</option>
                           <option value="Bahrain" rel="">Bahrain</option>
                           <option value="Bangladesh" rel="">Bangladesh</option>
                           <option value="Barbados" rel="">Barbados</option>
                           <option value="Belarus" rel="">Belarus</option>
                           <option value="Belgium" rel="">Belgium</option>
                           <option value="Belize" rel="">Belize</option>
                           <option value="Benin" rel="">Benin</option>
                           <option value="Bermuda" rel="">Bermuda</option>
                           <option value="Bhutan" rel="">Bhutan</option>
                           <option value="Bolivia" rel="">Bolivia</option>
                           <option value="Bonaire" rel="">Bonaire</option>
                           <option value="Bosnia &amp; Herzegovina" rel="">Bosnia &amp; Herzegovina</option>
                           <option value="Botswana" rel="">Botswana</option>
                           <option value="Brazil" rel="">Brazil</option>
                           <option value="British Indian Ocean Ter" rel="">British Indian Ocean Ter</option>
                           <option value="Brunei" rel="">Brunei</option>
                           <option value="Bulgaria" rel="">Bulgaria</option>
                           <option value="Burkina Faso" rel="">Burkina Faso</option>
                           <option value="Burundi" rel="">Burundi</option>
                           <option value="Cambodia" rel="">Cambodia</option>
                           <option value="Cameroon" rel="">Cameroon</option>
                           <option value="Canada" rel="">Canada</option>
                           <option value="Canary Islands" rel="">Canary Islands</option>
                           <option value="Cape Verde" rel="">Cape Verde</option>
                           <option value="Cayman Islands" rel="">Cayman Islands</option>
                           <option value="Central African Republic" rel="">Central African Republic</option>
                           <option value="Chad" rel="">Chad</option>
                           <option value="Channel Islands" rel="">Channel Islands</option>
                           <option value="Chile" rel="">Chile</option>
                           <option value="China" rel="">China</option>
                           <option value="Christmas Island" rel="">Christmas Island</option>
                           <option value="Cocos Island" rel="">Cocos Island</option>
                           <option value="Colombia" rel="">Colombia</option>
                           <option value="Comoros" rel="">Comoros</option>
                           <option value="Congo" rel="">Congo</option>
                           <option value="Cook Islands" rel="">Cook Islands</option>
                           <option value="Costa Rica" rel="">Costa Rica</option>
                           <option value="Cote DIvoire" rel="">Cote D'Ivoire</option>
                           <option value="Croatia" rel="">Croatia</option>
                           <option value="Cuba" rel="">Cuba</option>
                           <option value="Curaco" rel="">Curacao</option>
                           <option value="Cyprus" rel="">Cyprus</option>
                           <option value="Czech Republic" rel="">Czech Republic</option>
                           <option value="Denmark" rel="">Denmark</option>
                           <option value="Djibouti" rel="">Djibouti</option>
                           <option value="Dominica" rel="">Dominica</option>
                           <option value="Dominican Republic" rel="">Dominican Republic</option>
                           <option value="East Timor" rel="">East Timor</option>
                           <option value="Ecuador" rel="">Ecuador</option>
                           <option value="Egypt" rel="">Egypt</option>
                           <option value="El Salvador" rel="">El Salvador</option>
                           <option value="Equatorial Guinea" rel="">Equatorial Guinea</option>
                           <option value="Eritrea" rel="">Eritrea</option>
                           <option value="Estonia" rel="">Estonia</option>
                           <option value="Ethiopia" rel="">Ethiopia</option>
                           <option value="Falkland Islands" rel="">Falkland Islands</option>
                           <option value="Faroe Islands" rel="">Faroe Islands</option>
                           <option value="Fiji" rel="">Fiji</option>
                           <option value="Finland" rel="">Finland</option>
                           <option value="France" rel="">France</option>
                           <option value="French Guiana" rel="">French Guiana</option>
                           <option value="French Polynesia" rel="">French Polynesia</option>
                           <option value="French Southern Ter">French Southern Ter</option>
                           <option value="Gabon">Gabon</option>
                           <option value="Gambia">Gambia</option>
                           <option value="Georgia">Georgia</option>
                           <option value="Germany" rel="">Germany</option>
                           <option value="Ghana">Ghana</option>
                           <option value="Gibraltar">Gibraltar</option>
                           <option value="Great Britain">Great Britain</option>
                           <option value="Greece" rel="">Greece</option>
                           <option value="Greenland" rel="">Greenland</option>
                           <option value="Grenada">Grenada</option>
                           <option value="Guadeloupe">Guadeloupe</option>
                           <option value="Guam">Guam</option>
                           <option value="Guatemala">Guatemala</option>
                           <option value="Guinea">Guinea</option>
                           <option value="Guyana">Guyana</option>
                           <option value="Haiti">Haiti</option>
                           <option value="Hawaii">Hawaii</option>
                           <option value="Honduras">Honduras</option>
                           <option value="Hong Kong" rel="">Hong Kong</option>
                           <option value="Hungary">Hungary</option>
                           <option value="Iceland">Iceland</option>
                           <option value="India" rel="">India</option>
                           <option value="Indonesia" rel="">Indonesia</option>
                           <option value="Iran" rel="">Iran</option>
                           <option value="Iraq" rel="">Iraq</option>
                           <option value="Ireland" rel="">Ireland</option>
                           <option value="Isle of Man">Isle of Man</option>
                           <option value="Israel">Israel</option>
                           <option value="Italy" rel="">Italy</option>
                           <option value="Jamaica">Jamaica</option>
                           <option value="Japan" rel="">Japan</option>
                           <option value="Jordan">Jordan</option>
                           <option value="Kazakhstan">Kazakhstan</option>
                           <option value="Kenya" rel="">Kenya</option>
                           <option value="Kiribati">Kiribati</option>
                           <option value="Korea North" rel="">Korea North</option>
                           <option value="Korea Sout" rel="">Korea South</option>
                           <option value="Kuwait">Kuwait</option>
                           <option value="Kyrgyzstan">Kyrgyzstan</option>
                           <option value="Laos">Laos</option>
                           <option value="Latvia">Latvia</option>
                           <option value="Lebanon">Lebanon</option>
                           <option value="Lesotho">Lesotho</option>
                           <option value="Liberia">Liberia</option>
                           <option value="Libya">Libya</option>
                           <option value="Liechtenstein">Liechtenstein</option>
                           <option value="Lithuania">Lithuania</option>
                           <option value="Luxembourg">Luxembourg</option>
                           <option value="Macau">Macau</option>
                           <option value="Macedonia">Macedonia</option>
                           <option value="Madagascar">Madagascar</option>
                           <option value="Malaysia">Malaysia</option>
                           <option value="Malawi">Malawi</option>
                           <option value="Maldives">Maldives</option>
                           <option value="Mali">Mali</option>
                           <option value="Malta">Malta</option>
                           <option value="Marshall Islands">Marshall Islands</option>
                           <option value="Martinique">Martinique</option>
                           <option value="Mauritania">Mauritania</option>
                           <option value="Mauritius">Mauritius</option>
                           <option value="Mayotte">Mayotte</option>
                           <option value="Mexico">Mexico</option>
                           <option value="Midway Islands">Midway Islands</option>
                           <option value="Moldova">Moldova</option>
                           <option value="Monaco">Monaco</option>
                           <option value="Mongolia">Mongolia</option>
                           <option value="Montserrat">Montserrat</option>
                           <option value="Morocco">Morocco</option>
                           <option value="Mozambique">Mozambique</option>
                           <option value="Myanmar">Myanmar</option>
                           <option value="Nambia">Nambia</option>
                           <option value="Nauru">Nauru</option>
                           <option value="Nepal">Nepal</option>
                           <option value="Netherland Antilles">Netherland Antilles</option>
                           <option value="Netherlands">Netherlands (Holland, Europe)</option>
                           <option value="Nevis">Nevis</option>
                           <option value="New Caledonia">New Caledonia</option>
                           <option value="New Zealand">New Zealand</option>
                           <option value="Nicaragua">Nicaragua</option>
                           <option value="Niger">Niger</option>
                           <option value="Nigeria">Nigeria</option>
                           <option value="Niue">Niue</option>
                           <option value="Norfolk Island">Norfolk Island</option>
                           <option value="Norway">Norway</option>
                           <option value="Oman">Oman</option>
                           <option value="Pakistan">Pakistan</option>
                           <option value="Palau Island">Palau Island</option>
                           <option value="Palestine">Palestine</option>
                           <option value="Panama">Panama</option>
                           <option value="Papua New Guinea">Papua New Guinea</option>
                           <option value="Paraguay">Paraguay</option>
                           <option value="Peru">Peru</option>
                           <option value="Phillipines" rel="">Philippines</option>
                           <option value="Pitcairn Island">Pitcairn Island</option>
                           <option value="Poland">Poland</option>
                           <option value="Portugal">Portugal</option>
                           <option value="Puerto Rico">Puerto Rico</option>
                           <option value="Qatar" rel="">Qatar</option>
                           <option value="Republic of Montenegro">Republic of Montenegro</option>
                           <option value="Republic of Serbia" rel="">Republic of Serbia</option>
                           <option value="Reunion">Reunion</option>
                           <option value="Romania">Romania</option>
                           <option value="Russia" rel="">Russia</option>
                           <option value="Rwanda">Rwanda</option>
                           <option value="St Barthelemy">St Barthelemy</option>
                           <option value="St Eustatius">St Eustatius</option>
                           <option value="St Helena">St Helena</option>
                           <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                           <option value="St Lucia">St Lucia</option>
                           <option value="St Maarten">St Maarten</option>
                           <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                           <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                           <option value="Saipan">Saipan</option>
                           <option value="Samoa">Samoa</option>
                           <option value="Samoa American">Samoa American</option>
                           <option value="San Marino">San Marino</option>
                           <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                           <option value="Saudi Arabia">Saudi Arabia</option>
                           <option value="Senegal">Senegal</option>
                           <option value="Serbia">Serbia</option>
                           <option value="Seychelles">Seychelles</option>
                           <option value="Sierra Leone">Sierra Leone</option>
                           <option value="Singapore" rel="">Singapore</option>
                           <option value="Slovakia">Slovakia</option>
                           <option value="Slovenia">Slovenia</option>
                           <option value="Solomon Islands">Solomon Islands</option>
                           <option value="Somalia">Somalia</option>
                           <option value="South Africa" rel="">South Africa</option>
                           <option value="Spain">Spain</option>
                           <option value="Sri Lanka" rel="">Sri Lanka</option>
                           <option value="Sudan">Sudan</option>
                           <option value="Suriname">Suriname</option>
                           <option value="Swaziland">Swaziland</option>
                           <option value="Sweden" rel="">Sweden</option>
                           <option value="Switzerland">Switzerland</option>
                           <option value="Syria">Syria</option>
                           <option value="Tahiti">Tahiti</option>
                           <option value="Taiwan">Taiwan</option>
                           <option value="Tajikistan">Tajikistan</option>
                           <option value="Tanzania">Tanzania</option>
                           <option value="Thailand" rel="">Thailand</option>
                           <option value="Togo">Togo</option>
                           <option value="Tokelau">Tokelau</option>
                           <option value="Tonga">Tonga</option>
                           <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                           <option value="Tunisia">Tunisia</option>
                           <option value="Turkey">Turkey</option>
                           <option value="Turkmenistan">Turkmenistan</option>
                           <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                           <option value="Tuvalu">Tuvalu</option>
                           <option value="Uganda">Uganda</option>
                           <option value="Ukraine">Ukraine</option>
                           <option value="United Arab Erimates" rel="">United Arab Emirates</option>
                           <option value="United Kingdom" rel="">United Kingdom</option>
                           <option value="Uraguay">Uruguay</option>
                           <option value="Uzbekistan">Uzbekistan</option>
                           <option value="Vanuatu">Vanuatu</option>
                           <option value="Vatican City State" rel="">Vatican City State</option>
                           <option value="Venezuela">Venezuela</option>
                           <option value="Vietnam">Vietnam</option>
                           <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                           <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                           <option value="Wake Island">Wake Island</option>
                           <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                           <option value="Yemen" rel="">Yemen</option>
                           <option value="Zaire">Zaire</option>
                           <option value="Zambia">Zambia</option>
                           <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                     </div>
                  </div>
                  
                  <div class="form-group row">
                     <label for="emergencycontact" class="col-sm-4 col-form-label"> <?php echo "Emergency Contact Person" ?> </label>
                     <div class="col-sm-8">
                        <input class="form-control" name="emergencycontact" id="emergencycontact" type="text"  style="border:2px solid #D7D4D6;"   placeholder="Emergency Contact person"  oninput="limitAlphabetical(this, 20)">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="emergencycontactnum" class="col-sm-4 col-form-label"> <?php echo "Emergency Contact  number" ?> </label>
                     <div class="col-sm-8">
                        <input class="form-control" name="emergencycontactnum" id="emergencycontactnum" type="number"  style="border:2px solid #D7D4D6;"   placeholder="Emergency Contact  number"  oninput="exitnumbers(this, 10)">
                     </div>
                  </div>
               </div>
               <!-- Right Side -->
               <div class="col-sm-6">
                  <div class="form-group row">
                     <label for="employee_type" class="col-sm-4 col-form-div">
                     Employee Type <i class="text-danger">*</i>
                     </label>
                     <div class="col-sm-7">
                        <select  name="employee_type" id="emp_type" class="required form-control" required>
                           <option value="">Select Employee Type</option>
                           <option value="Full Time (W4)">Full Time (W4)</option>
                           <!-- <option value="Contractor (W9)">Contractor (W9)</option> -->
                           <option value="Part time">Part time</option>
                           <?php foreach($emp_data as $emp_type){ ?>
                           <option value="<?php  echo $emp_type['employee_type'] ;?>"><?php  echo $emp_type['employee_type'] ;?></option>
                           <?php  } ?>
                        </select>
                     </div>
                     <div class="col-sm-1">
                        <a  class="btnclr client-add-btn btn" aria-hidden="true"   data-toggle="modal" data-target="#employees_type" ><i class="fa fa-plus"></i></a>
                     </div>
                  </div>
                  <div class="form-group row" id="payment_from">
                     <label for="city" class="col-sm-4 col-form-div"><?php echo  ('Sales Commission') ?></label>
                     <div class="col-sm-8">
                        <input name="sc" class="form-control" type="text" placeholder="<?php echo 'sales commission percentage' ?>">
                     </div>
                  </div>
                       <div class="form-group row" id="payment_from">
                        <label for="choice" class="col-sm-4 col-form-div">Commission Withholding</label>
                     <div class="col-sm-8">
                      <input type="radio" name="choice" value="Yes">Yes &nbsp;
                        <input type="radio" name="choice" value="No">No
                        </div>
                  </div>
              <div class="form-group row" id="payment_from">
                     <label for="payroll_type" class="col-sm-4 col-form-label"> Payroll Type <i class="text-danger">*</i></label>
                     <div class="col-sm-8">
                        <select  name="payroll_type" id="payroll_type" requried class="form-control"  >
                           <option value="">Select the Payroll Type</option>
                           <option value="Hourly">Hourly</option>
                           <!--<option value="Salaried-weekly">Salaried-Weekly</option>-->
                           <!--<option value="Salaried-BiWeekly">Salaried-BiWeekly</option>-->
                           <!--<option value="Salaried-Monthly">Salaried-Monthly</option>-->
                           <!--<option value="Salaried-BiMonthly">Salaried-BiMonthly</option>-->
                           <!--<option value="SalesCommission">SalesCommission</option>-->
                          
                        </select>
                     </div>
                     <div class="col-sm-1">
                        <!-- <a  class="client-add-btn btn btnclr" aria-hidden="true"   data-toggle="modal" data-target="#proll_type" ><i class="fa fa-plus"></i></a> -->
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="hourly_rate_or_salary" id="cost" class="col-sm-4 col-form-div"> Pay rate(<?php echo $currency; ?>) <i class="text-danger">*</i></label>
                     <div class="col-sm-8">
                        <input name="hrate" class="form-control" type="text" placeholder="<?php echo "Pay rate" ?>" id="hrate" oninput="validateInput(this)">
                     </div>
                  </div>
                  <div class="form-group row"  id="payment_from">
                     <label for="paytype" class="col-sm-4 col-form-label"> Payment Type </label>
                     <div class="col-sm-7" >
                        <select name="paytype"  id="paytype" class="form-control" style="width: 100%;" >
                           <option value="">Select Type</option>
                           <option value="Cheque">Cheque</option>
                           <option value="Direct Deposit">Direct Deposit</option>
                           <option value="Cash">Cash</option>
                           <?php  foreach($paytype as $ptype){ ?>
                           <option value="<?php  echo $ptype['payment_type'] ;?>"><?php  echo $ptype['payment_type'] ;?></option>
                           <?php  } ?>
                        </select>
                     </div>
                     <div class="col-sm-1">
                        <a  class="btnclr client-add-btn btn" aria-hidden="true"    data-toggle="modal" data-target="#payment_type" ><i class="fa fa-plus"></i></a>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="email" class="col-sm-4 col-form-div">Social security number <i class="text-danger">*</i></label>
                     <div class="col-sm-8">
                        <input name="ssn" class="form-control" type="text" placeholder="Social security number" required oninput="exitsocialsecurity(this, 9)">
                     </div>
                  </div>
                  <div class="form-group row" id="bank_name">
                     <label for="bank_name" class="col-sm-4 col-form-label"> <?php echo display('Bank') ?>  </label>
                     <div class="col-sm-7">
                        <select name="bank_name" id="bank_name"  class="form-control bankpayment">
                           <option>Select Bank</option>
                           <option value="NA">NA (Not Applicable)</option>
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
                           <?php foreach($bank_data as $bank){  ?>
                           <option value="<?php  echo $bank['bank_name'] ;?>"><?php  echo $bank['bank_name'] ;?></option>
                           <?php  } ?>
                        </select>
                     </div>
                     <div class="col-sm-1">
                        <a data-toggle="modal" href="#add_bank_info"   class="btn btnclr"><i class="fa fa-plus"></i></a>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="blood_group" class="col-sm-4 col-form-div">Routing number </label>
                     <div class="col-sm-8">
                        <input name="routing_number" class="form-control" type="text" placeholder="Routing number" oninput="routingrestrict(this, 15)">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="zip" class="col-sm-4 col-form-div"><?php echo 'Account Number' ?></label>
                     <div class="col-sm-8">
                        <input type="text" name="account_number" class="form-control" placeholder="Account Number" oninput="routingrestrict(this, 15)">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="zip" class="col-sm-4 col-form-div"><?php echo ('Employee Tax') ?><i class="text-danger">*</i></label>
                     <div class="col-sm-8">
                        <select  name="emp_tax_detail" id="emp_tax_detail" class="form-control" required>
                           <option value="">Select Tax</option>
                           <option value="single">Single</option>
                           <option value="tax_filling">Tax Filling</option>
                           <option value="married">Married</option>
                           <option value="head_household">Head Household</option>
                        </select>
                     </div>
                  </div>
                  <div id="popup" class="btnclr popup">
                     <!-- Popup content -->
                     <div class="row">
                        <!-- Working Taxes -->
                        <div class="col-sm-6">
                           <h4 style="text-align:center;margin-left: 140px;">WORK LOCATION TAXES</h4>
                           <br>
                           <div class="form-group fg" >
                              <label for="stateTaxDropdown">State Tax<i class="text-danger">*</i></label>
                              <input list="magic_state_tax" name="state_tax" id="stateTaxDropdown" class="form-control">
                              <datalist id="magic_state_tax">
                                 <?php foreach ($state_tx as $st) { ?>
                                 <option value="<?php echo $st['state']; ?>"><?php echo $st['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="localTaxDropdown">City Tax<i class="text-danger">*</i></label>
                              <input list="magic_local_tax" name="city_tax" id="localTaxDropdown" class="form-control">
                              <datalist id="magic_local_tax">
                                 <?php foreach ($get_info_city_tax as $gtct) { ?>
                                 <option value="<?php echo $gtct['state']; ?>"><?php echo $gtct['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="stateLocalTaxDropdown">County Tax<i class="text-danger">*</i></label>
                              <input list="magic_state_local_tax" name="county_tax" id="stateLocalTaxDropdown" class="form-control">
                              <datalist id="magic_state_local_tax">
                                 <?php foreach ($get_info_county_tax as $gtcty) { ?>
                                 <option value="<?php echo $gtcty['state']; ?>"><?php echo $gtcty['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="stateTax2Dropdown">Other Work Tax<i class="text-danger">*</i></label>
                              <input list="magic_state_tax_2" name="other_working_tax" id="stateTax2Dropdown" class="form-control">
                              <datalist id="magic_state_tax_2">
                                 <!--<?php //foreach ($state_tx as $st) { ?>-->
                                 <!--    <option value="<?php //echo $st['state']; ?>"><?php //echo $st['state']; ?></option>-->
                                 <!--<?php// } ?>-->
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                        </div>
                        <!-- Living Taxes -->
                        <div class="col-sm-6">
                           <h4 style="text-align:center;margin-left:140px;">LIVING LOCATION TAXES</h4>
                           <br>
                           <div class="form-group fg">
                              <label for="livingStateTax">State Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_state_tax" name="living_state_tax" id="livingStateTax" class="form-control">
                              <datalist id="magic_living_state_tax">
                                 <?php foreach ($state_tx as $st) { ?>
                                 <option value="<?php echo $st['state']; ?>"><?php echo $st['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="livingCityTax">City Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_city_tax" name="living_city_tax" id="livingCityTax" class="form-control">
                              <datalist id="magic_living_city_tax">
                                 <?php foreach ($get_info_city_tax as $gtct) { ?>
                                 <option value="<?php echo $gtct['state']; ?>"><?php echo $gtct['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="livingCountyTax">County Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_county_tax" name="living_county_tax" id="livingCountyTax" class="form-control">
                              <datalist id="magic_living_county_tax">
                                 <?php foreach ($get_info_county_tax as $gtcty) { ?>
                                 <option value="<?php echo $gtcty['state']; ?>"><?php echo $gtcty['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="livingOtherTax">Other living Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_other_tax" name="other_living_tax" id="livingOtherTax" class="form-control">
                              <datalist id="magic_living_other_tax">
                                 <!--<?php //foreach ($state_tx as $st) { ?>-->
                                 <!--    <option value="<?php //echo $st['state']; ?>"><?php //echo $st['state']; ?></option>-->
                                 <!--<?php //} ?>-->
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div style='float:right;font-weight:bold;'>
                        <!-- Button to add popup data -->
                        <button type="button"   style="background-color:green;margin-left: 335px;width:60px;"  class="btn btnclr"   id="addPopupData">Save</button>
                        <button type="button" class="btn btn-danger"   onclick="closeModal()">Close</button>
                     </div>
                     <br>
                     <br>
                  </div>
                  <div class="form-group row">
                     <label for="withholding_tax" class="col-sm-4 col-form-label">Withholding Tax</label>
                     <div class="col-sm-8">
                        <button type="button" class="btnclr btn" id="showPopup">Add Withholding Tax</button>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="ETA" class="col-sm-4 col-form-label"><?php echo display('Attachments ') ?></label>
                        <div class="col-sm-6">
                           <p>
                              <label for="attachment">
                              <a class="btnclr btn   text-light" role="button" aria-disabled="false"><i class="fa fa-upload"></i>&nbsp; Choose Files</a>
                              </label>
                                 <!-- <p id="msg"></p> -->
                                 <!-- <input type="hidden" name="sub_menu" value="ocean_export_tracking"> -->
                              <input type="file" name="files[]" class="upload" id="attachment" style="visibility: hidden; position: absolute;" multiple/>
                           </p>
                           <p id="files-area">
                              <span id="filesList">
                              <span id="files-names"></span>
                                 </span>
                           </p>
                        </div>
                  </div>
                 <!--  <div class="form-group row" id="employee_type">
                     <label for="employee_type" class="col-sm-4 col-form-label">
                     Attachments <i class="text-danger">*</i>
                     </label>
                     <div class="col-sm-8">
                        <input type="file" name="files[]" class="form-control" placeholder="<?php echo display('picture') ?>" id="image" multiple>
                        <input type="hidden" name="old_image" value="">
                        <br>
                        <?php
                           echo '<div class="file-container">';
                              foreach ($employee_data as $attachment) {
                                  $Final_files = explode(",", $attachment['files']);
                                  foreach ($Final_files as $file) {
                                      $encoded_file = rawurlencode(trim($file));
                                      echo '<p><a href="' . base_url() . 'uploads/' . $encoded_file . '" target="_blank">' . trim($file) . '</a></p>';
                                  } 
                              }
                              echo '</div>';
                           ?>
                     </div>
                  </div> -->

                  <div class="form-group row"  id="payrolltype">
                     <label for="profile_image" class="col-sm-4 col-form-label">
                     Profile Image
                     </label>
                     <div class="col-sm-8">
                        <input type="file" name="profile_image" class="form-control">
                     </div>
                  </div>
               </div>
            </div>
            <br><br><br>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <button type="submit" id="checkSubmit" class="btnclr btn btn-success w-md m-b-5"><?php echo display('save') ?></button> 
                  </div>
               </div>
            </div>
            <?php echo form_close() ?>
         </div>

         <!-- Sales Partner -->
          <div class="panel-body" id="salesPartnerForms" style="display: none;">
            <?php echo form_open_multipart('Chrm/salespartner_create',array('onsubmit' => 'return validateForm()') ) ?>
            <div class="row">
               <!-- Left Side -->
               <div class="col-sm-6">
                  <div class="form-group row">
                     <label for="first_name" class="col-sm-4 col-form-div"><?php echo display('first_name') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-8">
                        <input name="first_name" class="form-control" type="text" placeholder="<?php echo display('first_name') ?>" required oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="middle_name" class="col-sm-4 col-form-div"><?php echo "Middle Name"; ?></label>
                     <div class="col-sm-8">
                        <input name="middle_name" class="form-control" type="text" placeholder="<?php echo "Middle Name"; ?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="last_name" class="col-sm-4 col-form-div"><?php echo display('last_name') ?><i class="text-danger">*</i></label>
                     <div class="col-sm-8">
                        <input name="last_name" class="form-control" type="text" placeholder="<?php echo display('last_name') ?>" required oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="last_name" class="col-sm-4 col-form-div"><?php echo ("Business Name") ?></label>
                     <div class="col-sm-8">
                        <input name="salesbusiness_name" class="form-control" type="text" placeholder="<?php echo "Business Name" ?>" id="salesbusiness_name" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="phone" class="col-sm-4 col-form-div"><?php echo display('phone') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-8">
                        <input name="phone" class="form-control" type="number" placeholder="<?php echo display('phone') ?>" id="phone" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="Profile Image" class="col-sm-4 col-form-label">
                     Email 
                     </label>
                     <div class="col-sm-8">
                        <input name="email" class="form-control" type="email" placeholder="<?php echo display('email') ?>" id="email" oninput="validateEmail(this)">
                        <span id="validateemails" style="margin-top: 10px;"></span>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="address_line_1" class="col-sm-4 col-form-div"><?php echo display('address_line_1') ?></label>
                     <div class="col-sm-8">
                        <textarea name="address_line_1" rows='1' class="form-control" placeholder="<?php echo display('address_line_1') ?>" id="address_line_1"></textarea> 
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="address_line_2" class="col-sm-4 col-form-div"><?php echo display('address_line_2') ?></label>
                     <div class="col-sm-8">
                        <textarea name="address_line_2" rows='1' class="form-control" placeholder="<?php echo display('address_line_2') ?>" id="address_line_2"></textarea> 
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="city" class="col-sm-4 col-form-div"><?php echo display('city') ?></label>
                     <div class="col-sm-8">
                        <input name="city" class="form-control" type="text" placeholder="<?php echo display('city') ?>" id="city" oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="state" class="col-sm-4 col-form-label"><?php echo display('state'); ?> <i class="text-danger"></i></label>
                     <div class="col-sm-8">
                        <input class="form-control" name="state" id="state" type="text" style="border:2px solid #D7D4D6;"    placeholder="<?php echo display('state') ?>"  oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="zip" class="col-sm-4 col-form-div"><?php echo display('zip') ?></label>
                     <div class="col-sm-8">
                        <input name="zip" class="form-control" type="text" placeholder="<?php echo display('zip') ?>" id="zip" oninput="exitnumbers(this, 10)">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="country" class="col-sm-4 col-form-div"><?php echo display('country') ?></label>
                     <div class="col-sm-8">
                        <select name="country" class="form-control">
                           <option value="United States of America" rel="">United States of America</option>
                           <option value="Afganistan" rel="">Afghanistan</option>
                           <option value="Albania" rel="">Albania</option>
                           <option value="Algeria" rel="">Algeria</option>
                           <option value="American Samoa" rel="">American Samoa</option>
                           <option value="Andorra" rel="">Andorra</option>
                           <option value="Angola" rel="">Angola</option>
                           <option value="Anguilla" rel="">Anguilla</option>
                           <option value="Antigua &amp; Barbuda" rel="">Antigua &amp; Barbuda</option>
                           <option value="Argentina" rel="">Argentina</option>
                           <option value="Armenia" rel="">Armenia</option>
                           <option value="Aruba" rel="">Aruba</option>
                           <option value="Australia" rel="">Australia</option>
                           <option value="Austria" rel="">Austria</option>
                           <option value="Azerbaijan" rel="">Azerbaijan</option>
                           <option value="Bahamas" rel="">Bahamas</option>
                           <option value="Bahrain" rel="">Bahrain</option>
                           <option value="Bangladesh" rel="">Bangladesh</option>
                           <option value="Barbados" rel="">Barbados</option>
                           <option value="Belarus" rel="">Belarus</option>
                           <option value="Belgium" rel="">Belgium</option>
                           <option value="Belize" rel="">Belize</option>
                           <option value="Benin" rel="">Benin</option>
                           <option value="Bermuda" rel="">Bermuda</option>
                           <option value="Bhutan" rel="">Bhutan</option>
                           <option value="Bolivia" rel="">Bolivia</option>
                           <option value="Bonaire" rel="">Bonaire</option>
                           <option value="Bosnia &amp; Herzegovina" rel="">Bosnia &amp; Herzegovina</option>
                           <option value="Botswana" rel="">Botswana</option>
                           <option value="Brazil" rel="">Brazil</option>
                           <option value="British Indian Ocean Ter" rel="">British Indian Ocean Ter</option>
                           <option value="Brunei" rel="">Brunei</option>
                           <option value="Bulgaria" rel="">Bulgaria</option>
                           <option value="Burkina Faso" rel="">Burkina Faso</option>
                           <option value="Burundi" rel="">Burundi</option>
                           <option value="Cambodia" rel="">Cambodia</option>
                           <option value="Cameroon" rel="">Cameroon</option>
                           <option value="Canada" rel="">Canada</option>
                           <option value="Canary Islands" rel="">Canary Islands</option>
                           <option value="Cape Verde" rel="">Cape Verde</option>
                           <option value="Cayman Islands" rel="">Cayman Islands</option>
                           <option value="Central African Republic" rel="">Central African Republic</option>
                           <option value="Chad" rel="">Chad</option>
                           <option value="Channel Islands" rel="">Channel Islands</option>
                           <option value="Chile" rel="">Chile</option>
                           <option value="China" rel="">China</option>
                           <option value="Christmas Island" rel="">Christmas Island</option>
                           <option value="Cocos Island" rel="">Cocos Island</option>
                           <option value="Colombia" rel="">Colombia</option>
                           <option value="Comoros" rel="">Comoros</option>
                           <option value="Congo" rel="">Congo</option>
                           <option value="Cook Islands" rel="">Cook Islands</option>
                           <option value="Costa Rica" rel="">Costa Rica</option>
                           <option value="Cote DIvoire" rel="">Cote D'Ivoire</option>
                           <option value="Croatia" rel="">Croatia</option>
                           <option value="Cuba" rel="">Cuba</option>
                           <option value="Curaco" rel="">Curacao</option>
                           <option value="Cyprus" rel="">Cyprus</option>
                           <option value="Czech Republic" rel="">Czech Republic</option>
                           <option value="Denmark" rel="">Denmark</option>
                           <option value="Djibouti" rel="">Djibouti</option>
                           <option value="Dominica" rel="">Dominica</option>
                           <option value="Dominican Republic" rel="">Dominican Republic</option>
                           <option value="East Timor" rel="">East Timor</option>
                           <option value="Ecuador" rel="">Ecuador</option>
                           <option value="Egypt" rel="">Egypt</option>
                           <option value="El Salvador" rel="">El Salvador</option>
                           <option value="Equatorial Guinea" rel="">Equatorial Guinea</option>
                           <option value="Eritrea" rel="">Eritrea</option>
                           <option value="Estonia" rel="">Estonia</option>
                           <option value="Ethiopia" rel="">Ethiopia</option>
                           <option value="Falkland Islands" rel="">Falkland Islands</option>
                           <option value="Faroe Islands" rel="">Faroe Islands</option>
                           <option value="Fiji" rel="">Fiji</option>
                           <option value="Finland" rel="">Finland</option>
                           <option value="France" rel="">France</option>
                           <option value="French Guiana" rel="">French Guiana</option>
                           <option value="French Polynesia" rel="">French Polynesia</option>
                           <option value="French Southern Ter">French Southern Ter</option>
                           <option value="Gabon">Gabon</option>
                           <option value="Gambia">Gambia</option>
                           <option value="Georgia">Georgia</option>
                           <option value="Germany" rel="">Germany</option>
                           <option value="Ghana">Ghana</option>
                           <option value="Gibraltar">Gibraltar</option>
                           <option value="Great Britain">Great Britain</option>
                           <option value="Greece" rel="">Greece</option>
                           <option value="Greenland" rel="">Greenland</option>
                           <option value="Grenada">Grenada</option>
                           <option value="Guadeloupe">Guadeloupe</option>
                           <option value="Guam">Guam</option>
                           <option value="Guatemala">Guatemala</option>
                           <option value="Guinea">Guinea</option>
                           <option value="Guyana">Guyana</option>
                           <option value="Haiti">Haiti</option>
                           <option value="Hawaii">Hawaii</option>
                           <option value="Honduras">Honduras</option>
                           <option value="Hong Kong" rel="">Hong Kong</option>
                           <option value="Hungary">Hungary</option>
                           <option value="Iceland">Iceland</option>
                           <option value="India" rel="">India</option>
                           <option value="Indonesia" rel="">Indonesia</option>
                           <option value="Iran" rel="">Iran</option>
                           <option value="Iraq" rel="">Iraq</option>
                           <option value="Ireland" rel="">Ireland</option>
                           <option value="Isle of Man">Isle of Man</option>
                           <option value="Israel">Israel</option>
                           <option value="Italy" rel="">Italy</option>
                           <option value="Jamaica">Jamaica</option>
                           <option value="Japan" rel="">Japan</option>
                           <option value="Jordan">Jordan</option>
                           <option value="Kazakhstan">Kazakhstan</option>
                           <option value="Kenya" rel="">Kenya</option>
                           <option value="Kiribati">Kiribati</option>
                           <option value="Korea North" rel="">Korea North</option>
                           <option value="Korea Sout" rel="">Korea South</option>
                           <option value="Kuwait">Kuwait</option>
                           <option value="Kyrgyzstan">Kyrgyzstan</option>
                           <option value="Laos">Laos</option>
                           <option value="Latvia">Latvia</option>
                           <option value="Lebanon">Lebanon</option>
                           <option value="Lesotho">Lesotho</option>
                           <option value="Liberia">Liberia</option>
                           <option value="Libya">Libya</option>
                           <option value="Liechtenstein">Liechtenstein</option>
                           <option value="Lithuania">Lithuania</option>
                           <option value="Luxembourg">Luxembourg</option>
                           <option value="Macau">Macau</option>
                           <option value="Macedonia">Macedonia</option>
                           <option value="Madagascar">Madagascar</option>
                           <option value="Malaysia">Malaysia</option>
                           <option value="Malawi">Malawi</option>
                           <option value="Maldives">Maldives</option>
                           <option value="Mali">Mali</option>
                           <option value="Malta">Malta</option>
                           <option value="Marshall Islands">Marshall Islands</option>
                           <option value="Martinique">Martinique</option>
                           <option value="Mauritania">Mauritania</option>
                           <option value="Mauritius">Mauritius</option>
                           <option value="Mayotte">Mayotte</option>
                           <option value="Mexico">Mexico</option>
                           <option value="Midway Islands">Midway Islands</option>
                           <option value="Moldova">Moldova</option>
                           <option value="Monaco">Monaco</option>
                           <option value="Mongolia">Mongolia</option>
                           <option value="Montserrat">Montserrat</option>
                           <option value="Morocco">Morocco</option>
                           <option value="Mozambique">Mozambique</option>
                           <option value="Myanmar">Myanmar</option>
                           <option value="Nambia">Nambia</option>
                           <option value="Nauru">Nauru</option>
                           <option value="Nepal">Nepal</option>
                           <option value="Netherland Antilles">Netherland Antilles</option>
                           <option value="Netherlands">Netherlands (Holland, Europe)</option>
                           <option value="Nevis">Nevis</option>
                           <option value="New Caledonia">New Caledonia</option>
                           <option value="New Zealand">New Zealand</option>
                           <option value="Nicaragua">Nicaragua</option>
                           <option value="Niger">Niger</option>
                           <option value="Nigeria">Nigeria</option>
                           <option value="Niue">Niue</option>
                           <option value="Norfolk Island">Norfolk Island</option>
                           <option value="Norway">Norway</option>
                           <option value="Oman">Oman</option>
                           <option value="Pakistan">Pakistan</option>
                           <option value="Palau Island">Palau Island</option>
                           <option value="Palestine">Palestine</option>
                           <option value="Panama">Panama</option>
                           <option value="Papua New Guinea">Papua New Guinea</option>
                           <option value="Paraguay">Paraguay</option>
                           <option value="Peru">Peru</option>
                           <option value="Phillipines" rel="">Philippines</option>
                           <option value="Pitcairn Island">Pitcairn Island</option>
                           <option value="Poland">Poland</option>
                           <option value="Portugal">Portugal</option>
                           <option value="Puerto Rico">Puerto Rico</option>
                           <option value="Qatar" rel="">Qatar</option>
                           <option value="Republic of Montenegro">Republic of Montenegro</option>
                           <option value="Republic of Serbia" rel="">Republic of Serbia</option>
                           <option value="Reunion">Reunion</option>
                           <option value="Romania">Romania</option>
                           <option value="Russia" rel="">Russia</option>
                           <option value="Rwanda">Rwanda</option>
                           <option value="St Barthelemy">St Barthelemy</option>
                           <option value="St Eustatius">St Eustatius</option>
                           <option value="St Helena">St Helena</option>
                           <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                           <option value="St Lucia">St Lucia</option>
                           <option value="St Maarten">St Maarten</option>
                           <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                           <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                           <option value="Saipan">Saipan</option>
                           <option value="Samoa">Samoa</option>
                           <option value="Samoa American">Samoa American</option>
                           <option value="San Marino">San Marino</option>
                           <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                           <option value="Saudi Arabia">Saudi Arabia</option>
                           <option value="Senegal">Senegal</option>
                           <option value="Serbia">Serbia</option>
                           <option value="Seychelles">Seychelles</option>
                           <option value="Sierra Leone">Sierra Leone</option>
                           <option value="Singapore" rel="">Singapore</option>
                           <option value="Slovakia">Slovakia</option>
                           <option value="Slovenia">Slovenia</option>
                           <option value="Solomon Islands">Solomon Islands</option>
                           <option value="Somalia">Somalia</option>
                           <option value="South Africa" rel="">South Africa</option>
                           <option value="Spain">Spain</option>
                           <option value="Sri Lanka" rel="">Sri Lanka</option>
                           <option value="Sudan">Sudan</option>
                           <option value="Suriname">Suriname</option>
                           <option value="Swaziland">Swaziland</option>
                           <option value="Sweden" rel="">Sweden</option>
                           <option value="Switzerland">Switzerland</option>
                           <option value="Syria">Syria</option>
                           <option value="Tahiti">Tahiti</option>
                           <option value="Taiwan">Taiwan</option>
                           <option value="Tajikistan">Tajikistan</option>
                           <option value="Tanzania">Tanzania</option>
                           <option value="Thailand" rel="">Thailand</option>
                           <option value="Togo">Togo</option>
                           <option value="Tokelau">Tokelau</option>
                           <option value="Tonga">Tonga</option>
                           <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                           <option value="Tunisia">Tunisia</option>
                           <option value="Turkey">Turkey</option>
                           <option value="Turkmenistan">Turkmenistan</option>
                           <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                           <option value="Tuvalu">Tuvalu</option>
                           <option value="Uganda">Uganda</option>
                           <option value="Ukraine">Ukraine</option>
                           <option value="United Arab Erimates" rel="">United Arab Emirates</option>
                           <option value="United Kingdom" rel="">United Kingdom</option>
                           <option value="Uraguay">Uruguay</option>
                           <option value="Uzbekistan">Uzbekistan</option>
                           <option value="Vanuatu">Vanuatu</option>
                           <option value="Vatican City State" rel="">Vatican City State</option>
                           <option value="Venezuela">Venezuela</option>
                           <option value="Vietnam">Vietnam</option>
                           <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                           <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                           <option value="Wake Island">Wake Island</option>
                           <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                           <option value="Yemen" rel="">Yemen</option>
                           <option value="Zaire">Zaire</option>
                           <option value="Zambia">Zambia</option>
                           <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                     </div>
                  </div>
                  
                  <div class="form-group row">
                     <label for="emergencycontact" class="col-sm-4 col-form-label"> <?php echo "Emergency Contact Person" ?> </label>
                     <div class="col-sm-8">
                        <input class="form-control" name="emergencycontact" id="emergencycontact" type="text"  style="border:2px solid #D7D4D6;"   placeholder="Emergency Contact person"  oninput="limitAlphabetical(this, 20)">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="emergencycontactnum" class="col-sm-4 col-form-label"> <?php echo "Emergency Contact  number" ?> </label>
                     <div class="col-sm-8">
                        <input class="form-control" name="emergencycontactnum" id="emergencycontactnum" type="number"  style="border:2px solid #D7D4D6;"   placeholder="Emergency Contact  number"  oninput="exitnumbers(this, 10)">
                     </div>
                  </div>
               </div>
               <!-- Right Side -->
               <div class="col-sm-6">
                  <!--<div class="form-group row">-->
                  <!--   <label for="employee_type" class="col-sm-4 col-form-div">-->
                  <!--   Employee Type <i class="text-danger">*</i>-->
                  <!--   </label>-->
                  <!--   <div class="col-sm-7">-->
                  <!--      <select  name="employee_type" id="emp_type" class="required form-control" required>-->
                  <!--         <option value="">Select Employee Type</option>-->
                  <!--         <option value="Full Time (W4)">Full Time (W4)</option>-->
                           <!-- <option value="Contractor (W9)">Contractor (W9)</option> -->
                  <!--         <option value="Part time">Part time</option>-->
                  <!--         <?php //foreach($emp_data as $emp_type){ ?>-->
                  <!--         <option value="<?php  //echo $emp_type['employee_type'] ;?>"><?php  //echo $emp_type['employee_type'] ;?></option>-->
                  <!--         <?php  //} ?>-->
                  <!--      </select>-->
                  <!--   </div>-->
                  <!--   <div class="col-sm-1">-->
                  <!--      <a  class="btnclr client-add-btn btn" aria-hidden="true"   data-toggle="modal" data-target="#employees_type" ><i class="fa fa-plus"></i></a>-->
                  <!--   </div>-->
                  <!--</div>-->
                  <div class="form-group row" id="payment_from">
                     <label for="city" class="col-sm-4 col-form-div"><?php echo  ('Sales Commission') ?></label>
                     <div class="col-sm-8">
                        <input name="sc" class="form-control" type="text" placeholder="<?php echo 'sales commission percentage' ?>">
                     </div>


                  </div>


                  <div class="form-group row" id="payment_from">
                        <label for="choice" class="col-sm-4 col-form-div">Commission Withholding</label>
                     <div class="col-sm-8">
                        <input type="radio" name="choice" value="Yes">Yes &nbsp;
                        <input type="radio" name="choice" value="No">No
                        </div>
                  </div>
                  <div class="form-group row">
                     <label for="email" class="col-sm-4 col-form-div">Social security number <i class="text-danger">*</i></label>
                     <div class="col-sm-8">
                        <input id="ssnInput" name="ssn" class="form-control" type="text" placeholder="Social security number" required oninput="exitsocialsecurity(this, 9)">
                     </div>
                     <br><br>
                     <span style="margin-left: 532px; font-weight: bold;">(OR)</span>
                  </div>
                  <div class="form-group row">
                     <label for="hourly_rate_or_salary" id="cost" class="col-sm-4 col-form-div"><?php echo ('Federal Identification Number') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-8">
                        <input id="federalInput" name="federalidentificationnumber" class="form-control" type="text" placeholder="Federal Identification Number" oninput="exitsocialsecurity(this, 9)">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="hourly_rate_or_salary" id="cost" class="col-sm-4 col-form-div"><?php echo ('Federal Tax Classification') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-8">
                        <select name="federaltaxclassification" id="federaltaxclassification" class="form-control" style="width: 100%;" required>
                           <option value="">Select Federal Tax Classification</option>
                           <option value="Individual/sole proprietor">Individual/sole proprietor</option>
                           <option value="C corporation">C corporation</option>
                           <option value="S corporation">S corporation</option>
                           <option value="Partnership">Partnership</option>
                           <option value="Trust/estate">Trust/estate</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group row"  id="payment_from">
                     <label for="paytype" class="col-sm-4 col-form-label"> Payment Type </label>
                     <div class="col-sm-7" >
                        <select name="paytype"  id="paytype" class="form-control" style="width: 100%;" >
                           <option value="">Select Type</option>
                           <option value="Cheque">Cheque</option>
                           <option value="Direct Deposit">Direct Deposit</option>
                           <option value="Cash">Cash</option>
                           <?php  foreach($paytype as $ptype){ ?>
                           <option value="<?php  echo $ptype['payment_type'] ;?>"><?php  echo $ptype['payment_type'] ;?></option>
                           <?php  } ?>
                        </select>
                     </div>
                     <div class="col-sm-1">
                        <a  class="btnclr client-add-btn btn" aria-hidden="true"    data-toggle="modal" data-target="#payment_type" ><i class="fa fa-plus"></i></a>
                     </div>
                  </div>
                  
                  <div class="form-group row" id="bank_name">
                     <label for="bank_name" class="col-sm-4 col-form-label"> <?php echo display('Bank') ?>  </label>
                     <div class="col-sm-7">
                        <select name="bank_name" id="bank_name"  class="form-control bankpayment">
                           <option>Select Bank</option>
                           <option value="NA">NA (Not Applicable)</option>
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
                           <?php foreach($bank_data as $bank){  ?>
                           <option value="<?php  echo $bank['bank_name'] ;?>"><?php  echo $bank['bank_name'] ;?></option>
                           <?php  } ?>
                        </select>
                     </div>
                     <div class="col-sm-1">
                        <a data-toggle="modal" href="#add_bank_info"   class="btn btnclr"><i class="fa fa-plus"></i></a>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="blood_group" class="col-sm-4 col-form-div">Routing number </label>
                     <div class="col-sm-8">
                        <input name="routing_number" class="form-control" type="text" placeholder="Routing number" oninput="routingrestrict(this, 15)">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="zip" class="col-sm-4 col-form-div"><?php echo 'Account Number' ?></label>
                     <div class="col-sm-8">
                        <input type="text" name="account_number" class="form-control" placeholder="Account Number" oninput="routingrestrict(this, 15)">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="zip" class="col-sm-4 col-form-div"><?php echo ('Employee Tax') ?><i class="text-danger">*</i></label>
                     <div class="col-sm-8">
                        <select  name="emp_tax_detail" id="emp_tax_detail" class="form-control" required>
                           <option value="">Select Tax</option>
                           <option value="single">Single</option>
                           <option value="tax_filling">Tax Filling</option>
                           <option value="married">Married</option>
                           <option value="head_household">Head Household</option>
                        </select>
                     </div>
                  </div>
                  <div id="popupsalespartner" class="btnclr popupsalespartner">
                     <!-- Popup content -->
                     <div class="row">
                        <!-- Working Taxes -->
                        <div class="col-sm-6">
                           <h4 style="text-align:center;margin-left: 140px;">WORK LOCATION TAXES</h4>
                           <br>
                           <div class="form-group fg" >
                              <label for="stateTaxDropdown">State Tax<i class="text-danger">*</i></label>
                              <input list="magic_state_tax" name="state_tax" id="stateTaxDropdown" class="form-control">
                              <datalist id="magic_state_tax">
                                 <?php foreach ($state_tx as $st) { ?>
                                 <option value="<?php echo $st['state']; ?>"><?php echo $st['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="localTaxDropdown">City Tax<i class="text-danger">*</i></label>
                              <input list="magic_local_tax" name="city_tax" id="localTaxDropdown" class="form-control">
                              <datalist id="magic_local_tax">
                                 <?php foreach ($get_info_city_tax as $gtct) { ?>
                                 <option value="<?php echo $gtct['state']; ?>"><?php echo $gtct['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="stateLocalTaxDropdown">County Tax<i class="text-danger">*</i></label>
                              <input list="magic_state_local_tax" name="county_tax" id="stateLocalTaxDropdown" class="form-control">
                              <datalist id="magic_state_local_tax">
                                 <?php foreach ($get_info_county_tax as $gtcty) { ?>
                                 <option value="<?php echo $gtcty['state']; ?>"><?php echo $gtcty['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="stateTax2Dropdown">Other Work Tax<i class="text-danger">*</i></label>
                              <input list="magic_state_tax_2" name="other_working_tax" id="stateTax2Dropdown" class="form-control">
                              <datalist id="magic_state_tax_2">
                                 <!--<?php //foreach ($state_tx as $st) { ?>-->
                                 <!--    <option value="<?php //echo $st['state']; ?>"><?php //echo $st['state']; ?></option>-->
                                 <!--<?php// } ?>-->
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                        </div>
                        <!-- Living Taxes -->
                        <div class="col-sm-6">
                           <h4 style="text-align:center;margin-left:140px;">LIVING LOCATION TAXES</h4>
                           <br>
                           <div class="form-group fg">
                              <label for="livingStateTax">State Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_state_tax" name="living_state_tax" id="livingStateTax" class="form-control">
                              <datalist id="magic_living_state_tax">
                                 <?php foreach ($state_tx as $st) { ?>
                                 <option value="<?php echo $st['state']; ?>"><?php echo $st['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="livingCityTax">City Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_city_tax" name="living_city_tax" id="livingCityTax" class="form-control">
                              <datalist id="magic_living_city_tax">
                                 <?php foreach ($get_info_city_tax as $gtct) { ?>
                                 <option value="<?php echo $gtct['state']; ?>"><?php echo $gtct['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="livingCountyTax">County Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_county_tax" name="living_county_tax" id="livingCountyTax" class="form-control">
                              <datalist id="magic_living_county_tax">
                                 <?php foreach ($get_info_county_tax as $gtcty) { ?>
                                 <option value="<?php echo $gtcty['state']; ?>"><?php echo $gtcty['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="livingOtherTax">Other living Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_other_tax" name="other_living_tax" id="livingOtherTax" class="form-control">
                              <datalist id="magic_living_other_tax">
                                 <!--<?php //foreach ($state_tx as $st) { ?>-->
                                 <!--    <option value="<?php //echo $st['state']; ?>"><?php //echo $st['state']; ?></option>-->
                                 <!--<?php //} ?>-->
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div style='float:right;font-weight:bold;'>
                        <!-- Button to add popup data -->
                        <button type="button"   style="background-color:green;margin-left: 335px;width:60px;"  class="btn btnclr"   id="addPopupsalespartnerData">Save</button>
                        <button type="button" class="btn btn-danger"   onclick="closeModalsalepartner()">Close</button>
                     </div>
                     <br>
                     <br>
                  </div>
                  <div class="form-group row">
                     <label for="withholding_tax" class="col-sm-4 col-form-label">Withholding Tax</label>
                     <div class="col-sm-8">
                        <button type="button" class="btnclr btn" id="showPopupsalespartner">Add Withholding Tax</button>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="ETA" class="col-sm-4 col-form-label"><?php echo display('Attachments ') ?></label>
                        <div class="col-sm-6">
                            <input type="file" name="files[]" class="form-control" multiple/>
                           <!--<p>-->
                           <!--   <label for="attachment">-->
                           <!--   <a class="btnclr btn   text-light" role="button" aria-disabled="false"><i class="fa fa-upload"></i>&nbsp; Choose Files</a>-->
                           <!--   </label>-->
                                 <!-- <p id="msg"></p> -->
                                 <!-- <input type="hidden" name="sub_menu" value="ocean_export_tracking"> -->
                           <!--   <input type="file" name="files[]" class="upload" id="attachment" style="visibility: hidden; position: absolute;" multiple/>-->
                           <!--</p>-->
                           <!--<p id="files-area">-->
                           <!--   <span id="filesList">-->
                           <!--   <span id="files-names"></span>-->
                           <!--      </span>-->
                           <!--</p>-->
                        </div>
                  </div>
                  <div class="form-group row"  id="payrolltype">
                     <label for="profile_image" class="col-sm-4 col-form-label">
                     Profile Image
                     </label>
                     <div class="col-sm-8">
                        <input type="file" name="profile_image" class="form-control">
                     </div>
                  </div>
               </div>
            </div>
            <br><br><br>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <button type="submit" id="checkSubmit" class="btnclr btn btn-success w-md m-b-5"><?php echo display('save') ?></button> 
                  </div>
               </div>
            </div>
            <?php echo form_close() ?>
         </div>
      </div>
      <!-- </div> -->
   </div>
   </section>
</div>
<div class="modal fade" id="myModal1" role="dialog" >
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="margin-top: 190px;">
         <div class="modal-header btnclr"  style="text-align:center;" >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo ('Add Employee') ?></h4>
         </div>
         <div class="modal-body" id="bodyModal1" style="text-align:center;font-weight:bold;">
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>
<!------ add new Payment Type -->  
<div class="modal fade" id="payment_type" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header btnclr"  style="text-align:center;" >
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
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr "  value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!------ add new Payment Type -->  
<div class="modal fade" id="employees_type" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header btnclr"  style="text-align:center;" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title">Add Employee Type</h4>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_employee_type" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="customer_name" class="col-sm-3 col-form-label" style="width: auto;">New Employee Type <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input class="form-control" name ="employee_type" id="emps_type" type="text" placeholder="New Employee Type"  required="" tabindex="1">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr"  value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!------ add new payroll Type -->
<div class="modal fade" id="proll_type" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header btnclr"  style="text-align:center;" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title">Add Payroll Type</h4>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_payroll_type" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="customer_name" class="col-sm-3 col-form-label" style="width: auto;">New Payroll Type <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input class="form-control" name ="new_payroll_type" id="new_payroll_type" type="text" placeholder="New Payroll Type"  required="" tabindex="1">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr"  value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!------ add new city tax -->
<div class="modal fade" id="city_tax" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header btnclr"  style="text-align:center;" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"><?php echo 'Add New City ' ?></h4>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_city_tax" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="customer_name" class="col-sm-3 col-form-label" style="width: auto;"><?php echo 'New City ' ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input class="form-control" name ="new_city_tax" id="new_city_tax" type="text" placeholder="New City "  required="" tabindex="1">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr "  value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!------ add new designation_modal -->  
<div class="modal fade" id="designation_modal" role="dialog">
   <div class="modal-dialog" role="document">
      <!-- <div class="modal-dialog" role="document"> -->
      <div class="modal-content">
         <div class="modal-header btnclr"  style="text-align:center;" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"><?php echo ('Add New Designation ') ?></h4>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_designation" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="customer_name" class="col-sm-3 col-form-label" style="width: auto;"><?php echo ('New Designation') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input class="form-control" name ="designation" id="designation" type="text" placeholder=""  required="" tabindex="1">
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
<!-- /.modal -->
<div class="modal fade" id="add_bank_info">
   <div class="modal-dialog">
      <div class="modal-content" style="text-align:center;" >
         <div class="modal-header btnclr" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"><?php echo display ('ADD BANK ') ?></h4>
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
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <div class="row">
         <div class="col-sm-8">
         </div>
         <div class="col-sm-4">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?></a>
         <input type="submit" id="addBank"    class="btn btnclr" name="addBank" value="<?php echo display('save') ?>"/>
         </div>
         </div>  </div>
         </form>
      </div>
   </div>
</div>

<script>
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $(document).ready(function () {
        $('#add_city_tax').submit(function (e) {
            e.preventDefault();
            var formData = $("#add_city_tax").serialize();
            formData += "&" + $.param({ csrf_test_name: csrfHash });
            $.ajax({
                type: 'POST',
                data: formData,
                dataType: "json",
                url: '<?php echo base_url(); ?>Cinvoice/add_city_tax',
                success: function (data1, statut) {
                    var $datalist = $('#magic_city_tax');
                    // Clear existing options
                    $datalist.empty();
                    // Add new options
                    for (var i = 0; i < data1.length; i++) {
                        var option = $('<option/>').attr('value', data1[i].city_tax).text(data1[i].city_tax);
                        $datalist.append(option);
                    }
                    $('#new_city_tax').val('');
                    $("#bodyModal1").html("City Tax Added Successfully");
                    $('#city_tax').modal('hide');
                    $('#citytx').show();
                    $('#myModal1').modal('show');
                    window.setTimeout(function () {
                        $('#city_tax').modal('hide');
                        $('#myModal1').modal('hide');
                    }, 2000);
                }
            });
        });
    });
   5.
   // Payroll Insert Data
     $('#add_payroll_type').submit(function(e){
       e.preventDefault();
         var data = {
           data : $("#add_payroll_type").serialize()
         };
         data[csrfName] = csrfHash;
         $.ajax({
             type:'POST',
             data: $("#add_payroll_type").serialize(),
            dataType:"json",
             url:'<?php echo base_url();?>Cinvoice/add_paymentroll_type',
             success: function(data2, statut) {
          var $select = $('select#payroll_type');
               $select.empty();
               console.log(data);
                 for(var i = 0; i < data2.length; i++) {
                    console.log(data2);
           var option = $('<option/>').attr('value', data2[i].proll_type).text(data2[i].proll_type);
           $select.append(option); // append new options
       }
         $('#new_payroll_type').val('');
         $("#bodyModal1").html("Payroll Added Successfully");
         $('#proll_type').modal('hide');
         $('#payroll_type').show();
          $('#myModal1').modal('show');
         window.setTimeout(function(){
           $('#proll_type').modal('hide');
          $('#myModal1').modal('hide');
       }, 2000);
        }
         });
     });
   
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   
   
     $('#add_pay_type').submit(function(e){
       e.preventDefault();
         var data = {
           
           
           data : $("#add_pay_type").serialize()
         
         };
         data[csrfName] = csrfHash;
     
         $.ajax({
             type:'POST',
             data: $("#add_pay_type").serialize(), 
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
     
     
     // Insert Employeee Type
   
     $('#add_employee_type').submit(function(e){
       e.preventDefault();
         var data = {
           
           
           data : $("#add_employee_type").serialize()
         
         };
         data[csrfName] = csrfHash;
     
         $.ajax({
             type:'POST',
             data: $("#add_employee_type").serialize(), 
            dataType:"json",
             url:'<?php echo base_url();?>Cinvoice/add_employee_type',
             success: function(data2, statut) {
        
          var $select = $('select#emp_type');
      
               $select.empty();
               console.log(data);
                 for(var i = 0; i < data2.length; i++) {
                    console.log(data2);
           var option = $('<option/>').attr('value', data2[i].employee_type).text(data2[i].employee_type);
           $select.append(option); // append new options
       }
         $('#emps_type').val('');
         $("#bodyModal1").html("Employee Type Added Successfully");
         $('#employees_type').modal('hide');
         
         $('#emp_type').show();
          $('#myModal1').modal('show');
         window.setTimeout(function(){
           $('#employees_type').modal('hide');
        
          $('#myModal1').modal('hide');
      
       }, 2000);
       
        }
         });
     });
   
   
     // End Employee Type
     
     $(function() {  
       $("#instuc_p2").hide();
       $(".emply_form").hide();
       
       $(".next_pg").click(function(){  
       $("#instuc_p2").show();
       $("#instuc_p1").hide();
   });  
   
   $(".emply_form_btn").click(function(){
       $(".emply_form").show();
       $("#instuc_p2").hide();
       $("#instuc_p1").hide();
       
   
   })
   });  
     // Payroll Insert Data
   
     $('#add_payroll_type').submit(function(e){
       e.preventDefault();
         var data = {
           
           
           data : $("#add_payroll_type").serialize()
         
         };
         data[csrfName] = csrfHash;
     
         $.ajax({
             type:'POST',
             data: $("#add_payroll_type").serialize(), 
            dataType:"json",
             url:'<?php echo base_url();?>Cinvoice/add_paymentroll_type',
             success: function(data2, statut) {
        
          var $select = $('select#payrolltype');
      
               $select.empty();
               console.log(data);
                 for(var i = 0; i < data2.length; i++) {
                    console.log(data2);
           var option = $('<option/>').attr('value', data2[i].payroll_type).text(data2[i].payroll_type);
           $select.append(option); // append new options
       }
         $('#new_payroll_type').val('');
         $("#bodyModal1").html("Payroll Added Successfully");
         $('#payroll_type').modal('hide');
         
         $('#payrolltype').show();
          $('#myModal1').modal('show');
         window.setTimeout(function(){
           $('#payroll_type').modal('hide');
        
          $('#myModal1').modal('hide');
      
       }, 2000);
       
        }
         });
     });
   
     // End Payroll Type
   
   
     $('#add_designation').submit(function(e){
       e.preventDefault();
         var data = {
           
           
           data : $("#add_designation").serialize()
         
         };
         data[csrfName] = csrfHash;
     
         $.ajax({
             type:'POST',
             data: $("#add_designation").serialize(),
            dataType:"json",
             url:'<?php echo base_url();?>Chrm/add_designation_data',
             success: function(data1, statut) {
        
          var $select = $('select#desig');
      
               $select.empty();
               console.log(data);
                 for(var i = 0; i < data1.length; i++) {
           var option = $('<option/>').attr('value', data1[i].id).text(data1[i].designation);
           $select.append(option); // append new options
       }
        $('#designation').val('');
       //    $('#desig').append(result).selectmenu('refresh',true);
         $("#bodyModal1").html("Designation  Added Successfully");
         $('#designation_modal').modal('hide');
         
         $('#desig').show();
          $('#myModal1').modal('show');
         window.setTimeout(function(){
           $('#designation_modal').modal('hide');
        
          $('#myModal1').modal('hide');
      
       }, 2000);
       
        }
         });
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
   
   
</script>
<script type="text/javascript">
   var payrollTypeSelect = document.getElementById('payroll_type');
       var asteriskSpan = document.getElementById('asterisk');
    
       payrollTypeSelect.addEventListener('change', function() {
           var hrateInput = document.getElementById('hrate');
           if (this.value === 'SalesCommission') {
               hrateInput.removeAttribute('required');
              
           } else {
               hrateInput.setAttribute('required', '');
            
           }
       });
   
       // Trigger change event on page load to initialize the asterisk
       payrollTypeSelect.dispatchEvent(new Event('change'));
   $(document).ready(function(){
       $('#payroll_type').change(function(){
           var selectedOption = $(this).val();
           if(selectedOption === 'Hourly') {
               $('#cost').text('Pay rate (Hourly)').show(); // Show the label
               $('#hrate').show(); // Show the input field
           } else if (selectedOption === 'SalesCommission') {
               $('#cost').hide(); // Hide the label
               $('#hrate').hide(); // Hide the input field
           } else {
               $('#cost').text('Pay rate (Daily)').show(); // Show the label
               $('#hrate').show(); // Show the input field
           }
       });
   });
   
   
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
      
       // JavaScript to show the popup
    
   
       document.getElementById("showPopup").addEventListener("click", function() {
       document.getElementById("popup").style.display = "block";
       });
   
       function closeModal() {
       document.getElementById("showPopup").style.display = "none";
       }
   
       document.getElementById("addPopupData").addEventListener("click", function() {
           document.getElementById("popup").style.display = "none";
       });
      
        function closeModal() {
           document.getElementById("popup").style.display = "none";
       }


      // Sales Partner
      document.getElementById("showPopupsalespartner").addEventListener("click", function() {
       document.getElementById("popupsalespartner").style.display = "block";
       });
   
       function closeModalsalepartner() {
       document.getElementById("showPopupsalespartner").style.display = "none";
       }
   
       document.getElementById("addPopupsalespartnerData").addEventListener("click", function() {
           document.getElementById("popupsalespartner").style.display = "none";
       });
      
        function closeModalsalepartner() {
           document.getElementById("popupsalespartner").style.display = "none";
       }
       
   
      // Validate Email
      function validateEmail(input) {
         var regex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
         var submitButton = document.getElementById("checkSubmit");
          input.addEventListener("input", function(event) {
              var value = input.value;
              var newValue = '';
              for (var i = 0; i < value.length; i++) {
                  var char = value.charAt(i);
                  if (/[@._A-Za-z0-9-]/.test(char) || event.shiftKey) {
                      newValue += char;
                  }
              }
              input.value = newValue;

              var isValid = regex.test(input.value);
              
              if (isValid) {
                  var lastPart = input.value.split('.').pop();
                  if (lastPart !== 'com' && lastPart !== 'in') {
                      isValid = false;
                  }
              }

              if (isValid) {
                  document.getElementById("validateemails").style.color = "green";
                  document.getElementById("validateemails").textContent = "Valid email address";
                  submitButton.disabled = false;
              } else {
                  document.getElementById("validateemails").style.color = "red";
                  document.getElementById("validateemails").textContent = "Invalid email address";
                  submitButton.disabled = true;

              }
          });
      }

      
   
      // Allow Numbers
      function validateInput(input) {
         // Remove any non-numeric and non-decimal characters from the input value
         input.value = input.value.replace(/[^0-9.]/g, '');
      }
   
      // Allow Numbers Remove Decimal
      function exitnumbers(input, maxLength) {
         input.value = input.value.replace(/\D/g, '');
         if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
         }
      }
   
      // Only Allow 20 Characters
      function limitAlphabetical(input, maxLength) {
         input.value = input.value.replace(/[^A-Za-z ]/g, '');
   
         if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
         }
      }
   
      // Sales Commision allow 2 digits
      function exitsalecommission(input, maxLength) {
         input.value = input.value.replace(/\D/g, '');
         if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
         }
      }

      // Social Security number 
      function exitsocialsecurity(input, maxLength) {
         input.value = input.value.replace(/\D/g, '');
         if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
         }
      }

      // Routing Number
      function routingrestrict(input, maxLength) {
         input.value = input.value.replace(/\D/g, '');
         if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
         }
      }

      // get Employee select dropdown
      $(document).ready(function(){
         $('#selectemployeeTypes').change(function() {
              var selectedValue = $(this).val();
              if(selectedValue == 'addEmployees') {
                  $('#employeeForms').css('display', 'block');
                  $('#headpartemployeeadd').css('display', 'block');

                  $('#salesPartnerForms').css('display', 'none');
                  $('#headpartsalespartner').css('display', 'none');
              } else if(selectedValue == 'salesPartner') {
                  $('#salesPartnerForms').css('display', 'block');
                  $('#headpartsalespartner').css('display', 'block');

                  $('#employeeForms').css('display', 'none');
                  $('#headpartemployeeadd').css('display', 'none');
              }
          });
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
   .fg {
   display: flex;
   flex-direction: row;
   justify-content: space-between;
   align-items: center;
   margin-bottom: 15px;
   }
   .fg label {
   width: 40%; /* Adjust the width as needed */
   }
   .fg input {
   width: 60%; /* Adjust the width as needed */
   }
</style>