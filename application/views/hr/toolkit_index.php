<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>
<style>
        input {
    border: none;
   
 }
textarea:focus, input:focus{
   
    outline: none;
}
 .text-right {
    text-align: left; 
}
th{
    font-size:10px;
}
#content {
   
    padding: 30px;


}


.pagecontroller {
         margin: 5px;
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
    width: 75px;
  }
}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="height:80px;">
        <div class="header-icon">
        <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/hrtoolkit.png"  class="headshotphoto" style="height:50px;" />
      </div>





        <div class="header-title">
        <div class="logo-holder logo-9">
          <h1>Employee Hand Book</h1>
       </div>
       
       <small></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('hrm') ?></a></li>
                <li class="active" style="color:orange;"><?php echo ('Employee Hand Book') ?></li>
           
                <div class="load-wrapp">
                <div class="load-10">
                <div class="bar"></div>
                </div>
                </div>

              </ol>
        </div>
    </section>
    <!-- Main content -->
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



<style>
.landscape-box{

  background:linear-gradient(#c2b8b9,#99b3e8);
  color:black;
    width: 300px;
  text-align:center;
  padding:10px;
  border-radius:15px 15px 15px 15px;
  transition: .4s transform;
  justify-content:center;
  margin:30px;
  display:flex;
}
.box:hover{
  transform: scale(1.1);
  box-shadow:2px 2px 35px black;
}
.box img{
  width:150px;
}
a{
  color:black;
}
.landscape-box h2{
  margin-right:20px;
}
.landscape-box:hover{
  transform scale(1.1)
}
.circular_image {
    width: 60px;
    height: 80px;
 
  overflow: hidden;
  background-color: blue;
  /* commented for demo
  float: left;
  margin-left: 125px;
  margin-top: 20px;
  */
  
  /*for demo*/
  display:inline-block;
  vertical-align:middle;
}
.nname{
  bottom:10px;
}
.circular_image img{
  width:50%;
}
.landscape-box:hover .div{
display: block;
color:black;
}
.landscape-box:hover .s_name{

color:black;
}

.div {
    display: none;
}




    </style>










<style>
  input {
border: none;
   
}
textarea:focus, input:focus{
   
outline: none;
}
.text-right {
text-align: left;
}
th{
font-size:10px;
}
#content {
   
padding: 30px;


}


#button{
     
height: 100px;
width: 200px;
background-color: #80bfff;
color: white;
font: monospace;
font-weight: bold;
font-size: 20px;
border-radius: 20px;
border: 0px;
transition: 1s ease-in-out;
}


#button:hover{
background-color: white;
color: black;
border: 1px solid black;
}

#button a{
color: white;
font: monospace;
font-weight: bold;
font-size: 20px;
text-decoration: none;
transition: 0.5s ease-in-out;
}

#button:hover a{
color:black;

}
#button.open {
display:block;
}
pre {
    outline: 1px solid #ccc; 
    padding: 5px; 
    margin: 5px; 
    white-space: pre-wrap;       
    white-space: -moz-pre-wrap;  
    white-space: -pre-wrap;      
    white-space: -o-pre-wrap;    
    word-wrap: break-word;   
    background-color: white ! important;  
    word-break: keep-all; 
    color:black;
}

</style>


<div class="container"  >
<div class="row">
 
<div class="col-sm-8" style="text-align:justify">

       
<!-- <pre style="white-space: pre-wrap;
word-break: keep-all;background-color: white ! important;color: black;"> -->
<pre>
<img src="<?php  echo base_url().$this->session->userdata('logo'); ?>" />
<input type="hidden" value="<?php  echo base_url().$this->session->userdata('logo'); ?>" id="logo"/>
<strong>Table of Contents</strong>

1.INTRODUCTION
1.1.Handbook Disclaimer
1.2.Welcome Message
1.3.Changes in Policy
2.GENERAL EMPLOYMENT
2.1.At-Will
2.2.Immigration Law Compliance
2.3.Equal Employment Opportunity
2.4.Employee Grievances
2.5.Internal Communication
2.6.Outside Employment
2.7.Ant-Retaliation and Whistleblower Policy
3.EMPLOYMENT STATE & RECORDKEEPING
3.1.Employment Classifications
3.2.Personnel Data Changes
3.3.Expense Reimbursement
3.4.Termination of Employment
4.WORKING CONDITIONS & HOURS
4.1.Company Hours
4.2.Emergency Closing
4.3.Parking
4.4.Workplace Safety
4.5.Security
4.6.Meal & Break Periods
4.7.Break Time for Nursing Mothers
5.EMPLOYEE BENEFITS
5.1.Holidays
5.2.Paid Time Off (PTO)
5.3.Military Leave
5.4.Jury Duty
5.5.Workers’ Compensation
6.EMPLOYEE CONDUCT
6.1.Standards of Conduct
6.2.Disciplinary Action
6.3.Confidentiality
6.4.Workplace Violence
6.5.Drug & Alcohol Use
6.6.Sexual & Other Unlawful Harassment
6.7.Telephone Usage
6.8.Personal Property
6.9.Use of Company Property
6.10 Smoking
6.11 Visitors in the Workplace
6.12 Computer, Email & Internet Usage
     <hr>
6.13 Company Supplies
7.TIMEKEEPING & PAYROLL
7.1.Attendance & Punctuality
7.2.Timekeeping
7.3.Paydays
7.4.Payroll Deductions

<strong>Introduction</strong>

<b>Handbook Disclaimer</b>
	
