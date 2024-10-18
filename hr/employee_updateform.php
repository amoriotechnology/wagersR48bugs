<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<style>
   input::-webkit-outer-spin-button,
   input::-webkit-inner-spin-button {
   -webkit-appearance: none;
   margin: 0;
   }
   /* Firefox */
   input[type=number] {
   -moz-appearance: textfield;
   }
   .select2-selection{
   display:none;
   }
   .btnclr{
   background-color:<?php echo $setting_detail[0]['button_color']; ?>;
   color: white;
   }
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
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <i class="pe-7s-note2"></i>
      </div>
      <div class="header-title">
         <h1><?php echo ('Edit Employee') ?></h1>
         <small></small>
         <ol class="breadcrumb">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('hrm') ?></a></li>
            <li class="active" style="color:orange;"><?php echo ('Edit Employee') ?></li>
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
      <!-- New Employee Type -->
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading" style="height: 50px;">
                  <div class="panel-title">
                     <a style="float:right;color:white;" href="<?php echo base_url('Chrm/manage_employee') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo ('Manage Employee')?> </a>
                  </div>
               </div>
               <div class="panel-title">
                  <!-- </div> -->
               </div>
               <div class="panel-body">
                  <?php echo form_open_multipart('Chrm/update_employee') ?>
                  <?php  //print_r($employee_data[0]['rate_type']); ?>
                  <form id="update_employee"  method="post">
                  <div class="row">
                     <!-- Left Side -->
                     <div class="col-sm-6">
                        <div class="form-group row">
                           <label for="first_name" class="col-sm-4 col-form-div"><?php echo display('first_name') ?> <i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <input name="first_name" class="form-control" type="text" placeholder="<?php echo display('first_name') ?>" id="first_name" value="<?php echo html_escape($employee_data[0]['first_name'])?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                              <input type="hidden" name="id" value="<?php echo html_escape($employee_data[0]['id']);?>">
                              <input type="hidden" name="old_first_name" value="<?php echo html_escape($employee_data[0]['first_name'])?>">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="middle_name" class="col-sm-4 col-form-div"><?php echo "Middle Name"; ?></label>
                           <div class="col-sm-8">
                              <input name="middle_name" class="form-control" type="text" placeholder="<?php echo "Middle Name"; ?>" value="<?php echo html_escape($employee_data[0]['middle_name'])?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                              <input type="hidden" name="old_middle_name" value="<?php echo html_escape($employee_data[0]['middle_name'])?>">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="last_name" class="col-sm-4 col-form-div"><?php echo display('last_name') ?><i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <input name="last_name" class="form-control" type="text" placeholder="<?php echo display('last_name') ?>" id="last_name" value="<?php echo html_escape($employee_data[0]['last_name'])?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                              <input type="hidden" name="old_last_name" value="<?php echo html_escape($employee_data[0]['last_name'])?>">
                           </div>
                        </div>
                        <div class="form-group row" id="payment_from_1">
                           <label for="designation" class="col-sm-4 col-form-label"> <?php echo display('designation') ?> <i class="text-danger">*</i> </label>
                           <div class="col-sm-8">
                              <select name="designation" id="designation" class="form-control"  required>
                                 <option value="<?php echo html_escape($employee_data[0]['designation'])?>"><?php echo html_escape($employee_data[0]['designation'])?></option>
                                 <?php  foreach($desig as $ds){ ?>
                                 <option value="<?php  echo $ds['designation'] ;?>"><?php  echo $ds['designation'] ;?></option>
                                 <?php  } ?>
                              </select>
                           </div>
                        </div>
                        <!-- <div class="form-group row" id="payment_from">
                           <label for="blood_group" class="col-sm-4 col-form-div"><?php echo display('blood_group') ?> </label>
                           <div class="col-sm-8">
                           <input name="blood_group" class="form-control" type="text" placeholder="<?php echo display('blood_group') ?>" id="blood_group" value="<?php echo html_escape($employee_data[0]['blood_group'])?>">
                           </div>
                           </div> -->
                        <div class="form-group row">
                           <label for="phone" class="col-sm-4 col-form-div"><?php echo display('phone') ?> <i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <input name="phone" class="form-control" type="text" placeholder="<?php echo display('phone') ?>" id="phone" value="<?php echo html_escape($employee_data[0]['phone'])?>">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="Profile Image" class="col-sm-4 col-form-label">
                           Email 
                           </label>
                           <div class="col-sm-8">
                              <input name="email" class="form-control" type="email" placeholder="<?php echo display('email') ?>" id="email" value="<?php echo html_escape($employee_data[0]['email'])?>" oninput="validateEmail(this)">
                              <span id="validateemails" style="margin-top: 10px;"></span>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="address_line_1" class="col-sm-4 col-form-div"><?php echo display('address_line_1') ?></label>
                           <div class="col-sm-8">
                              <textarea name="address_line_1" rows='1' class="form-control" placeholder="<?php echo display('address_line_1') ?>" id="address_line_1"><?php echo html_escape($employee_data[0]['address_line_1'])?></textarea> 
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="address_line_2" class="col-sm-4 col-form-div"><?php echo display('address_line_2') ?></label>
                           <div class="col-sm-8">
                              <textarea name="address_line_2" rows='1' class="form-control" placeholder="<?php echo display('address_line_2') ?>" id="address_line_2"><?php echo html_escape($employee_data[0]['address_line_2'])?></textarea> 
                           </div>
                        </div>
                        <div class="form-group row" id="payment_from">
                           <label for="city" class="col-sm-4 col-form-div"><?php echo display('city') ?></label>
                           <div class="col-sm-8">
                              <input name="city" class="form-control" type="text" placeholder="<?php echo display('city') ?>" id="city" value="<?php echo html_escape($employee_data[0]['city']);?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="state" class="col-sm-4 col-form-label"><?php  echo  display('state');?> <i class="text-danger"></i></label>
                           <div class="col-sm-8">
                              <input name="state" class="form-control" type="text" placeholder="<?php echo display('state') ?>" id="state" value="<?php echo html_escape($employee_data[0]['state']);?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="zip" class="col-sm-4 col-form-div"><?php echo display('zip') ?></label>
                           <div class="col-sm-8">
                              <input name="zip" class="form-control" type="text" placeholder="<?php echo display('zip') ?>" id="zip" value="<?php echo html_escape($employee_data[0]['zip']);?>" oninput="exitnumbers(this, 10)">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="country" class="col-sm-4 col-form-div"><?php echo display('country') ?></label>
                           <div class="col-sm-8">
                              <select name="country" class="form-control">
                                 <option value="<?php echo $employee_data[0]['country'];?>" selected><?php echo html_escape($employee_data[0]['country']);?></option>
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
                        <div class="form-group row" id="employee_type">
                           <label for="employee_type" class="col-sm-4 col-form-label">
                           Add Employee Type <i class="text-danger">*</i>
                           </label>
                           <div class="col-sm-8">
                              <select  name="employee_type" id="emp_type" class="required form-control" required>
                                 <option value="<?php echo html_escape($employee_data[0]['employee_type'])?>"><?php echo html_escape($employee_data[0]['employee_type'])?></option>
                                 <option value="Full Time (W4)">Full Time (W4)</option>
                                 <option value="Contractor (W9)">Contractor (W9)</option>
                                 <option value="Part time">Part time</option>
                                 <?php foreach($emp_data as $emp_type){ ?>
                                 <option value="<?php  echo $emp_type['employee_type'] ;?>"><?php  echo $emp_type['employee_type'] ;?></option>
                                 <?php  } ?>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="emergencycontact" class="col-sm-4 col-form-label"> <?php echo "Emergency Contact Person" ?> </label>
                           <div class="col-sm-8">
                              <input class="form-control" name="emergencycontact" id="emergencycontact" type="text"  style="border:2px solid #D7D4D6;"   placeholder="Emergency Contact person" value="<?php echo html_escape($employee_data[0]['emergencycontact'])?>"  oninput="limitAlphabetical(this, 20)">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="emergencycontactnum" class="col-sm-4 col-form-label"> <?php echo "Emergency Contact  number" ?> </label>
                           <div class="col-sm-8">
                              <input class="form-control" name="emergencycontactnum" id="emergencycontactnum" type="number"  style="border:2px solid #D7D4D6;"   placeholder="Emergency Contact  number" value="<?php echo html_escape($employee_data[0]['emergencycontactnum'])?>"  oninput="exitnumbers(this, 10)">
                           </div>
                        </div>
                     </div>
                     <!-- Right Side -->
                     <div class="col-sm-6">
                        <div class="form-group row" id="payment_from">
                           <label for="city" class="col-sm-4 col-form-div"><?php echo  ('Sales Commission') ?></label>
                           <div class="col-sm-8">
                              <input name="sc" class="form-control" type="text" value="<?php echo html_escape($employee_data[0]['sc']);?>" placeholder="<?php echo 'sales commission' ?>"  oninput="exitsalecommission(this, 2)">
                           </div>
                        </div>
                     <div class="form-group row" id="payment_from">
                           <label for="payroll_type" class="col-sm-4 col-form-label"> Payroll Type <i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <select  name="payroll_type" id="payroll_type"  requried class="form-control" >
                                 <option value="<?php echo html_escape($employee_data[0]['payroll_type'])?>"><?php echo html_escape($employee_data[0]['payroll_type'])?></option>
                                 <option value="Hourly">Hourly</option>
                                 <!--<option value="Salaried-weekly">Salaried-Weekly</option>-->
                                 <!--<option value="Salaried-BiWeekly">Salaried-BiWeekly</option>-->
                                 <!--<option value="Salaried-Monthly">Salaried-Monthly</option>-->
                                 <!--<option value="Salaried-BiMonthly">Salaried-BiMonthly</option>-->
                                 <!--<option value="SalesCommission">SalesCommission</option>-->
                             
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="hour_rate_or_salary"  id="cost" class="col-sm-4 col-form-div">Pay rate(<?php echo $currency; ?>)  <i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <input name="hrate" class="form-control" type="text" placeholder="<?php echo "Pay rate" ?>" id="hrate" value="<?php echo html_escape($employee_data[0]['hrate'])?>" oninput="validateInput(this)">
                           </div>
                        </div>
                        <div class="form-group row" id="payment_from">
                           <label for="paytype" class="col-sm-4 col-form-label"> Payment Type </label>
                           <div class="col-sm-8">
                              <select name="paytype"  id="paytype" class="form-control" style="width: 100%;" >
                                 <option value="<?php echo html_escape($employee_data[0]['rate_type'])?>"><?php echo html_escape($employee_data[0]['rate_type'])?></option>
                                 <option value="Cheque">Cheque</option>
                                 <option value="Direct Deposit">Direct Deposit</option>
                                 <option value="Cash">Cash</option>
                                 <?php  foreach($paytype as $ptype){ ?>
                                 <option value="<?php  echo $ptype['payment_type'] ;?>"><?php  echo $ptype['payment_type'] ;?></option>
                                 <?php  } ?>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="email" class="col-sm-4 col-form-div">Social security number <i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                               <?php
                               if (strlen($employee_data[0]['social_security_number']) >= 4) {
    // Get the substring of the variable value excluding the last 4 characters
    $hiddenDigits = substr($employee_data[0]['social_security_number'], 0, -4);
    // Concatenate the hidden digits with asterisks for the same length
    $hiddenDigits .= str_repeat("*", 4);
} else {
    // If the variable value has less than 4 characters, hide all characters
    $hiddenDigits = str_repeat("*", strlen($employee_data[0]['social_security_number']));
}
                               ?>
                              <input name="ssn" class="form-control" type="text" placeholder="Social security number" value="<?php echo $hiddenDigits;?>" required oninput="exitsocialsecurity(this, 9)">
                           </div>
                        </div>
                        <div class="form-group row" id="bank_name">
                           <label for="bank_name" class="col-sm-4 col-form-label"> <?php echo display('Bank') ?> <i class="text-danger"></i> </label>
                           <div class="col-sm-8">
                              <select name="bank_name" id="bank_name"  class="form-control">
                                 <option value="<?php echo $employee_data[0]['bank_name']; ?>" <?php if($employee_data[0]['bank_name']) { echo 'selected'; } ?>>
                                    <?php echo $employee_data[0]['bank_name']; ?>
                                 </option>
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
                        </div>
                        <div class="form-group row">
                           <label for="blood_group" class="col-sm-4 col-form-div">Routing number </label>
                           <div class="col-sm-8">
                              <input name="routing_number" class="form-control" type="text" placeholder="Routing number" value="<?php echo html_escape($employee_data[0]['routing_number'])?>" oninput="routingrestrict(this, 15)">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="zip" class="col-sm-4 col-form-div"><?php echo 'Account Number' ?></label>
                           <div class="col-sm-8">
                              <input type="text" name="account_number" class="form-control" value="<?php echo $employee_data[0]['account_number']; ?>" oninput="routingrestrict(this, 15)">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="zip" class="col-sm-4 col-form-div"><?php echo ('Employee Tax') ?><i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <select  name="emp_tax_detail" id="emp_tax_detail" class="form-control" required>
                                 <option value="<?php echo html_escape($employee_data[0]['employee_tax'])?>"><?php echo html_escape($employee_data[0]['employee_tax'])?></option>
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
                                    <input list="magic_state_tax" name="state_tax" id="stateTaxDropdown"  value="<?php echo html_escape($employee_data[0]['edit_working_state'])?>"   class="form-control">
                                    <datalist id="magic_state_tax">
                                       <?php foreach ($state_tx as $st) { ?>
                                       <option value="<?php echo $st['state']; ?>"><?php echo $st['state']; ?></option>
                                       <?php } ?>
                                       <option value="Not Applicable">Not Applicable</option>
                                    </datalist>
                                 </div>
                                 <div class="form-group fg">
                                    <label for="localTaxDropdown">City Tax<i class="text-danger">*</i></label>
                                    <input list="magic_local_tax" name="city_tax" id="localTaxDropdown"  value="<?php echo html_escape($employee_data[0]['edit_working_city'])?>"    class="form-control">
                                    <datalist id="magic_local_tax">
                                       <?php foreach ($get_info_city_tax as $gtct) { ?>
                                       <option value="<?php echo $gtct['state']; ?>"><?php echo $gtct['state']; ?></option>
                                       <?php } ?>
                                       <option value="Not Applicable">Not Applicable</option>
                                    </datalist>
                                 </div>
                                 <div class="form-group fg">
                                    <label for="stateLocalTaxDropdown">County Tax<i class="text-danger">*</i></label>
                                    <input list="magic_state_local_tax" name="county_tax" id="stateLocalTaxDropdown"  value="<?php echo html_escape($employee_data[0]['edit_working_county'])?>"   class="form-control">
                                    <datalist id="magic_state_local_tax">
                                       <?php foreach ($get_info_county_tax as $gtcty) { ?>
                                       <option value="<?php echo $gtcty['state']; ?>"><?php echo $gtcty['state']; ?></option>
                                       <?php } ?>
                                       <option value="Not Applicable">Not Applicable</option>
                                    </datalist>
                                 </div>
                                 <div class="form-group fg">
                                    <label for="stateTax2Dropdown">Other Working Tax<i class="text-danger">*</i></label>
                                    <input list="magic_state_tax_2" name="other_working_tax" id="stateTax2Dropdown"   value="<?php echo html_escape($employee_data[0]['edit_working_other'])?>"  class="form-control">
                                    <!--<datalist id="magic_state_tax_2">-->
                                    <!--    <?php //foreach ($state_tx as $st) { ?>-->
                                    <!--        <option value="<?php //echo $st['state']; ?>"><?php //echo $st['state']; ?></option>-->
                                    <!--    <?php //} ?>-->
                                    <!--    <option value="Not Applicable">Not Applicable</option>-->
                                    <!--</datalist>-->
                                 </div>
                              </div>
                              <!-- Living Taxes -->
                              <div class="col-sm-6">
                                 <h4 style="text-align:center;margin-left:140px;">LIVING LOCATION TAXES</h4>
                                 <br>
                                 <div class="form-group fg">
                                    <label for="livingStateTax">State Tax<i class="text-danger">*</i></label>
                                    <input list="magic_living_state_tax" name="living_state_tax"  value="<?php echo html_escape($employee_data[0]['edit_living_state'])?>"    id="livingStateTax" class="form-control">
                                    <datalist id="magic_living_state_tax">
                                       <?php foreach ($state_tx as $st) { ?>
                                       <option value="<?php echo $st['state']; ?>"><?php echo $st['state']; ?></option>
                                       <?php } ?>
                                       <option value="Not Applicable">Not Applicable</option>
                                    </datalist>
                                 </div>
                                 <div class="form-group fg">
                                    <label for="livingCityTax">City Tax<i class="text-danger">*</i></label>
                                    <input list="magic_living_city_tax" name="living_city_tax" id="livingCityTax"  value="<?php echo html_escape($employee_data[0]['edit_living_city'])?>"   class="form-control">
                                    <datalist id="magic_living_city_tax">
                                       <?php foreach ($get_info_city_tax as $gtct) { ?>
                                       <option value="<?php echo $gtct['state']; ?>"><?php echo $gtct['state']; ?></option>
                                       <?php } ?>
                                       <option value="Not Applicable">Not Applicable</option>
                                    </datalist>
                                 </div>
                                 <div class="form-group fg">
                                    <label for="livingCountyTax">County Tax<i class="text-danger">*</i></label>
                                    <input list="magic_living_county_tax" name="living_county_tax" id="livingCountyTax"   value="<?php echo html_escape($employee_data[0]['edit_living_county'])?>"      class="form-control">
                                    <datalist id="magic_living_county_tax">
                                       <?php foreach ($get_info_county_tax as $gtcty) { ?>
                                       <option value="<?php echo $gtcty['state']; ?>"><?php echo $gtcty['state']; ?></option>
                                       <?php } ?>
                                       <option value="Not Applicable">Not Applicable</option>
                                    </datalist>
                                 </div>
                                 <div class="form-group fg">
                                    <label for="livingOtherTax">Other Living Tax<i class="text-danger">*</i></label>
                                    <input list="magic_living_other_tax" name="other_living_tax" id="livingOtherTax"  value="<?php echo html_escape($employee_data[0]['edit_living_other'])?>"   class="form-control">
                                    <!--<datalist id="magic_living_other_tax">-->
                                    <!--    <?php //foreach ($state_tx as $st) { ?>-->
                                    <!--        <option value="<?php //echo $st['state']; ?>"><?php //echo $st['state']; ?></option>-->
                                    <!--    <?php //} ?>-->
                                    <!--    <option value="Not Applicable">Not Applicable</option>-->
                                    <!--</datalist>-->
                                 </div>
                              </div>
                           </div>
                           <br>
                           <div style='float:right;font-weight:bold;'>
                              <!-- Button to add popup data -->
                              <button type="button"  style="background-color:green;margin-left: 335px;width:60px;" class="btn btnclr"   id="addPopupData">Save</button>
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
                                    <input type="file" name="files[]" class="upload" id="attachment" style="visibility: hidden; position: absolute;" multiple/>
                                    <input type="hidden" name="old_image" value="<?php echo html_escape($employee_data[0]['files']);?>">
                                 </p>
                                 <p id="files-area">
                                    <span id="filesList">
                                    <span id="files-names"></span>
                                       </span>
                                 </p>
                                 
                                 <?php
                                    echo '<div class="file-container">';
                                       foreach ($employee_data as $attachment) {
                                           $Final_files = explode(",", $attachment['files']);
                                           foreach ($Final_files as $file) {
                                               $encoded_file = rawurlencode(trim($file));
                                               echo '<p><a href="' . base_url() . 'uploads/employeedetails/' . $encoded_file . '" target="_blank">' . trim($file) . '</a></p>';
                                           }
                                       }
                                       echo '</div>';
                                    ?>
                              </div>
                        </div>
                       <!--  <div class="form-group row" id="employee_type">
                           <label for="employee_type" class="col-sm-4 col-form-label">
                           Attachments <i class="text-danger">*</i>
                           </label>
                           <div class="col-sm-8">
                              <input type="file" name="files[]" class="form-control" placeholder="<?php echo display('picture') ?>" id="image" multiple>
                              <input type="hidden" name="old_image" value="<?php echo html_escape($employee_data[0]['files']);?>">
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
                        <div class="form-group row" id="payrolltype">
                           <label for="profile_image" class="col-sm-4 col-form-label">
                           Profile Image 
                           </label>
                           <div class="col-sm-8">
                              <input type="file" name="profile_image" class="form-control">
                              <input type="hidden" name="old_profileimage" value="<?php echo html_escape($employee_data[0]['profile_image']);?>">
                              <br>
                              <img src="<?php  echo base_url(); ?>uploads/profile/<?php echo $employee_data[0]['profile_image']; ?>" height="40px" width="40px">
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <button type="submit" style="float:center;color:white;" id="checkSubmit" class="btnclr btn  w-md m-b-5"><?php echo display('save') ?></button>
                  <?php echo form_close() ?>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<script>

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
   
   
   
   
   
   
   
   
   
   
   
   
   
   const stateTaxCheckbox = document.getElementById('stateTaxCheckbox');
       const localTaxCheckbox = document.getElementById('localTaxCheckbox');
       const stateLocalTaxCheckbox = document.getElementById('stateLocalTaxCheckbox');
       const stateTaxDropdown = document.getElementById('stateTaxDropdown');
       const stateTaxDropdown1 = document.getElementById('stateTaxDropdown1');
       const localTaxDropdown = document.getElementById('localTaxDropdown');
       const stateLocalTaxDropdown = document.getElementById('stateLocalTaxDropdown');
       stateTaxCheckbox.addEventListener('change', function () {
           if (this.checked) {
               stateLocalTaxCheckbox.disabled = false;
              // localTaxCheckbox.disabled = false;
               stateLocalTaxCheckbox.checked = false;
              // localTaxCheckbox.checked = false;
               stateLocalTaxDropdown.style.display = 'none';
             //  localTaxDropdown.style.display = 'none';
           } else {
               stateLocalTaxCheckbox.disabled = false;
            //   localTaxCheckbox.disabled = false;
           }
           stateTaxDropdown.style.display = this.checked ? 'block' : 'none';
           stateTaxDropdown1.style.display = this.checked ? 'block' : 'none';
       });
       localTaxCheckbox.addEventListener('change', function () {
           if (this.checked) {
               stateLocalTaxCheckbox.disabled = false;
              // stateTaxCheckbox.disabled = false;
               stateLocalTaxCheckbox.checked = false;
             //  stateTaxCheckbox.checked = false;
               stateLocalTaxDropdown.style.display = 'none';
             //  stateTaxDropdown.style.display = 'none';
           } else {
               stateLocalTaxCheckbox.disabled = false;
             //  stateTaxCheckbox.disabled = false;
           }
           localTaxDropdown.style.display = this.checked ? 'block' : 'none';
       });
       stateLocalTaxCheckbox.addEventListener('change', function () {
           if (this.checked) {
               stateTaxCheckbox.disabled = true;
               localTaxCheckbox.disabled = true;
               stateTaxCheckbox.checked = false;
               localTaxCheckbox.checked = false;
               stateTaxDropdown.style.display = 'none';
               stateTaxDropdown1.style.display = 'none';
               localTaxDropdown.style.display = 'none';
           } else {
               stateTaxCheckbox.disabled = false;
               localTaxCheckbox.disabled = false;
           }
           stateLocalTaxDropdown.style.display = this.checked ? 'block' : 'none';
       });
    function toggleDropdown(checkboxId, dropdownId) {
           var checkbox = document.getElementById(checkboxId);
           var dropdown = document.getElementById(dropdownId);
           checkbox.addEventListener('change', function () {
               if (this.checked) {
                   dropdown.style.display = 'inline-block';
               } else {
                   dropdown.style.display = 'none';
               }
           });
       }
       toggleDropdown('stateTaxCheckbox', 'stateTaxDropdown');
       toggleDropdown('stateTaxCheckbox', 'stateTaxDropdown1');
       toggleDropdown('localTaxCheckbox', 'localTaxDropdown');
       toggleDropdown('stateLocalTaxCheckbox', 'stateLocalTaxDropdown');
     document.getElementById('employee_type').addEventListener('change', function() {
       validateDropdown('employee_type');
     });
   
     document.getElementById('emp_tax_detail').addEventListener('change', function() {
       validateDropdown('emp_tax_detail');
     });
   
     document.getElementById('in_department').addEventListener('change', function() {
       validateDropdown('in_department');
     });
   
     function validateDropdown(dropdownId) {
       var dropdown = document.getElementById(dropdownId);
       var selectedValue = dropdown.options[dropdown.selectedIndex].value;
   
       if (selectedValue === '') {
         alert('Please select a value for ' + dropdownId.replace('_', ' '));
         dropdown.focus();
       }
     }
   
     // Add more validation functions as needed
   
     function validateForm() {
       validateDropdown('employee_type');
       validateDropdown('emp_tax_detail');
       validateDropdown('in_department');
       return false;
     }
   // $(document).ready(function(){
   //     $('#payroll_type').change(function(){
   //         var selectedOption = $(this).val();
   //         if(selectedOption === 'Hourly') {
   //             $('#cost').text('Pay rate (Hourly)').show(); // Show the label
   //             $('#hrate').show(); // Show the input field
   //         } else if (selectedOption === 'SalesCommission') {
   //             $('#cost').hide(); // Hide the label
   //             $('#hrate').hide(); // Hide the input field
   //         } else {
   //             $('#cost').text('Pay rate (Daily)').show(); // Show the label
   //             $('#hrate').show(); // Show the input field
   //         }
   //     });
   // });
   
   
   
   
    
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
   
   $(document).on('change', '#payroll_type', function() {
       debugger;
       var selectedOption = $(this).val();
       if (selectedOption === 'Hourly') {
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
                  // Check if there are additional characters after .com or .in
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