The contents of this handbook serve only as guidelines and supersede any prior handbook. Neither this handbook, nor any other policy or practice, creates an employment contract, or an implied or express promise of continued employment with the organization. Employment with <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> is “AT-WILL.”  This means employees of  <span class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>  may terminate the employment relationship at any time,  for any reason, with or without cause or advance notice. As an at-will employee,it is not guaranteed, in any manner, that you will be employed with <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> for any set period of time.
 
This handbook may provide a summary of employee health benefits, however actual coverage will be determined by the express terms of the benefit plan documents. If there are any conflicts between the handbook or summaries provide and the plan documents, the plan documents will control.The organization reserves the right to amend, interpret, modify or terminate any of its employee benefits programs without prior notice to the extentallowed by law.

The organization also has the right, with or without notice, in an individual case or generally, to change any of the policies in this handbook,or any of its guidelines, policies, practices, working conditions or benefits at any time. No one is authorized to provide any employee with an employment contract or special arrangement concerning terms or conditions of employment unless the contract or arrangement is in writing and signed by the president and the employee.
 
Welcome Message

Dear Valued Employee,

Welcome to <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> is committed to providing superior quality and unparalleled customer service in all aspects of our business. We believe each employee contributes to the success and growth of our organization.

This employee handbook contains general information on our policies, practices, and benefits. Please read it carefully. If you have questions regarding the handbook, please discuss them with your supervisor or the owner.

Welcome aboard. We look forward to working with you!

Sincerely,

The Owner
  <hr>
<b>Changes in Policy</b>

Change at <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>   is inevitable. Therefore, we expressly reserve the right to interpret, modify, suspend, cancel, or dispute, all or any part of our policies, procedures, and benefits at any time with or without prior notice. Changes will be effective on the dates determined by <span  class="c_name"><?php echo
$this->session->userdata('company_name'); ?></span>, and after those dates all superseded policies will be null and void. No individual supervisor or manager has the authority to alter the foregoing. Any employee who is unclear or any policy or procedure should consult a supervisor or the owner.

<strong>General Employment</strong>

<b>At- Will Employment</b>
	
Employment with <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> is “at-will”. This means employees are free to resign at any time, with or without cause, and <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> may terminate the employment relationship at any time,with or without cause or advance notice. As an at-will employee, it is not guaranteed, in any manner, that you will be employed with <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> for any set period of time.
The policies set forth in this employee handbook are the policies that are in effect at the time of publication. They may be amended, modified, or terminated at any time by <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>, except for the policy on at-will employment, which may be modified only by a signed, written agreement between the President and the employee at issue. Nothing in this handbook may be construed as creating a promise of future benefits or a binding contract between <span class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> and any of its employees.

<b>Immigration Law Compliance</b>
<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> is committed to employing only United States citizens and aliens who are authorized to work in the United States.


In compliance with the Immigration Reform and Control Act of 1986, as amended, each new employee, as a condition of employment, must complete the Employment Eligibility Verification Form I-9 and present documentation establishing identity and employment eligibility. Former employees who are rehired must also complete the form if they have no completed and I-9 with <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> within the past three years, or if their previous I-9 is no longer retained or valid.


<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> may participate in the federal government’s electronic verification system, known as “E-Verify.” Pursuant to E-Verify, <span class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> provides the Social Security Administration, and if necessary, the Department of Homeland Security with information from each new employee’s form I-9 to confirm work authorization.

<b>Equal Employment Opportunity</b>

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> is an Equal Opportunity Employer. Employment opportunities at <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> are based upon one’s qualifications and capabilities to perform the essential functions of a particular job. All employment opportunities are provided without regard to race, religion, sex (including sexual orientation and transgender status), pregnancy, childbirth or related medical conditions, national origin, age, veteran status, disability, genetic information, or any other characteristic protected by law.

<hr>

This Equal Employment Opportunity policy governs all aspects of employment, including, but not limited to,recruitment, hiring, selection, job assignment, promotions, transfers, compensation, discipline, termination,layoff, access to benefits and training, and all other conditions and privileges of employment.

The organization will provide reasonable accommodations as necessary and where required by law so long as the accommodation does not pose an undue hardship on the business. The organization will also accommodate sincerely held religious beliefs of its employees to the extent the accommodation does not pose an undue hardship on the business. If you would like to request an accommodation, or have any questions about your rights and responsibilities, contact your owner. This policy is not intended to afford employees with any greater protections than those which exist under federal, state or local law.

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> strongly urges the reporting of all instances of discrimination and harassment, and prohibits retaliation against any individual who reports, discrimination, harassment, or participates in an investigation of such report. <span class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> will take appropriate disciplinary action, up to and including immediate termination, against any employee who violates this policy.

<b>Employee Grievances</b>

It is the policy of <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> to maintain a harmonious workplace environment. <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> encourages its employees to express concerns about work-related issues, including workplace communication, interpersonal conflict, and other working conditions. Employees are encouraged to raise concerns with their supervisors. If not resolved at this level, an employee may submit, in writing, a signed grievance to the owner.

After receiving a written grievance, <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> may hold a meeting with the employee, the immediate supervisor, and any other individuals who may assist in the investigation or resolution of the issue. All discussions related to the grievance will be limited to those involved with, and who can assist with,resolving the issue.
Complaints involving alleged discriminatory practices shall be processed in accordance with <span class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>’S sexual and other unlawful harassment policy.

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> assures that all employees filing a grievance or complaint can do so without fear of retaliation or reprisal.

<b>Internal Communication </b>

Effective and ongoing communication with <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> is essential. As such, the organization maintains systems through which important information can be shared among employees and management.

Bulletin boards are posted in designated areas of the workplace to display important information and announcements. In addition, <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> uses the intranet and email to facilitate communication and share access to documents. For information on appropriate email and internet usage, employees may refer to the computer, email, and internet usage policy, to avoid confusion, employees should not post or remove and material from the bulletin boards.
All employees are responsible for checking internal communications on a frequent regular basis. Employees should consult their supervisor with any questions or concerns on information disseminated.

<hr>

<strong>Outside Employment</strong>

Employees may hold outside jobs as long as the employee meets the performance standards of their position with <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>.Unless an alternative work schedule has been approved by <span  class="c_name"><?php echo$this->session->userdata('company_name'); ?></span>, employees will be subject to the organization’s scheduling demands, regardless of any existing outside working assignments; this includes availability for overtime when necessary.

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> property, office space, equipment, materials, trade secrets, and any other confidential information may not be used for any purposed relating to outside employment.

<b>Anti-retaliation and Whistleblower policy</b>

This policy is designed to protect employees address <span  class="c_name"><?php echo
$this->session->userdata('company_name'); ?></span>’S commitment to integrity and ethical behavior. Accordance
with anti-retaliation and whistleblower protection regulations, <span  class="c_name"><?php echo
$this->session->userdata('company_name'); ?></span> will not tolerate any retaliation against an employee who:
* Makes a good faith complaint, or threatens to make a good faith complaint, regarding the suspected
organization or employee violations of the law, including discriminatory or other unfair employment practices;
* Makes a good faith complaint, or threatens to make a good faith complaint, regarding accounting, internal
account controls, or auditing matters that may lead to incorrect, or misinterpretations in financial
accounting;
* Makes a good faith report, or threatens to make a good faith report, of a violation that endangers the
health or safety of an employee, patients, client or customer, environment or general public;
* Objects to, or refuses to participate in, any activity, policy or practice, which the employee reasonably
believes is a violation of the law;
* Provides information to assist in an investigation regarding violations of the law; or
* Files, testifies, participates or assists in a proceeding, action or hearing in relation to alleged
violations of the law.

Retaliation is defined as any adverse employment action against an employee, including, but not limited to,refusal to hire, failure to promote, demotion, suspension, harassment, denial of training opportunities,termination, or discrimination in any manner in the terms and conditions of employment.Anyone found to have engaged in retaliation or in violation of law, policy or practice will be subject to discipline, up to and including termination of employment. Employees who knowingly make a false report of a violation will be subject to disciplinary action, up to and including termination.Employees who wish to report a violation should contact their supervisor or Arul SreeKumar directly. Employees should also review their state and local requirements for any additional reporting guidelines.

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> will promptly and thoroughly investigate and, if necessary, address any reported violation. Employees who have any questions or concerns regarding this policy and related reporting requirements should contact their supervisor, the owner or any state or local agency responsible for investigating alleged violations.

<hr>
    
<b>Employment Status & Recordkeeping</b>
    
<b>Employment Classifications</b>

For purposed of salary administration and eligibility for overtime payments and employee benefits, <span class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> classifies employees as either exempt or non-exempt. Non-exempt employees are entitled to overtime pay in accordance with federal and state overtime provisions. Exempt employees are exempt from federal and state overtime laws and, but for a few narrow exceptions, are generally paid a fixed amount of pay for each workweek in which work is performed. If you can change positions during your employment with <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> or if your job responsibilities change, you will be informed by the owner of any change in your exempt status. In addition to your designation of either exempt or non-exempt, you also belong to one of the following employment categories:

<b>Full-Time:</b>

Full-time employees are regularly scheduled to work greater or equal to 40 hours per week. Generally, regular full-time employees are eligible for <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>’S	benefits, subject to the terms, conditions, and limitations of each benefit program.


<b>Part-Time:</b>

Part-time employees are regularly scheduled to work less than 40 hours per week. Regular part-time employees may be eligible for some <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> benefit programs, subject to the terms, conditions, and limitations of each benefit program.

<b>Temporary:</b>

Temporary employees include those hired for a limited time to assist in specific function or in the completion of a specific project. Temporary employees generally are not entitled to <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> benefits but are eligible for statutory benefits to the extent required by the law. Employment beyond any initially stated period does not in any way imply a change in employment status or classification. Temporary employees retain temporary status unless and until they are notified, by <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> management, of a change.

<b>Personnel Data Changes</b>
	
It is the responsibility of each employee to promptly notify their supervisor or the Owner of any changes in personnel data. Such changes may affect your eligibility for benefits, the amount you pay for benefit premiums, and your receipt of important company information.

If any of the following have changed or will change in the coming future, contact your supervisor or the owner as soon as possible:

-> Legal name
-> Mailing address
-> Telephone number (s)
-> Change of beneficiary
-> Exemptions on your tax forms
-> Emergency contact (s)
-> Training certificates
-> Professional licenses

<hr>
<strong>Expense Reimbursement </strong>

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> reimburses employees for necessary expenditures and reasonable costs incurred in the course of doing their jobs. Expense incurred by any employee must be approved in advance by the owner.

Some expenses that may warrant reimbursement include but are not limited to the following: mileage costs, air or ground transportation costs, lodging, meals for the purpose of carrying out company business, and any other reimbursable expenses as required by the law. employees are expected to make a reasonable effort to limit business expenses to economical options.

To be reimbursed, employees must submit expense reports to the owner for approval. the report must be accompanied by receipts or other documentation substantiating the expenses. Questions regarding this policy should be directed to your supervisor.

<b>Termination of Employment</b>

Termination of employment is an inevitable part of personnel activity within any organization.


<b>Notice of Voluntary Separation</b>
	
Employees who intend to terminate employment with <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> shall provide <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> with at least two weeks written notice. Such notice is intended to all the organization time to adjust to the employee’s departure without placing undue burden on those employees who may be required to fill in before a replacement can be found.

<b>Return of Company Property</b>

Any employee who terminated employment with <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> shall return all files, records, keys, and any other materials that are the property of <span  class="c_name"><?php echo $this->session->userdata('company_name');?></span> prior to their last date of employment.

<b>Final Pay</b>

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> will provide employees with their final pay in accordance with applicable federal, state and local laws.

<b>Benefits Upon Termination </b>

All accrued and/or vested benefits that are due and payable at termination will be paid in accordance with applicable federal, state and local laws.

Certain benefits, such as healthcare coverage, may continue at the employee’s expense, if the employee elects to do so <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> will notify employees of the benefits that may be continued and of the terms, conditions, and limitations of such continuation.

If you have and questions or concerns regarding this policy, contact <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>’S owner.

<hr>
<strong>Working Conditions & Hours</strong>
<b>Company Hours</b>

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> is open for business from

* Monday 7 AM to 5 PM
* Tuesday 7 AM to 5 PM
* Wednesday 7 AM to 5 PM
* Thursday 7 AM to 5 PM
* Friday 7 AM to 5 PM
* Saturday 9 AM to 2 PM

This excludes holidays recognized by <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>. The standard workweek is 40 hours.

Supervisors will advise employees of their scheduled shift, including starting and ending times. Business needs may necessitate a variation in your starting and ending times as well as in the total hours you may be scheduled to work each day and each week.

<b>Emergency Closing</b>


At times, emergencies such as severe weather, fires, or power failures can disrupt company operations. In extreme cases, these circumstances may require the closing of a work facility. The decision to close or delay regular operations will be made by <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> management.

When a decision is made to close the office, employees will receive official notification from their supervisor.

<b>Parking </b>
	
	
<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> provides parking for employees in the building parking lot. There should be ample space for all employees. Employees may only park in open spaces or those designated for use by <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>. Vehicles parked in spaces designated for private use will be towed at the owner’s expense.

<b>Workplace Safety</b>

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> is committed to providing a clean, safe, and healthful work environment for its employees. Maintaining a safe work environment, however, requires the continuous cooperation of all employees. <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> and all employees must comply with all occupational safety and health standards and regulations established by the occupational Safety and Health Act and state and local regulations. In addition, all employees are expected to obey safety rules and exercise caution and common sense in all work activities.


    
<hr>





<b>Complaint and Reporting Procedure</b>

Employees should immediately report any unsafe conditions to their supervisor without fear of reprisal. In the case of an accident that results in injury, regardless of how seemingly insignificant the injury may appear, employees must notify their supervisor. If you believe it would be inappropriate to report the matter to your supervisor, you can report it directly to:

Arulkanth SreeKumar

3561 Lincoln Highway E, Kinzers, PA 17535

732-534-7707

Employees who violate safety standards, cause hazardous or dangerous situations, or fail to report or, where appropriate, remedy such situations may be subject to disciplinary action, up to and including termination of employment.


<b>Retaliation Prohibited:</b>

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> expressly prohibits retaliation against anyone who reports unsafe working conditions or work-related accidents injuries or illnesses. Any form of retaliation will be subject to disciplinary action, up to and including termination of employment. Questions or corners regarding this policy should be directed to your supervisor or the owner.

<b>Security</b>

The purpose of <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>’S security policy is to protect organization assets and to maintain a safe working environment for all employees.

<b>Facility Access:</b>

All regular <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> employees will be issued a key to gain access to <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> facilities. Employees who are issued keys are responsible for their safekeeping. All lost or stolen keys must be reported to your supervisor as soon as possible.

Upon separation from <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>, and request, all keys must be returned to your supervisor

<b>Closing Procedure:</b>

The last employee, or a designated employee, who leaves the office at the end of the business day assumes the responsibility to ensure that: all doors are securely locked, the alarm system is armed, thermostats are set on an appropriate evening and/or weekend setting: and all appliances and lights are turned off with the exception of the lights normally left on for security purposes.

Employees are not permitted on company property after hours without prior written authorization from the owner.


<hr>


<b>Meal & Break Periods </b>
	
In accordance with state and local laws, non-exempt employees will be provided with meal and break periods. Break periods of less than 20 minutes will be paid. Break periods lasting longer than 20 minutes will be unpaid.    
Non-exempt employees must be fully relieved of their job responsibilities and are not permitted to work during unpaid break and meal period of more than 20 minutes. If for any reason a non-exempt employee does not take the applicable meal and rest period that they are provided, the employee must notify his or her supervisor immediately.

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> will schedule meal and break period in order to accommodate organization operating requirements.

<b>Break Time for Nursing Mothers</b>

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> accommodates employees who wish to pump breast milk during the workday by providing reasonable break times to do so. The organization will provide a designated room, other than a bathroom that is shielded from view, free from intrusion from coworkers and the public and is in compliance with all other applicable laws for this purpose. Employees who use regularly scheduled rest breaks to pump breast milk will be paid for the break time. If the pump break does not run concurrently with the employee’s regularly scheduled compensated break, the pump break time will be unpaid.

For questions related to this policy, please contact the owner.

<b>Employee Benefits</b>

<b>Holidays</b>
<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> observes the following paid holidays:
* New Year’s Day
* Memorial Day
* Independence Day
* Labor Day
* Thanksgiving Day
* Christmas Day
Due to the nature of our business, <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> may require employees to work on a holiday. Employees required to work on holidays will be paid holiday pay in accordance with applicable laws.

<b>Paid Time Off (PTO)</b>

Paid Time Off (PTO) is an all-purpose time off policy for eligible employees to use for vacation, illness,injury, or personal business. PTO combines traditional vacation and sick leave plans into one flexible,inclusive policy. PTO is payable in the same manner as the regular salary and is subject to the same withholding elections.
Employees in the following employment classification (s) are eligible to earn and use PTO as described in this policy: Full time employees only
Upon entering an eligible employment classification, employees will begin to earn PTO according to the
following schedule:

<hr>

After 2 year(s) of service employees are eligible for 7 PTO Days.

Unless <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> is required by state or local laws to carry over unused PTO to the following year, employees must use their earned time prior to December 31 of the calendar year; otherwise the time will be forfeited. For details on carryover or other provisions of this policy, contact owner.

Paid time off is paid at your base pay rate at the time of the absence. It does not include overtime or any special forms of compensation such as incentives, commissions, bonuses, or shift differential.

Employees with an unexpected need (i.e. sudden illness or emergency) to request PTO should notify their direct supervisor as early as possible. Employees must also contact their direct supervisor on each additional day of absence.

Work-related accidents and illness are covered by Worker’s Compensation insurance, pursuant to the requirements of the laws in the state(s) in which <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> operates. The PTO policy outlined above does not apply to those illnesses or injuries that are covered by an applicable Worker’s Compensation policy.

<b>Military Leave</b>


<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> grants employees unpaid time off for service, training and other obligations in the uniformed services in accordance with the Uniformed Services Employment and Reemployment Rights Act (USERRA) and any other applicable state law.

All employees requesting time off for military service must provide advance notice to their immediate supervisor, unless military necessity prevents such notice, or it is otherwise impracticable. Continuation of health insurance benefits is available during military leave subject to terms and conditions of the group health plan and applicable law.

Employees are eligible for reemployment for up to five years from the date their military leave began. The period in an individual has to apply for reemployment or report back to work after military service is based on time spent on military duty and on applicable law. For reinstatement guidelines. Contact the owner.

Employees who qualify for reemployment will return to work at a pay level and status equal to which they would have attained had they not taken military leave. They will be treated as though they were continuously employed for purposes of determining benefits based on length of service.

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> complies with all rights and protections under all applicable state laws granting time off for service, training and other obligations in the uniformed services. This includes, but it not limited to, benefits entitlement and continuation, notice and recertification requirements, and reemployment application requirements.

Questions regarding this policy should be directed to the owner.


<hr>



<b>Jury Duty</b>

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> encourage employees to fulfill their civic responsibilities when called upon to serve as a juror. Employees must provide their immediate supervisor with a copy of their jury summons as soon as possible so that the supervisor may make arrangements to accommodate their absence.

Employees on jury duty must report to work on workdays, or parts of workdays, when they are not required to serve. Either <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> or the employee may request an excuse from jury duty if it is determined that the employee’s absence would create serious operational difficulties.

Jury duty will be paid if required by applicable law. if paid, jury duty pay will be calculated on the employee’s base pay rate times the number of hours the employee would otherwise have worked on the day of the absence. If exempt employees miss work because of jury duty, they will receive their full salary, unless they miss the entire workweek. However, <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> may offset any jury-duty fees received by an exempt employee against the salary due for that workweek.

<b>Worker’s Compensation</b>
	
Employees who are injured on the job at <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> are eligible for Worker’s Compensation benefits. Such benefits are provided at no cost to employees and cover any injury or illness sustained in the course of employment that requires medical treatment.

Lost time or medical expenses incurred as a result of an accident or injury which occurred while an employee was on the job will be compensated for in accordance with workers’ compensation laws. This protection is paid for in fill by <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>. No premium is charged for this coverage and no individual enrollment is required. <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> will provide medical care and a portion of lost wages through our insurance carrier.

All job-related accidents or illnesses must be reported to an employee’s supervisor immediately upon occurrence. Supervisors will then immediately contact the owner to obtain the required claim forms and instructions.

Employee Conduct

<b>Standards of the Conduct</b>

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>’S rules and standards of conduct are essential to a productive work environment. As such, employees must familiarize themselves with,and be prepared to follow, the organization’s rules and standards.

While not intended to be an all-inclusive list, the examples below represent behavior that is considered unacceptable in the workplace. Behaviors such as these, as well as other forms of misconduct, may result in disciplinary action. Up to and including termination of employment:

* Theft of inappropriate removal/possession of property
* Falsification of timekeeping records
* Possession, distribution, sale transfer, manufacture or use of alcohol or illegal drugs in the workplace
* Making maliciously false statements about co-workers




* Threatening, intimidating, coercing, or otherwise interfering with the job performance of fellow employees or visitors
* Negligence or improper conduct leading to damage of company owned or customer owned property
* Violation of safety or health rules
* Smoking in the workplace
* Sexual or other unlawful or unwelcome harassment
* Excessive absenteeism
* Unauthorized use of telephones, computers or other company-owned equipment on working time. Working time does not include break periods, mealtimes, or other specified periods during the workday when employees are not engaged in performing their work tasks
* Unauthorized disclosure of any “business secrets” or other confidential or non-public proprietary information relating to the organization’s products, services, customers or processes, wages and other conditions of employment are not considered to be confidential information. This policy is not intended to restrict an employee’s right to discuss, or act together to improve, wages, benefits and working conditions with co-workers or in any way restrict employees’ rights under the National Labor Relations Act. Other forms of misconduct not listed above may also result in disciplinary action, up to and including termination of employment. If you have questions regarding <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>’S standards of conduct, please direct them to your supervisor or owner.

<b>Disciplinary Action</b>

Disciplinary action at <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> is intended to fairly and impartially correct behavior and performance problems early on and to prevent reoccurrence.

Disciplinary action may involve any of the following: verbal warning, written warning, suspension with or without pay, and termination of employment, depending on the severity of the problem and the frequency of the occurrence. <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> reserves the right to administer disciplinary action at its discretion and based upon the circumstances.

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> recognized that certain types of employee behavior are serious enough to justify termination of employment, without observing other disciplinary action first.

These violations include but are not limited to:
* Workplace violence
* Harassment
* Theft of any kind
* Insubordinate behavior
* Vandalism or destruction of company property
* Presence on company property during non-business hours
* Use of company equipment and/or company vehicles without prior authorization
* Indiscretion regarding personal work history, skills or training
* Divulging <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> business practices or any other confidential information
* Any misrepresentation of <span  class="c_name"><?php echo $this->session->userdata('company_name');
?></span> to a customer, a prospective customer, the general public, or an employee Confidentiality



<hr>

    
<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> takes the protection of confidential information very seriously. “Confidential Information” includes, but is not limited to, computer processes, computer programs and codes, customer lists, customer preferences, customers’ personal information, company financial data, marketing strategies, proprietary production processes, research and development strategies, pricing information, business and marketing plans, vendor information, software, databases, and information concerning the creation, acquisition or disposition of products and services.

Confidential information also includes the organization’s intellectual property and information that is not otherwise public. Intellectual property includes, but is not limited to, trade, secrets, ideas, discoveries, writings, trademarks, and inventions developed through the course of your employment with <span class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> and as a direct result of your job responsibilities with <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>. Wages and other conditions of employment are not considered to be confidential information.

To protect such information, employees may not disclose any confidential or non-public proprietary information about the organization to any unauthorized individual. If you receive a request for confidential information you should immediately refer the request to your supervisor.

The unauthorized disclosure of confidential information belonging to the organization, and not otherwise available to personas or companies outside of <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>, may result in disciplinary action, up to and including termination of employment. If you leave the organization, you may not disclose or misuse any confidential information.

The policy is not intended to restrict and employee’s right to discuss, or act together to improve, wages benefits and working conditions with co-workers or in any way restrict employees’ rights under the National Labor Relations Act.
Questions regarding this policy should be directed to the owner.

<b>Workplace Violence</b>

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> strictly prohibits workplace violence, including any act of intimidation, threat, harassment, physical violence, verbal abuse, aggression or coercion against a coworker, vendor, customer, or visitor.
Prohibited actions include, but are not limited to the following examples:
* Physically injuring another person
* Threatening to injure another person
* Engaging in behavior that subjects another person to emotional distress
* Using obscene, abusive or threatening language or gestures
* Bringing an unauthorized firearm or other weapon onto company property
* Threatening to use or using a weapon while on company premises, on company-related business, or during job-related functions
* Intentionally damaging property
All threats or acts of violence should be reported immediately to your supervisor or security personnel.Employees should warn their supervisors or security personnel of any suspicious workplace activity that they observe or that appears problematic. Employee reports made pursuant to this policy will be investigated promptly and will be kept confidential to the maximum extent possible. <span  class="c_name"><?php echo$this->session->userdata('company_name'); ?></span> will not tolerate any form of retaliation against any employee for making a report under this policy.
<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> will take prompt remedial action, up to and including immediate termination, against any employee found to have engaged in threatening behavior or acts of violence.

<hr>

<b>Drug & Alcohol Use</b>

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> is committed to maintaining a workplace free of substance abuse. No employee or individual who performs work for <span

class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> is allowed to consume, possess, sell, purchase, or be impaired by alcohol or illegal drugs, as defined under federal and/or state law, on any property owned or leased on behalf of <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>, or in any vehicle owned or leased on behalf of <span class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>.

The use of over-the-counter drugs and legally prescribed drugs is permitted as long as they are used in the manner for which they were prescribed and provided that such use does not hinder an employee’s ability to safely perform their job. Employees should inform their supervisor if they believe their medication will impair their job performance, safety or the safety of others, or if they believe they need a reasonable accommodation when using such medication.

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> will not tolerate employees who report to work while impaired by the use of alcohol or drugs. All employees should report evidence of alcohol or drug abuse to their supervisor or the owner immediately. In cases in which the use of alcohol or drugs creates an imminent threat to the safety of persons or property, employees are required to report the violation. Failure to do so may result in disciplinary action, up to and including termination of employment.

As a part of our effort to maintain a workplace free of substance abuse, <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> employees may be asked to submit a medical examination and/or clinical testing for the presence of alcohol and/or drugs. Within the limits of federal, state, and local laws. <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> reserves the right to examine and test for drugs and alcohol at our discretion.

As a condition of your employment with <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> employees must comply with this Drug & Alcohol Use Policy. Be advised that no part of the Drug & Alcohol Use Policy shall be construed to alter or amend that at-will employment relationship between <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> and its employees.

Employees found in violation of this policy may be subject to disciplinary action, up to and including termination of employment.

<b>Sexual & Other Unlawful Harassment</b>

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> is committed to a work environment in which all individuals are treated with respect. <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> expressly prohibits discrimination and all forms of employee harassment base on race, color, religion, sex, pregnancy, national origin, age, disability, military or veteran status, or status in any group protected by state or local law.

Sexual Harassment is a form of discrimination and is prohibited by law. For purposes of this policy sexual harassment is defined as unwelcome sexual advances, requests for sexual favors, and other verbal or physical conduct of a sexual nature when this conduct explicitly or implicitly affects an individual’s employment, unreasonably interferes with an individual’s work performance, or creates and intimidating, hostile or offensive work environment. Unwelcome sexual advances (either verbal or physical), requests for sexual favors, and other verbal or physical conduct of a sexual nature constitute sexual harassment when: (1) submission to such conduct is made either explicitly or implicitly a term of condition of employment; (2) submission or rejection of the conduct is used as a basis for making employment decisions; or, (3) the conduct has the purpose of effect of interfering with work performance or creating an intimidating, hostile or offensive work environment.


<hr>

Sexual and unlawful harassment may include a range of behaviors and may involve individuals of the same or different gender. These behaviors include, but are not limite to:

* Unwanted sexual advances or requests for sexual favors
* Sexual or derogatory jokes, comments, or innuendo
* Unwelcomed physical interaction
* Insulting or obscene comments or gestures
* Offensive email, voicemail, or text messages
* Suggestive or sexually explicit posters, calendars, photographs, graffiti, or cartoons
* Making or threatening reprisals after a negative response to sexual advances
* Visual conduct that includes leering, making sexual gestures, or displaying of sexually suggestive objects or pictures, cartoons or posters
* Verbal sexual advances or propositions
* Physical conduct that includes touching, assaulting, or impeding or blocking movements
* Abusive or malicious conduct that a reasonable person would find hostile, offensive, and unrelated to the organization’s legitimate business interests
* Any other visual, verbal, or physical conduct or behavior deemed inappropriate by the organization
    
Harassment on the basis of any other protected characteristic is also strictly prohibited

<b>Complaint Procedure</b>

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> strongly encourages the reporting of all instances of discrimination, harassment, or retaliation. If you believe you have experienced or witnessed harassment or discrimination based on sex, race, national origin, disability, or another factor,promptly report the incident to your supervisor. If you believe it would be inappropriate to discuss the matter with your supervisor, you may bypass your supervisor and report if directly to:

Arulkanth SreeKumar

3561 Lincoln Highway E, Kinzers, PA 17535

7325247707

Any reported allegations of harassment or discrimination will be investigated promptly, thoroughly, and impartially.

Any employee found to be engaged in any form of sexual or other unlawful harassment may be subject to disciplinary action, up to and including termination of employment

<b>Retaliation Prohibited</b>
<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> expressly prohibits retaliation against any individual who reports discrimination or harassment or assists in investigating such charges. Any form of retaliation is considered a direct violation of this policy and, like discrimination or harassment itself, will be subject to disciplinary action, up to and including termination of employment.



</hr>



<b>Telephone Usage</b>
<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> telephones are intended for the sole use of conducting company business. Personal use of the organization’s telephones and individually owned cell phones during business hours should be kept to a minimum or for emergency purposes only. We ask that personal calls only be made or received outside of working hours, including during lunch or break time. Long distance phone callas which are not strictly business-related are expressly prohibited.
Any employee found in violation of this policy will be subject to disciplinary action, up to and including termination of employment.

<b>Personal Property</b>

Employees should use their discretion when bringing personal property into the workplace. <span class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> assumes no risk for any loss or damage to personal property.

Additionally, employees may not possess or display any property that may be viewed as inappropriate or offensive on <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> premises.

<b>Use of Company Property</b>

Company property refers to anything owned by the company: physical, electronic, intellectual, or otherwise.The use of company property is for business necessity only.

When materials or equipment are assigned to an employee for business, it is the employee’s responsibility to see that the equipment is used properly and cared for properly. However, at all times, equipment assigned to the employee remains the property of the organization, and is subject to reassignment and/or use by the organization without prior notice or approval of the employee. This includes, but is not limited to, computer equipment and data stored thereon, voicemail, records, phones, and employee files.

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> has created specific guidelines regarding the use of company equipment. Below is a list of employee responsibilities and limitations with regards to company property.

Personal use of company property

Company property is NOT permitted to be taken from the premises without proper written authority form company management.

<b>Company Tools:</b>

All necessary tools are furnished to employees in order to assist them in their required duties. Each employee is, in turn, responsible for these tools. Tools damaged or stolen as a result of an employee’s negligence will, to the extent permitted by federal, state and local law, be charged to the employee.

<b>Care of Company Property:</b>

Office areas should be kept neat and orderly and all equipment should be well maintained. The theft, misappropriation, or unauthorized removal, possession, or use of company property or equipment is expressly prohibited.
Any action in contradiction to the guidelines set herein may result in disciplinary action, up to and including termination of employment.


</hr>


<b>Smoking</b>

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> provides a smoke-free environment for its employees, customers, and visitors. Smoking, including the use of e-cigarettes and vaporizers, is prohibited throughout the workplace. We have adopted this policy because we have a sincere interest in the health of our employees and in maintaining pleasant working conditions.

<b>Visitors in the Workplace</b>

To ensure the safety and security of <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> and its employees, only authorized visitors are permitted on organization premises and in organization facilities.

All visitors must enter through the main reception area and sign in and out at the front desk. All visitors are also required to wear a “visitor” badge while on <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> premises. Authorized visitors will be escorted to their destination and must be accompanied by a representative of the organization at all times.

Computer, Email & Internet Usage

Computers, email, and the internet allow <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> employees to be more productive. However, it is important that all employees use good business judgement when using <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>’S electronic communications systems (ECS).

<b>Standards of Conduct and ECS</b>

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> strives to maintain a workplace free of discrimination and harassment. Therefore, <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> prohibits the use of the organization’s ECS for bullying, harassing, discriminating, or engaging in other unlawful misconduct, in violation of the organization’s policy against discrimination and harassment.

<b>Copyright and other Intellectual property</b>

Respect all copyright and other intellectual property laws. For the organization’s protection as well as your own, it is critical that you show proper respect for the laws governing copyright, fair use of copyrighted material owned by others, trademarks and other intellectual property, including the organization’s own copyrights, trademarks and brands. Employees are also responsible for ensuring that, when sending any material over the Internet, they have the appropriate distribution rights.

<span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> purchases and licenses the use of various computer software for business purposes and does not own the copyright to this software for use on more than one computer. Employees may only use software according to the software license agreement. <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> prohibits the illegal duplication of software and its related documentation.




<hr>







<b>ECS Guidelines</b>

The following behaviors are examples of previously stated or additional actions under this policy that are prohibited:

* Sending or posting discriminatory, harassing, or threatening messages or images about coworkers, supervisors or the organization that violate the organization’s policy against discrimination and harassment.
* Stealing, using, or disclosing someone else’s code or password without authorization
* Pirating or downloading organization-owned software without permission
* Sending or posting the organization’s confidential material, trade secrets, or non-public proprietary information outside of the organization. Wages and other conditions of employment are not considered confidential material.
* Violating copyright laws and failing to observe licensing agreements.
* Participating in the viewing or exchange of pornography or obscene materials
* Sending or posting messages that threaten, intimidate, coerce, or otherwise interfere with the job performance of fellow employees.
* Attempting to break into the computer system of another organization or person.
* Refusing to cooperate with a security investigation.
* Using the internet for gambling or any illegal activities.
* Sending or posting messages that disparage another organization’s products or services.
* Passing off personal views as representing those of <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>.

<b>Privacy and Monitoring</b>

Computer hardware, software, email, internet connections, and all other computer, data storage or ECS provided by <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> are the property of <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>. Employees have no right of personal privacy when using <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>’S ECS. To ensure productivity of employees, compliance with this policy and with all applicable laws, including harassment and anti-discrimination laws, computer, email and internet usage may be monitored.

This policy is not intended to restrict an employee’s right to discuss, or act together to improve, wages,benefits and working conditions with co-workers or in any way restrict employee’s rights under the National Labor Relations Act.

Violations of this policy may result in disciplinary action, up to and including termination of employment.Questions or concerns related to this policy should be directed to you supervisor or the owner.

</b>Company Supplies</b>

Only authorized persons may purchase supplies in the name of <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span>. No employee whose regular duties do not include purchasing shall incur any expense on behalf of <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> or bind <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> by any promise or representation without express written approval.
    
    
    
    
   



<hr>


 
    
    
    
<strong>Timekeeping & Payroll</strong>

<b>Attendance & Punctuality</b>
	
Absenteeism and tardiness place an undue burden on other employees and on the organization. <span class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> expects regular attendance and punctuality from all employees. This means being in the workplace, ready to work, at your scheduled start time each day and completing your entire shift. Employees are also expected to return from all scheduled meal and break periods on time.

All time off must be requested in writing, in advance, as outlined in the organization’s Paid Time Off (PTO) policy. If an employee is unexpectedly unable to report for work for any reason, he or she must directly notify their supervisor as early as possible, and preferably prior to their scheduled starting time. It is not acceptable to leave a voicemail message with a supervisor, except in extreme emergencies. In cases that warrant leaving a voicemail message or when an employee’s direct supervisor is unavailable, a follow-up call must be made later that day.

If an illness or emergency occurs during work hours, employees should notify their supervisor as soon as possible.

Employees who are going to be absent for more than one day, should contact their supervisor on each day of their absence. <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> reserves the right to ask for a physician’s statement in the event of a long-term illness (three consecutive days), or multiple illnesses or injuries.

If an employee fails to notify their supervisor after three consecutive days of absence, <span class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> will presume that the employee has voluntarily resigned. <span  class="c_name"><?php echo $this->session->userdata('company_name'); ?></span> will review any extenuating circumstances that may have prevented him or her from calling in before the employee is removed from payroll.





Should undue or recurrent absence and tardiness become apparent, the employee will be subject to disciplinary action, up to and including termination of employment.

This policy is not intended to restrict an employee’s right to discuss, or act together to improve, wages,benefits and working conditions with co-workers or in any way restrict employees’ rights under the National Labor Relations Act.

</pre>
<!-- <table><tr><td>
<button id='button'>
<a href = 'https://dev.to/letsgodev/centering-div-headache-1a22'>
DEV.to
</a>
</button>
</td></tr>
  
<tr><td>
<button id='button'>
<div class="col">
<span>Name</span>
<p> name</p>
<button class="edit-btn">edit</button>
<div class="edit-box">
edit 2
</div>
</div>
</button>
</td></tr>
</table> -->

</div>

</div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
    $(document).ready(function(){
        const element = document.getElementById("content");

        if (element) {
            // clone the element
            var clonedElement = element.cloneNode(true);

            // change display of cloned element 
            $(clonedElement).css("display", "block");

            var opt = {  
                margin: 1,  
                filename: "Employee_HandBook.pdf",  
                image: { type: 'jpeg', quality: 0.98 },  
                html2canvas: { scale: 2 },  
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }  
            };  

            html2pdf().set(opt).from(clonedElement).save();  
            // Optionally, you can hide the content after generating PDF
            // $('#content').hide();
        } else {
            console.error("Element with ID 'content' not found.");
        }
    });
</script>


