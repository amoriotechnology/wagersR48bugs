<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Cinvoice extends CI_Controller {



    function __construct() {

        parent::__construct();
        $this->load->model('Web_settings');
            $this->load->library('session');
        $this->db->query('SET SESSION sql_mode = ""');

    }
    // Employee Insert Function
    public function add_agent_info(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Invoices');
        if (!empty($_FILES['files']['name'])) {
            $no_files = count($_FILES["files"]['name']);
            $images = array();
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    // echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                } else {
                  move_uploaded_file(
                            $_FILES["files"]["tmp_name"][$i],
                            "uploads/employeedetails/" . $_FILES["files"]["name"][$i]
                        );
                    $images[] = $_FILES["files"]["name"][$i];
                }
            }
            if ($_FILES["profile_image"]["name"]) {
                $targetDir = "uploads/profile/";
                $fileName = $_FILES["profile_image"]["name"];
                $targetFilePath = $targetDir . $fileName;
                move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFilePath);
            }
            $insertImages = implode(', ', $images);
            $data_empolyee['first_name'] = $this->input->post('first_name');
            $data_empolyee['sc'] = $this->input->post('sc');
            $data_empolyee['middle_name'] = $this->input->post('middle_name');
            $data_empolyee['payroll_type'] = $this->input->post('payroll_type');
            $data_empolyee['last_name'] = $this->input->post('last_name');
            $data_empolyee['hrate'] = $this->input->post('hrate');
            $data_empolyee['designation'] = $this->input->post('designation');
            $data_empolyee['rate_type'] = $this->input->post('paytype');
            $data_empolyee['phone'] = $this->input->post('phone');
            $data_empolyee['social_security_number'] = $this->input->post('ssn');
            $data_empolyee['email'] = $this->input->post('email');
            $data_empolyee['bank_name'] = $this->input->post('bank_name');
            $data_empolyee['profile_image'] = $fileName;
            $data_empolyee['address_line_1'] = $this->input->post('address_line_1');
            $data_empolyee['routing_number'] = $this->input->post('routing_number');
            $data_empolyee['address_line_2'] = $this->input->post('address_line_2');
            $data_empolyee['files'] = $insertImages;
            $data_empolyee['account_number'] = $this->input->post('account_number');
            $data_empolyee['city'] = $this->input->post('city');
            $data_empolyee['employee_tax'] = $this->input->post('emp_tax_detail');
            $data_empolyee['state'] = $this->input->post('state');
            $data_empolyee['zip'] = $this->input->post('zip');
            $data_empolyee['country'] = $this->input->post('country');
            $data_empolyee['employee_type'] = $this->input->post('employee_type');
            $data_empolyee['emergencycontact'] = $this->input->post('emergencycontact');
            $data_empolyee['emergencycontactnum'] = $this->input->post('emergencycontactnum');
            $data_empolyee['e_type'] = 1;
            $data_empolyee['create_by'] = $this->session->userdata('user_id');
            // State Tax Information
            $state_tax = $this->input->post('state_tax');
            $living_state_tax = $this->input->post('living_state_tax');
            if ($state_tax == $living_state_tax) {
                $data_empolyee['state_tx'] = $state_tax;
            } else {
                $data_empolyee['state_tx'] = $state_tax;
                $data_empolyee['living_state_tax'] = $living_state_tax;
            }
            // Local (City) Tax Information
            $city_tax = $this->input->post('city_tax');
            $living_city_tax = $this->input->post('living_city_tax');
            if ($city_tax == $living_city_tax) {
                $data_empolyee['local_tax'] = $city_tax;
            } else {
                $data_empolyee['local_tax'] = $city_tax;
                $data_empolyee['living_local_tax'] = $living_city_tax;
            }
            //  City Tax Information
            $county_tax = $this->input->post('county_tax');
            $living_county_tax = $this->input->post('living_county_tax');
            if ($county_tax == $living_county_tax) {
                $data_empolyee['cty_tax'] = $county_tax;
            } else {
                $data_empolyee['cty_tax'] = $county_tax;
                $data_empolyee['living_county_tax'] = $living_county_tax;
            }
            // Other Tax Info
            $other_working_tax = $this->input->post('other_working_tax');
            $other_living_tax = $this->input->post('other_living_tax');
            if ($county_tax == $county_tax) {
                 $data_empolyee['state_tax_1'] = $other_working_tax;
            } else {
                 $data_empolyee['state_tax_1'] = $other_working_tax;
                $data_empolyee['state_tax_2'] = $other_living_tax;
            }
            $living_state_tax = $this->input->post('living_state_tax');
            $data_empolyee['edit_working_state'] = $state_tax;
            $data_empolyee['edit_living_state'] = $living_state;
            // Local (City) Tax Information
            $city_tax = $this->input->post('city_tax');
            $living_city_tax = $this->input->post('living_city_tax');
            $data_empolyee['edit_working_city'] = $city_tax;
            $data_empolyee['edit_living_city'] = $living_city_tax;
            //  City Tax Information
            $county_tax = $this->input->post('county_tax');
            $living_county_tax = $this->input->post('living_county_tax');
            $data_empolyee['edit_working_county'] = $county_tax;
            $data_empolyee['edit_living_county'] = $living_county_tax;
            // Other Tax Info
            $other_working_tax = $this->input->post('other_working_tax');
            $other_living_tax = $this->input->post('other_living_tax');
            $data_empolyee['edit_working_other'] = $other_working_tax;
            $data_empolyee['edit_living_other'] = $other_living_tax;
        }else{
        if ($_FILES["profile_image"]["name"]) {
            $targetDir = "uploads/profile/";
            $fileName = $_FILES["profile_image"]["name"];
            $targetFilePath = $targetDir . $fileName;
            move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFilePath);
        }
        $data_empolyee['first_name'] = $this->input->post('first_name');
        $data_empolyee['sc'] = $this->input->post('sc');
        $data_empolyee['middle_name'] = $this->input->post('middle_name');
        $data_empolyee['payroll_type'] = $this->input->post('payroll_type');
        $data_empolyee['last_name'] = $this->input->post('last_name');
        $data_empolyee['hrate'] = $this->input->post('hrate');
        $data_empolyee['designation'] = $this->input->post('designation');
        $data_empolyee['rate_type'] = $this->input->post('paytype');
        $data_empolyee['phone'] = $this->input->post('phone');
        $data_empolyee['social_security_number'] = $this->input->post('ssn');
        $data_empolyee['email'] = $this->input->post('email');
        $data_empolyee['bank_name'] = $this->input->post('bank_name');
        $data_empolyee['profile_image'] = $fileName;
        $data_empolyee['address_line_1'] = $this->input->post('address_line_1');
        $data_empolyee['routing_number'] = $this->input->post('routing_number');
        $data_empolyee['address_line_2'] = $this->input->post('address_line_2');
        $data_empolyee['account_number'] = $this->input->post('account_number');
        $data_empolyee['city'] = $this->input->post('city');
        $data_empolyee['employee_tax'] = $this->input->post('emp_tax_detail');
        $data_empolyee['state'] = $this->input->post('state');
        $data_empolyee['zip'] = $this->input->post('zip');
        $data_empolyee['country'] = $this->input->post('country');
        $data_empolyee['employee_type'] = $this->input->post('employee_type');
        $data_empolyee['emergencycontact'] = $this->input->post('emergencycontact');
        $data_empolyee['emergencycontactnum'] = $this->input->post('emergencycontactnum');
        $data_empolyee['e_type'] = 1;
        $data_empolyee['create_by'] = $this->session->userdata('user_id');
        // State Tax Information
        $state_tax = $this->input->post('state_tax');
        $living_state_tax = $this->input->post('living_state_tax');
        if ($state_tax == $living_state_tax) {
            $data_empolyee['state_tx'] = $state_tax;
        } else {
            $data_empolyee['state_tx'] = $state_tax;
            $data_empolyee['living_state_tax'] = $living_state_tax;
        }
        // Local (City) Tax Information
        $city_tax = $this->input->post('city_tax');
        $living_city_tax = $this->input->post('living_city_tax');
        if ($city_tax == $living_city_tax) {
            $data_empolyee['local_tax'] = $city_tax;
        } else {
            $data_empolyee['local_tax'] = $city_tax;
            $data_empolyee['living_local_tax'] = $living_city_tax;
        }
        //  City Tax Information
        $county_tax = $this->input->post('county_tax');
        $living_county_tax = $this->input->post('living_county_tax');
        if ($county_tax == $living_county_tax) {
            $data_empolyee['cty_tax'] = $county_tax;
        } else {
            $data_empolyee['cty_tax'] = $county_tax;
            $data_empolyee['living_county_tax'] = $living_county_tax;
        }
        // Other Tax Info
        $other_working_tax = $this->input->post('other_working_tax');
        $other_living_tax = $this->input->post('other_living_tax');
        if ($county_tax == $county_tax) {
             $data_empolyee['state_tax_1'] = $other_working_tax;
        } else {
             $data_empolyee['state_tax_1'] = $other_working_tax;
            $data_empolyee['state_tax_2'] = $other_living_tax;
        }
        $living_state_tax = $this->input->post('living_state_tax');
        $data_empolyee['edit_working_state'] = $state_tax;
        $data_empolyee['edit_living_state'] = $living_state;
        // Local (City) Tax Information
        $city_tax = $this->input->post('city_tax');
        $living_city_tax = $this->input->post('living_city_tax');
        $data_empolyee['edit_working_city'] = $city_tax;
        $data_empolyee['edit_living_city'] = $living_city_tax;
        //  City Tax Information
        $county_tax = $this->input->post('county_tax');
        $living_county_tax = $this->input->post('living_county_tax');
        $data_empolyee['edit_working_county'] = $county_tax;
        $data_empolyee['edit_living_county'] = $living_county_tax;
        // Other Tax Info
        $other_working_tax = $this->input->post('other_working_tax');
        $other_living_tax = $this->input->post('other_living_tax');
        $data_empolyee['edit_working_other'] = $other_working_tax;
        $data_empolyee['edit_living_other'] = $other_living_tax;
        }
        $this->db->insert('employee_history', $data_empolyee);
        // echo $this->db->last_query(); die();
        $data = $this->db->select('*')->from('employee_history')->where('create_by', $this->session->userdata('user_id'))->get()->result_array();
        echo json_encode($data);
    }
    // Sales Partner Insert Function
    public function add_salespartner(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Invoices');
        if (!empty($_FILES['files']['name'])) {
            $no_files = count($_FILES["files"]['name']);
            $images = array();
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    // echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                } else {
                  move_uploaded_file(
                            $_FILES["files"]["tmp_name"][$i],
                            "uploads/salespartner/" . $_FILES["files"]["name"][$i]
                        );
                    $images[] = $_FILES["files"]["name"][$i];
                }
            }
            if ($_FILES["profile_image"]["name"]) {
                $targetDir = "uploads/profile/salespartner/";
                $fileName = $_FILES["profile_image"]["name"];
                $targetFilePath = $targetDir . $fileName;
                move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFilePath);
            }
            $insertImages = implode(', ', $images);
            $data_empolyee['first_name'] = $this->input->post('first_name');
            $data_empolyee['sc'] = $this->input->post('sc');
            $data_empolyee['middle_name'] = $this->input->post('middle_name');
            $data_empolyee['payroll_type'] = $this->input->post('payroll_type');
            $data_empolyee['last_name'] = $this->input->post('last_name');
            $data_empolyee['salesbusiness_name'] = $this->input->post('salesbusiness_name');
            $data_empolyee['federalidentificationnumber'] = $this->input->post('federalidentificationnumber');
            $data_empolyee['federaltaxclassification'] = $this->input->post('federaltaxclassification');
            $data_empolyee['phone'] = $this->input->post('phone');
            $data_empolyee['social_security_number'] = $this->input->post('ssn');
            $data_empolyee['email'] = $this->input->post('email');
            $data_empolyee['bank_name'] = $this->input->post('bank_name');
            $data_empolyee['profile_image'] = $fileName;
            $data_empolyee['address_line_1'] = $this->input->post('address_line_1');
            $data_empolyee['routing_number'] = $this->input->post('routing_number');
            $data_empolyee['address_line_2'] = $this->input->post('address_line_2');
            $data_empolyee['files'] = $insertImages;
            $data_empolyee['account_number'] = $this->input->post('account_number');
            $data_empolyee['city'] = $this->input->post('city');
            $data_empolyee['employee_tax'] = $this->input->post('emp_tax_detail');
            $data_empolyee['state'] = $this->input->post('state');
            $data_empolyee['zip'] = $this->input->post('zip');
            $data_empolyee['country'] = $this->input->post('country');
            $data_empolyee['employee_type'] = $this->input->post('employee_type');
            $data_empolyee['emergencycontact'] = $this->input->post('emergencycontact');
            $data_empolyee['emergencycontactnum'] = $this->input->post('emergencycontactnum');
            $data_empolyee['e_type'] = 2;
            $data_empolyee['create_by'] = $this->session->userdata('user_id');
            // State Tax Information
            $state_tax = $this->input->post('state_tax');
            $living_state_tax = $this->input->post('living_state_tax');
            if ($state_tax == $living_state_tax) {
                $data_empolyee['state_tx'] = $state_tax;
            } else {
                $data_empolyee['state_tx'] = $state_tax;
                $data_empolyee['living_state_tax'] = $living_state_tax;
            }
            // Local (City) Tax Information
            $city_tax = $this->input->post('city_tax');
            $living_city_tax = $this->input->post('living_city_tax');
            if ($city_tax == $living_city_tax) {
                $data_empolyee['local_tax'] = $city_tax;
            } else {
                $data_empolyee['local_tax'] = $city_tax;
                $data_empolyee['living_local_tax'] = $living_city_tax;
            }
            //  City Tax Information
            $county_tax = $this->input->post('county_tax');
            $living_county_tax = $this->input->post('living_county_tax');
            if ($county_tax == $living_county_tax) {
                $data_empolyee['cty_tax'] = $county_tax;
            } else {
                $data_empolyee['cty_tax'] = $county_tax;
                $data_empolyee['living_county_tax'] = $living_county_tax;
            }
            // Other Tax Info
            $other_working_tax = $this->input->post('other_working_tax');
            $other_living_tax = $this->input->post('other_living_tax');
            if ($county_tax == $county_tax) {
                 $data_empolyee['state_tax_1'] = $other_working_tax;
            } else {
                 $data_empolyee['state_tax_1'] = $other_working_tax;
                $data_empolyee['state_tax_2'] = $other_living_tax;
            }
            $living_state_tax = $this->input->post('living_state_tax');
            $data_empolyee['edit_working_state'] = $state_tax;
            $data_empolyee['edit_living_state'] = $living_state;
            // Local (City) Tax Information
            $city_tax = $this->input->post('city_tax');
            $living_city_tax = $this->input->post('living_city_tax');
            $data_empolyee['edit_working_city'] = $city_tax;
            $data_empolyee['edit_living_city'] = $living_city_tax;
            //  City Tax Information
            $county_tax = $this->input->post('county_tax');
            $living_county_tax = $this->input->post('living_county_tax');
            $data_empolyee['edit_working_county'] = $county_tax;
            $data_empolyee['edit_living_county'] = $living_county_tax;
            // Other Tax Info
            $other_working_tax = $this->input->post('other_working_tax');
            $other_living_tax = $this->input->post('other_living_tax');
            $data_empolyee['edit_working_other'] = $other_working_tax;
            $data_empolyee['edit_living_other'] = $other_living_tax;
        }else{
        if ($_FILES["profile_image"]["name"]) {
            $targetDir = "uploads/profile/";
            $fileName = $_FILES["profile_image"]["name"];
            $targetFilePath = $targetDir . $fileName;
            move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFilePath);
        }
        $data_empolyee['first_name'] = $this->input->post('first_name');
        $data_empolyee['sc'] = $this->input->post('sc');
        $data_empolyee['middle_name'] = $this->input->post('middle_name');
        $data_empolyee['payroll_type'] = $this->input->post('payroll_type');
        $data_empolyee['last_name'] = $this->input->post('last_name');
        $data_empolyee['salesbusiness_name'] = $this->input->post('salesbusiness_name');
        $data_empolyee['federalidentificationnumber'] = $this->input->post('federalidentificationnumber');
        $data_empolyee['federaltaxclassification'] = $this->input->post('federaltaxclassification');
        $data_empolyee['phone'] = $this->input->post('phone');
        $data_empolyee['social_security_number'] = $this->input->post('ssn');
        $data_empolyee['email'] = $this->input->post('email');
        $data_empolyee['bank_name'] = $this->input->post('bank_name');
        $data_empolyee['profile_image'] = $fileName;
        $data_empolyee['address_line_1'] = $this->input->post('address_line_1');
        $data_empolyee['routing_number'] = $this->input->post('routing_number');
        $data_empolyee['address_line_2'] = $this->input->post('address_line_2');
        $data_empolyee['account_number'] = $this->input->post('account_number');
        $data_empolyee['city'] = $this->input->post('city');
        $data_empolyee['employee_tax'] = $this->input->post('emp_tax_detail');
        $data_empolyee['state'] = $this->input->post('state');
        $data_empolyee['zip'] = $this->input->post('zip');
        $data_empolyee['country'] = $this->input->post('country');
        $data_empolyee['employee_type'] = $this->input->post('employee_type');
        $data_empolyee['emergencycontact'] = $this->input->post('emergencycontact');
        $data_empolyee['emergencycontactnum'] = $this->input->post('emergencycontactnum');
        $data_empolyee['e_type'] = 2;
        $data_empolyee['create_by'] = $this->session->userdata('user_id');
        // State Tax Information
        $state_tax = $this->input->post('state_tax');
        $living_state_tax = $this->input->post('living_state_tax');
        if ($state_tax == $living_state_tax) {
            $data_empolyee['state_tx'] = $state_tax;
        } else {
            $data_empolyee['state_tx'] = $state_tax;
            $data_empolyee['living_state_tax'] = $living_state_tax;
        }
        // Local (City) Tax Information
        $city_tax = $this->input->post('city_tax');
        $living_city_tax = $this->input->post('living_city_tax');
        if ($city_tax == $living_city_tax) {
            $data_empolyee['local_tax'] = $city_tax;
        } else {
            $data_empolyee['local_tax'] = $city_tax;
            $data_empolyee['living_local_tax'] = $living_city_tax;
        }
        //  City Tax Information
        $county_tax = $this->input->post('county_tax');
        $living_county_tax = $this->input->post('living_county_tax');
        if ($county_tax == $living_county_tax) {
            $data_empolyee['cty_tax'] = $county_tax;
        } else {
            $data_empolyee['cty_tax'] = $county_tax;
            $data_empolyee['living_county_tax'] = $living_county_tax;
        }
        // Other Tax Info
        $other_working_tax = $this->input->post('other_working_tax');
        $other_living_tax = $this->input->post('other_living_tax');
        if ($county_tax == $county_tax) {
             $data_empolyee['state_tax_1'] = $other_working_tax;
        } else {
             $data_empolyee['state_tax_1'] = $other_working_tax;
            $data_empolyee['state_tax_2'] = $other_living_tax;
        }
        $living_state_tax = $this->input->post('living_state_tax');
        $data_empolyee['edit_working_state'] = $state_tax;
        $data_empolyee['edit_living_state'] = $living_state;
        // Local (City) Tax Information
        $city_tax = $this->input->post('city_tax');
        $living_city_tax = $this->input->post('living_city_tax');
        $data_empolyee['edit_working_city'] = $city_tax;
        $data_empolyee['edit_living_city'] = $living_city_tax;
        //  City Tax Information
        $county_tax = $this->input->post('county_tax');
        $living_county_tax = $this->input->post('living_county_tax');
        $data_empolyee['edit_working_county'] = $county_tax;
        $data_empolyee['edit_living_county'] = $living_county_tax;
        // Other Tax Info
        $other_working_tax = $this->input->post('other_working_tax');
        $other_living_tax = $this->input->post('other_living_tax');
        $data_empolyee['edit_working_other'] = $other_working_tax;
        $data_empolyee['edit_living_other'] = $other_living_tax;
        }
        $this->db->insert('employee_history', $data_empolyee);
        // echo $this->db->last_query(); die();
        $data = $this->db->select('*')->from('employee_history')->where('create_by', $this->session->userdata('user_id'))->get()->result_array();
        echo json_encode($data);
    }
    public function movePdf() {
        $id = $this->input->post('id');
        $file_location = FCPATH . 'uploads/Pdf/';
        $file_name = $_FILES['pdfData']['name'];
        // print_r($_FILES['pdfData']['tmp_name']); die();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdfData']['tmp_name']) && !empty($_FILES['pdfData']['tmp_name'])) {
            if (move_uploaded_file($_FILES['pdfData']['tmp_name'], $file_location . $file_name)) {
                // File uploaded successfully
                $result = $this->Invoices->updateInvoice($id, $file_name);
    
                if ($result) {
                    echo 'File uploaded and database updated successfully!';
                } else {
                    echo 'Error updating database!';
                }
            } else {
                echo 'Error uploading the file!';
            }
        } else {
            echo 'No file received!';
        }
    }




    public function bill_payment(){
        $CI = & get_instance();
        $this->load->model('Invoices');
        $data['company_info']= $this->Invoices->fetchCompanydata();
        $content = $CI->parser->parse('include/bill_history', $data, true);
        $this->template->full_admin_html_view($content);
    }
    public function bill_invoice($id = null){
        $CI = & get_instance();
        $this->load->model('Invoices');
        $company_info = $this->Invoices->company_bill_info($id);
        $currency = $this->Invoices->currenyDetails();
        // print_r($currency[0]['icon']); die();
        $data = array(
         'company_info' => $company_info,
         'bill_id' => $company_info[0]['id'],
         'currency' => $currency[0]['icon']
        );
        // print_r($data); die();
        $content = $CI->parser->parse('include/subscription_invoice', $data, true);
        $this->template->full_admin_html_view($content);
    }
    
    //  public function add_agent_info(){
    //         $CI = & get_instance();
    //         $CI->auth->check_admin_auth();
    //         $CI->load->model('Invoices');
    //         $postData = $this->input->post('new_agent_data');
    //         $postData1 = $this->input->post('new_agent_commission');
    //         $data1=array(
    //         'agent_name' => $postData,
            
    //         'agent_commission'  =>$postData1,
            
    //         'create_by'  => $this->session->userdata('user_id')
    //       );
    //       $this->db->insert('agent', $data1);
    //      //   echo $this->db->last_query();
    //         $data = $this->Invoices->add_agent_insert($postData, $postData1);
    //         echo json_encode($data);
    //       // DIE();
    //     }
 public function payment_edit_exp(){
$tableData = $this->input->post('tableData');
  $this->db->where('payment_id',$tableData[0]['payment']);
        $this->db->delete('payment');
            
       foreach ($tableData as $item) {
    
 $data=array(
            'payment_id' => $item['payment'],
            
            'payment_date'  =>$item['date'],
            'reference_no' => $item['referenceNo'],
            'bank_name' => $item['bankName'],
            'total_amt' => $item['gtotal'],
            'amt_received' =>$item['amountPaid'],
            'balance' => $item['balanceamount'],
            'amt_paid' =>$item['amountPaid'],
            'details' => $item['detail'],
            'attachement' => $this->input->post('attachement'),
            'create_by'  => $this->session->userdata('user_id')
           );
           $this->db->insert('payment', $data);
         
}
$data1=array(

  'paid_amount'  => $tableData[0]['t_amt_paid'],  
  'balance'  => $tableData[0]['t_bal_amt']    

);
$this->db->where('payment_id',$tableData[0]['payment']);
$this->db->where('create_by',$this->session->userdata('user_id'));
 $this->db->update('product_purchase', $data1);
// echo $this->db->last_query();
}

public function payment_edit_serv_pro(){
$tableData = $this->input->post('tableData');
  $this->db->where('payment_id',$tableData[0]['payment']);
        $this->db->delete('payment');
            
       foreach ($tableData as $item) {
    
 $data=array(
            'payment_id' => $item['payment'],
            
            'payment_date'  =>$item['date'],
            'reference_no' => $item['referenceNo'],
            'bank_name' => $item['bankName'],
            'total_amt' => $item['gtotal'],
            'amt_received' =>$item['amountPaid'],
            'balance' => $item['balanceamount'],
            'amt_paid' =>$item['amountPaid'],
            'details' => $item['detail'],
            'attachement' => $this->input->post('attachement'),
            'create_by'  => $this->session->userdata('user_id')
           );
           $this->db->insert('payment', $data);
         
}
$data1=array(

  'amount_paids'  => $tableData[0]['t_amt_paid'],  
  'balances'  => $tableData[0]['t_bal_amt']    

);
$this->db->where('payment_id',$tableData[0]['payment']);
$this->db->where('create_by',$this->session->userdata('user_id'));
 $this->db->update('service', $data1);
 echo $this->db->last_query();
}
public function delete_the_payment(){
                $CI = & get_instance();
                $CI->load->model('Invoices');
                $payment_id = $this->input->post('payment_id');
                $bal = $this->input->post('bal');
                $paid_amt = $this->input->post('paid_amt');
                // Call the delete_pay_info method with sanitized input values
                $payinfo = $CI->Invoices->delete_pay_info();
                // Output JSON response
                $this->output->set_content_type('application/json');
                echo json_encode($payinfo);
            }
    #==============sale delete==============#

    public function sale_invoice_delete($invoice_id)
    {


      
         $payment_id = $this->db->select('payment_id')->from('invoice')->where('invoice_id',$invoice_id)->get()->row()->payment_id;

      $dataw['commercial_invoice_number'] = $this->input->post('commercial_invoice_number',TRUE);

    
         $result1 = $this->db->delete('payment',array('payment_id' => $payment_id));
         $result2 = $this->db->delete('invoice', array('invoice_id' => $invoice_id)); 
         $result3 = $this->db->delete('invoice_details', array('invoice_id' => $invoice_id)); 
         $result4 = $this->db->delete('product_details_history', array('invoice_id' => $invoice_id)); 

  
           
            $this->session->set_flashdata('show', display('successfully_delete'));
      
    
     
        // alert('Successfully Delete');
      redirect('Cinvoice/manage_invoice');
    }
    public function addBankName(){
        $this->load->model('Invoices');
        $BankNameData = $this->input->post('bank_name');
        $data = array(
         'bank_id'   => $this->auth->generator(10),
         'bank_name' => $BankNameData,
         'created_by' => $this->session->userdata('user_id')
        );
        $this->db->insert('bank_add', $data);
        $bank_data = $this->Invoices->insertBankName();
        echo json_encode($bank_data);
    }
    public function supplier_block_info(){
        $CI = & get_instance();
        $this->auth->check_admin_auth();
    
        $CI->load->model('Invoices');
        $supplier_block_no = $this->input->post('supplier_block_no',TRUE);
      
        $product_info = $CI->Invoices->get_product_supplier_block($supplier_block_no);
echo json_encode($product_info);
}
    
    public function insert_taxinfodata(){

        $CI = & get_instance();

        $data = array(
            'tax_id' => $this->auth->generator(10),
            'tax' => $this->input->post('tax'), 
            'description' => $this->input->post('description'),
            'state' => $this->input->post('state'),
            'tax_agency' => $this->input->post('tax_agency'),
            'account' => $this->input->post('account'),
            'show_taxonreturn' => $this->input->post('show_taxonreturn'),
            'status_type' => $this->input->post('status_type'),
            'created_by' => $this->session->userdata('user_id'),
        );
        
        $this->db->insert('tax_information', $data);

        $result = $this->db->select('*')->from('tax_information')->where('status_type','sales')->get()->result_array();

        echo json_encode($result);
    }
    
    
    public function customer_report_data(){
        $CI = & get_instance();
        $this->load->model('Invoices');
          $this->load->model('Customers');
          $CI->load->model('Web_settings');

     //   setting_detail = $CI->Web_settings->retrieve_setting_editdata();
          $data['setting_detail'] = $this->Web_settings->retrieve_setting_editdata();
         $data['customer_name'] = $this->Customers->all_customer();
         $data['get_all_invoice_sale']= $this->Invoices->get_all_invoice_sale();
        //  $data=array (
        //     'setting_detail' => $setting_detail
        // );

         $content = $CI->parser->parse('report/customer_report', $data, true);
        $this->template->full_admin_html_view($content);
}










public function customer_info_report(){
     $CI = & get_instance();
        $this->load->model('Invoices');
          $this->load->model('Customers');
            $CI->load->model('Web_settings');

          $data['setting_detail'] = $CI->Web_settings->retrieve_setting_editdata();
         $data['customer_name'] = $this->Customers->customers_list();
        $data['get_all_invoice_sale']= $this->Invoices->get_all_invoice_sale();

        $content = $CI->parser->parse('report/customer_info_report', $data, true);
        $this->template->full_admin_html_view($content);
}











public function vendor_report_data(){
        $CI = & get_instance();
        $this->load->model('Invoices');
        $this->load->model('Suppliers');
        $CI->load->model('Web_settings');


        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $vendor = $CI->Suppliers->suppliers_list();
        $data['vendor_data']=$vendor;
        $data['get_all_invoice_sale'] = $this->Suppliers->amountGetPurchase();
        $data['supplier_name']= $this->Invoices->supplier_list();
        $data['setting_detail']= $setting_detail;



         $content = $CI->parser->parse('report/vendor_report', $data, true);
        $this->template->full_admin_html_view($content);
}










public function bundle_info(){
        $CI = & get_instance();
        $this->auth->check_admin_auth();
    
        $CI->load->model('Invoices');
        $bundle_no = $this->input->post('bundle_no',TRUE);
      
        $product_info = $CI->Invoices->product_bundle_datas($bundle_no);
echo json_encode($product_info);
}

public function payment_edit(){
$tableData = $this->input->post('tableData');
  $this->db->where('payment_id',$tableData[0]['payment']);
        $this->db->delete('payment');
            
       foreach ($tableData as $item) {
    
 $data=array(
            'payment_id' => $item['payment'],
            
            'payment_date'  =>$item['date'],
            'reference_no' => $item['referenceNo'],
            'bank_name' => $item['bankName'],
            'total_amt' => $item['gtotal'],
            'amt_received' =>$item['amountPaid'],
            'balance' => $item['balanceamount'],
            'amt_paid' =>$item['amountPaid'],
            'details' => $item['detail'],
            'attachement' => $this->input->post('attachement'),
            'create_by'  => $this->session->userdata('user_id')
           );
           $this->db->insert('payment', $data);
         
}
}


    public function insert_proformataxinfo(){

        $CI = & get_instance();

        // print_r($this->input->post()); die();

        $data = array(
            'tax_id' => $this->auth->generator(10),
            'tax' => $this->input->post('tax'), 
            'description' => $this->input->post('description'),
            'state' => $this->input->post('state'),
            'tax_agency' => $this->input->post('tax_agency'),
            'account' => $this->input->post('account'),
            'show_taxonreturn' => $this->input->post('show_taxonreturn'),
            'status_type' => $this->input->post('status_type'),
            'created_by' => $this->session->userdata('user_id'),
        );
        
        $this->db->insert('tax_information', $data);
        
        $result = $this->db->select('*')->from('tax_information')->where('status_type','sales')->get()->result_array();

        echo json_encode($result);
    }

public function update_payment_data() {


  $editedData = $this->input->post();
$payment_date  = $this->input->post('payment_date',TRUE);
        $ref =$this->input->post('ref',TRUE);
  $b_name =$this->input->post('b_name',TRUE);
  $amt_paid=$this->input->post('amt_paid',TRUE);
    $bal=$this->input->post('bal',TRUE);
      $detail=$this->input->post('detail',TRUE);
        $payment_id=$this->input->post('payment_id',TRUE);
$data2 = array(
            
                'payment_date'        =>$payment_date,
                
               'details'  =>$detail,
                 'amt_received'             => $amt_paid,
                  'amt_paid'             => $amt_paid,
                 'balance'     =>$bal,
                 'bank_name'  => $b_name
                
                 );
                   $this->db->where('reference_no', $ref);
                     $this->db->where('payment_id', $payment_id);
                       $this->db->where('create_by', $this->session->userdata('user_id'));
                 $this->db->update('payment', $data2);
                echo $this->db->last_query();
  // Return a response (e.g., success or error)
 //echo $this->db->last_query();
  $response = array('success' => true); // Modify as needed

  // Send JSON response back to the client
  header('Content-Type: application/json');
  echo json_encode($response);
}


    public function bulk_payment(){
        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->model('Invoices');
        $payment_id=$this->input->post('payment_id');
  //    print_r($this->input->post());die();
       // $payment = $CI->Invoices->bulk_payment();
       $payment_unique=$this->input->post('payment_id_this_invoice_1');
  //    print_r($this->input->post());die();
        $payment = $CI->Invoices->bulk_payment();
       $payment = $CI->Invoices->bulk_payment_unique($payment_unique);
     echo json_encode($payment);

  }


    
    public function insert_truckinginfodata(){

        $CI = & get_instance();

        $data = array(
            'tax_id' => $this->auth->generator(10),
            'tax' => $this->input->post('tax'), 
            'description' => $this->input->post('description'),
            'state' => $this->input->post('state'),
            'tax_agency' => $this->input->post('tax_agency'),
            'account' => $this->input->post('account'),
            'show_taxonreturn' => $this->input->post('show_taxonreturn'),
            'status_type' => $this->input->post('status_type'),
            'created_by' => $this->session->userdata('user_id'),
        );
        
        $this->db->insert('tax_information', $data);

        $result = $this->db->select('*')->from('tax_information')->where('status_type','sales')->get()->result_array();
        // print_r($result);

        echo json_encode($result);
    }


    #==============profarma delete==============#

    public function profarma_invoice_delete_form($purchase_id)
    {


        $payment_id = $this->db->select('payment_id')->from('profarma_invoice')->where('purchase_id',$purchase_id)->get()->row()->payment_id;
        $data['purchase_id'] = $this->input->post('purchase_id',TRUE);


        $result1 = $this->db->delete('payment', array('payment_id' => $payment_id)); 
        $result2 = $this->db->delete('profarma_invoice', array('purchase_id' => $purchase_id)); 
        $result3 = $this->db->delete('profarma_invoice_details', array('purchase_id' => $purchase_id)); 




        if ($result3 == true) {
           $this->session->set_userdata(array('message'=>display('successfully_delete')));
        }
   
        
        redirect('Cinvoice/manage_profarma_invoice');
    }


    #==============ocean_export delete==============#
       public function get_product_info(){
        $CI = & get_instance();
        $output = new stdClass;
        $output->csrfName = $this->security->get_csrf_token_name();
        $output->csrfHash = $this->security->get_csrf_hash();
        $output->pdt=$this->input->post('pdt');
        $output->data = "add";
        $product_nam=$this->input->post('product_nam');
        $product_model=$this->input->post('product_model');
        $CI->load->model('Invoices');
      $data=  $CI->Invoices->get_product_info($product_nam,$product_model);
        
        echo json_encode($data);

     }
    public function ocean_export_tracking_delete_form($ocean_export_tracking_id)
    {

        $data['ocean_export_tracking_id'] = $this->input->post('ocean_export_tracking_id',TRUE);
        $result = $this->db->delete('ocean_export_tracking', array('ocean_export_tracking_id' => $ocean_export_tracking_id)); 

        $this->session->set_flashdata('show', display('successfully_delete'));

        redirect('Cinvoice/manage_ocean_export_tracking');
    }



    #==============trucking_delete==============#

    public function trucking_delete_form($trucking_id)
    {

        $data['trucking_id'] = $this->input->post('trucking_id',TRUE);


        $result1 = $this->db->delete('sale_trucking', array('trucking_id' => $trucking_id)); 
        $result2 = $this->db->delete('sale_trucking_details', array('trucking_id' => $trucking_id)); 

        // if ($result2 == true) {
        //    $this->session->set_userdata(array('message'=>display('successfully_delete')));
        // }
        $this->session->set_flashdata('show', display('successfully_delete'));

        
        redirect('Cinvoice/manage_trucking');
    }






public function service_invoice_details(){
     $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->model('Invoices');
       // $value = $this->input->post('value',TRUE);
       
        $content = $CI->Invoices->service_invoice_details();


      echo json_encode($content); 

    die();
}







    public function best_sales_products() {

    $firststart= date('Y-m-d', strtotime('first day of january this year'));
$yearEnd = date('Y-m-d', strtotime('last day of december this year'));

          $this->db->select('a.create_by,b.date,a.product_name, count(*) as quantity');

         $this->db->from('invoice_details a');
         $this->db->join('invoice b', 'b.invoice_id = a.invoice_id');
         $this->db->where('a.create_by',$this->session->userdata('user_id'));
      $this->db->where('b.date >=', $firststart);
        $this->db->where('b.date <=', $yearEnd);
         $this->db->group_by('a.product_name', 'desc');
        $this->db->order_by('count(*)', 'desc');
         $this->db->limit(10);
     $query = $this->db->get();
   //  echo $this->db->last_query();
       $rows = array();
  $result =  $query->result(); 
 foreach($result as $r) { 
     $rows['name'][]=$r->product_name;
         $rows['data'][] = $r->quantity;
}
 
$result = array();
array_push($result,$rows);
echo json_encode($result, JSON_NUMERIC_CHECK);
//print_r($result);
//print_r(json_encode($result, JSON_NUMERIC_CHECK));
    }
    public function updateinvoicedesign($id,$uid)
    {
    
       
     $query='update invoice_design set template='.$id.' where uid='.$uid;
    $this->db->query($query);
    redirect($_SERVER['HTTP_REFERER']);
        redirect('cinvoice/updateinvoicedesign', 'refresh');
    }

    public function index() {
     

        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');

        $content = $CI->linvoice->invoice_add_form();

        $this->template->full_admin_html_view($content);

    }
    public function add_profarma_product_csv() {
        $CI = & get_instance();
        $data = array(
            'title' => display('add_product_csv')
        );
        $content = $CI->parser->parse('invoice/add_profarma_product_csv', $data, true);
        $this->template->full_admin_html_view($content);
    }
   public function uploadProformacsv()
    {
        $CI = & get_instance();
        $this->load->model('Products');
        $data['productdetails'] = $this->Products->get_profarma_product();
        // print_r($data['productdetails']); die();
        $this->load->library('upload');
        $this->load->library('Csvimport');
        if (($_FILES['upload_csv_file']['name'])){
            $files = $_FILES;
            $config = array();
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'csv';
            $config['max_size'] = '1000';
            $this->upload->initialize($config);
              if (!$this->upload->do_upload('upload_csv_file')) {
                $data['error_message'] = $this->upload->display_errors();
                $this->session->set_userdata($data);
            } else {
                $file_data = $this->upload->data();
                $file_path =  './uploads/'.$file_data['file_name'];
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                $this->session->set_userdata('file_path',  $csv_array);
                foreach ($csv_array as $row) {
                    $purchase_id = date('YmdHis');
                    $proforma_data = array(
                        'sales_by'     =>  $this->session->userdata('user_id'),
                        'purchase_id'=>$purchase_id,
                        'purchase_date'=>$row['purchase_date'],
                        'chalan_no'=>$row['chalan_no'],
                        'billing_address'=>$row['billing_address'],
                        'customer_id'=>$row['customer_id'],
                        'pre_carriage'=>$row['pre_carriage'],
                        'country_goods' => $row['country_goods'],
                        'country_destination' => $row['country_destination'],
                        'loading' => $row['loading'],
                        'discharge' => $row['discharge'],
                        'terms_payment' => $row['terms_payment'],
                        'description_goods' => $row['description_goods'],
                         'gtotal' => $row['gtotal'],
                        'amt_paid' => $row['amt_paid'],
                        'bal_amt' => $row['bal_amt'],
                        'ac_details' => $row['ac_details']
                 
                    );
                    // print_r($proforma_data); die();
                    $this->db->insert('profarma_invoice', $proforma_data);
                    $product_id = $this->generator(10);
                    $data_invoice = array(
                        'product_id' => $product_id,
                        'create_by'     =>  $this->session->userdata('user_id'),
                        'purchase_id'=>$purchase_id,
                       
                        'quantity' => $row['quantity'],
                        'rate' => $row['rate'],

                           'total_amount' => $row['total_amount'],
                        'thickness' => $row['thickness'],
                        'description' => $row['description'],
                           'supplier_block_no' => $row['supplier_block_no'],
                        'supplier_slab_no' => $row['supplier_slab_no'],
                        'gross_width' => $row['gross_width'],
                           'gross_height' => $row['gross_height'],
                        'gross_sq_ft' => $row['gross_sq_ft'],
                        'bundle_no' => $row['bundle_no'],
                           'net_width' => $row['net_width'],
                        'net_height' => $row['net_height'],
                        'net_sq_ft' => $row['net_sq_ft'],
                           'cost_sq_ft' => $row['cost_sq_ft'],
                           'cost_sq_slab' => $row['cost_sq_slab'],
                        'sales_amt_sq_ft' => $row['sales_amt_sq_ft'],
                        'sales_slab_amt' => $row['sales_slab_amt']
                    );
                    // print_r($data_invoice);die();
                    $this->db->insert('profarma_invoice_details', $data_invoice);

                }
                $data=array();
                $data=array(
                    'proforma_data' =>$proforma_data
                );
                $content = $this->load->view('invoice/add_profarma_product_csv', $data, true);
                $this->template->full_admin_html_view($content);
                $this->session->set_userdata(array('message'=>display('successfully_added')));
               redirect(base_url('Cinvoice/manage_profarma_invoice'));
                //echo "<pre>"; print_r($insert_data);
            }else {
                $this->session->set_userdata(array('error_message'=>'Please Import Only Csv File'));
                redirect(base_url('Cinvoice/add_profarma_product_csv'));
            }
            $this->session->unset_userdata('file_path');
            unlink($file_path);
            }
        }
    }





    public function add_product_csv() {
        $CI = & get_instance();
        $this->load->model('Products');
        // $data = array(
        //     'title' => display('add_product_csv')
        // );
        $data['productdetails'] = $this->Products->get_product();
        $content = $CI->parser->parse('invoice/add_product_csv', $data, true);
        $this->template->full_admin_html_view($content);
    }
   public function uploadCsv()
    {
        $CI = & get_instance();
        $this->load->model('Products');
        $data['productdetails'] = $this->Products->get_product();
        $this->load->library('upload');
        $this->load->library('Csvimport');
        if (($_FILES['upload_csv_file']['name'])){
            $files = $_FILES;
            $config = array();
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'csv';
            $config['max_size'] = '1000';
            $this->upload->initialize($config);
              if (!$this->upload->do_upload('upload_csv_file')) {
                $data['error_message'] = $this->upload->display_errors();
                $this->session->set_userdata($data);
            } else {
                $file_data = $this->upload->data();
                $file_path =  './uploads/'.$file_data['file_name'];
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                $this->session->set_userdata('file_path',  $csv_array);
              //  $in_id=$this->generator(10);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'sales_by'     =>  $this->session->userdata('user_id'),
                       'invoice_id'=>$this->generator(10),
                        'date'=>$row['date'],
                        'customer_id'=>$row['customer_id'],
                        'commercial_invoice_number'=>$row['commercial_invoice_number'],
                        'container_no'=>$row['container_no'],
                        'bl_no'=>$row['bl_no'],
                        'billing_address' => $row['billing_address'],
                        'payment_terms' => $row['payment_terms'],
                        'payment_due_date' => $row['payment_due_date'],
                        'etd' => $row['etd'],
                        'eta' => $row['eta'],
                        'ac_details' => $row['ac_details'],
                        'remark' => $row['remark'],
                        'shipping_address' => $row['shipping_address'],
                        'ac_details' => $row['ac_details'],
                     
                    );
                    $this->db->insert('invoice', $insert_data);
                   //echo $this->db->last_query();
                  //  $product_id = $this->generator(10);
            //         $data_invoice = array(
            //           // 'product_id' => $product_id,
            //             'create_by'     =>  $this->session->userdata('user_id'),
            //             'invoice_id'=>$row['invoice_id'],
            //             'product_id' =>$row['product_id'],
            //             'product_name' => $row['product_name'],
            //             'quantity' => $row['quantity'],
            //             'rate' => $row['rate'],
            //               'description' => $row['description'],
            //             'thickness' => $row['thickness'],
            //             'total_price' => $row['total_price'],
            //                 'supplier_block_no' => $row['supplier_block_no'],
            //             'supplier_slab_no' => $row['supplier_slab_no'],
            //             'g_width' => $row['g_width'],
            //                   'g_height' => $row['g_height'],
            //             'gross_sqft' => $row['gross_sqft'],
            //             'bundle_no' => $row['bundle_no'],
            //                  'n_width' => $row['n_width'],
            //                   'n_height' => $row['n_height'],
            //             'net_sqft' => $row['net_sqft'],
            //             'cost_sqft' => $row['cost_sqft'],
            // 'cost_slab' => $row['cost_slab'],
            //             'sales_price_sqft' => $row['sales_price_sqft'],
            //             'sales_slab_price' => $row['sales_slab_price'],
            //               'weight' => $row['weight'],
            //             'origin' => $row['origin']

            //         );
            //         //  print_r($data_invoice);die();
            //         $this->db->insert('invoice_details', $data_invoice);
                }
                $data=array();//die();
                $data=array(
                    'insert_data' =>$insert_data
                );
                $content = $this->load->view('invoice/add_product_csv', $data, true);
                $this->template->full_admin_html_view($content);
                $this->session->set_userdata(array('message'=>display('successfully_added')));
               redirect(base_url('Cinvoice/manage_invoice'));
                // echo "<pre>"; print_r($insert_data); die(); echo "</pre>";
            }else {
                $this->session->set_userdata(array('error_message'=>'Please Import Only Csv File'));
                redirect(base_url('Cinvoice/add_product_csv'));
            }
            $this->session->unset_userdata('file_path');
            unlink($file_path);
            }
        }
}





public function uploadTablesalescsv()
    {
        $CI = & get_instance();
        $this->load->model('Products');
        $data['productdetails'] = $this->Products->get_product();
        $this->load->model('Purchases');
        $this->load->library('upload');
        $this->load->library('Csvimport');
        if (($_FILES['uploadproduct_csv_file']['name'])){
            $files = $_FILES;
            $config = array();
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'csv';
            $config['max_size'] = '1000';
            $this->upload->initialize($config);
                 
              if (!$this->upload->do_upload('uploadproduct_csv_file')) {
                $data['error_message'] = $this->upload->display_errors();
                $this->session->set_userdata($data);
            } else {
                $file_data = $this->upload->data();
                $file_path =  './uploads/'.$file_data['file_name'];
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                $this->session->set_userdata('file_path',  $csv_array);
                $i=0;
                foreach ($csv_array as $row) {
                    
                $data_invoicecsv = array(
                    'create_by'     =>  $this->session->userdata('user_id'),
                    'tableid'=>$row['tableid'],
                    'invoice_id'=>$row['invoice_id'],
                    'product_id' =>$row['product_id'],
                    'product_name' => $row['product_name'],
                    'quantity' => $row['quantity'],
                    'rate' => $row['rate'],
                    'description' => $row['description'],
                    'thickness' => $row['thickness'],
                    'total_price' => $row['total_price'],
                    'supplier_block_no' => $row['supplier_block_no'],
                    'supplier_slab_no' => $row['supplier_slab_no'],
                    'g_width' => $row['g_width'],
                    'g_height' => $row['g_height'],
                    'gross_sqft' => $row['gross_sqft'],
                    'bundle_no' => $row['bundle_no'],
                    'n_width' => $row['n_width'],
                    'n_height' => $row['n_height'],
                    'net_sqft' => $row['net_sqft'],
                    'cost_sqft' => $row['cost_sqft'],
                    'cost_slab' => $row['cost_slab'],
                    'sales_price_sqft' => $row['sales_price_sqft'],
                    'sales_slab_price' => $row['sales_slab_price'],
                    'weight' => $row['weight'],
                    'status'  => 1,
                    'origin' => $row['origin']
                );
               // echo $this->db->last_query();
                $this->db->insert('invoice_details', $data_invoicecsv);
               // echo $this->db->last_query(); die();

                $i++;
                }           
                $content = $this->load->view('invoice/add_product_csv', $data_invoicecsv, true);
                $this->template->full_admin_html_view($content);
                $this->session->set_userdata(array('message'=>display('successfully_added')));
            //    redirect(base_url('Cinvoice/manage_invoice'));
             }else {
                $this->session->set_userdata(array('error_message'=>'Please Import Only Csv File'));
                // redirect(base_url('Cinvoice/manage_invoice'));
            }
            $this->session->unset_userdata('file_path');
            unlink($file_path);
        }
    }
}













































    public function add_payment_info(){
        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->model('Invoices');
        $payment_id=$this->input->post('payment_id');
      
        $payment = $CI->Invoices->add_payment_info();
        $payment_get = $CI->Invoices->get_payment_info($payment_id);
        $amt_paid = $this->db->select('sum(amt_paid) as amt_paid')->from('payment')->where('payment_id',$payment_id)->get()->row()->amt_paid;
        $data=array();
        $data=array(
            'payment_get'  =>$payment_get,
            'amt_paid' =>  $amt_paid

        );
        echo json_encode($data);

  }
  
  
  
  
  
  
  
  
  
  
  public function add_payment_infos(){
    $CI = & get_instance();

    $CI->auth->check_admin_auth();

    $CI->load->model('Invoices');
    $payment_id=$this->input->post('payment_id');
  
    $payment = $CI->Invoices->add_payment_infos();
    $payment_get = $CI->Invoices->get_payment_infos($payment_id);
    $amt_paid = $this->db->select('sum(amt_paid) as amt_paid')->from('payment')->where('payment_id',$payment_id)->get()->row()->amt_paid;
    $data=array();
    $data=array(
        'payment_get'  =>$payment_get,
        'amt_paid' =>  $amt_paid
    );

     echo json_encode($data);

}

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  public function payment_history(){
    $CI = & get_instance();

    $CI->auth->check_admin_auth();

    $CI->load->model('Invoices');
    $payment_id=$this->input->post('payment_id');
     $customer_id=$this->input->post('customer_id');
     $current_in_id=$this->input->post('current_in_id');
$overall_payment = $CI->Invoices->get_cust_payment_overall_info($customer_id);
  $get_cust_payment = $CI->Invoices->get_cust_payment_info($customer_id,$current_in_id);
 // print_r($get_cust_payment);
    $payment_get = $CI->Invoices->get_payment_info($payment_id);

    $amt_paid = $this->db->select('sum(amt_paid) as amt_paid')->from('payment')->where('payment_id',$payment_id)->get()->row()->amt_paid;
  // echo $this->db->last_query();
  
    $data=array(
        'overall'  => $overall_payment,
        'based_on_customer' => $get_cust_payment,
        'payment_get'  =>$payment_get,
        'amt_paid' =>  $amt_paid

    );
echo json_encode($data);//die();

}
    public function makepay() {


        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');
        $data=array();
     
       $CI->load->model('Invoices');
       $bank_name = $CI->db->select('bank_name')
       ->from('bank_add')
       ->get()
       ->result_array();
       $data = array(

           'bank_name' =>$bank_name

       );

      
        $content = $this->load->view('invoice/add_bank', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);


    }

     public function profarma_invoice() {

        $CI = & get_instance();

        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
         $CI->load->model('Purchases');
        $CI->load->model('Products');
        $CI->load->model('Categories');
        $CI->load->model('Units');
        $data=array();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        // print_r($currency_details);

        $update_invoice_set = $CI->Web_settings->update_invoice();



        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
       $category_list1= $CI->Categories->category_list_product();
        $unit_list1     = $CI->Units->unit_list();
         $all_supplier1 = $CI->Purchases->select_all_supplier();
       // echo $content = $CI->linvoice->invoice_add_form();
       $CI->load->model('Invoices');
       $data['customer'] = $CI->Invoices->profarma_invoice_customer();
       $profarma_data = $CI->Invoices->getAllProfarmadata();
       $country_code = $CI->db->select('*')->from('country')->get()->result_array();
       $prodt = $CI->Products->get_all_products();
       $data=array(
        'curn_info_default' =>$curn_info_default[0]['currency_name'],
        //  'curn_info_customer'=>$curn_info_customer[0]['currency_name'],
          'currency'  =>$currency_details[0]['currency'],
       'all_supplier'  => $all_supplier1,
               'category_list'=> $category_list1,
            'unit_list'    => $unit_list1,
        'customer' => $CI->Invoices->profarma_invoice_customer(),
         'product'       =>$prodt,
        'voucher_no' => $CI->Invoices->profarma_voucher_no(),


        'update_invoice_set' =>$update_invoice_set,   
        'account' =>$update_invoice_set[0]->account,
        'remarks' =>  $update_invoice_set[0]->remarks,
        'country_code' => $country_code,
        'profarma_data' => $profarma_data,

           'setting_detail' => $setting_detail

       );
    //   print_r($update_invoice_set);
        $content = $this->load->view('invoice/profarma_invoice', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);

    }
    // Get Customer on email
 
    public function email($customer_id){
        $CI = & get_instance();
        $this->load->model('Invoices');
    
        $postData = $this->input->post();
    
        $data = $this->Invoices->get_customer_data($customer_id);
        
        $email_info = $CI->Invoices->get_email_data();
      
    $data1 = array(
       
    'customer_name'    => $data[0]['customer_name'],
    'customer_email'   => $data[0]['customer_email'],
    'email_subject'    => $email_info[0]['subject'],
    'email_greeting'   => $email_info[0]['greeting'],
    'email_message'    => $email_info[0]['message']
    );
    $invoiceList = $CI->parser->parse('invoice/invoice_email_html', $data1, true);
    $this->template->full_admin_html_view($invoiceList);
    
    }

    // Get Customer on email

 public function get_customer($id){
        $id=explode('-',$id);
        $table=$id[1];
        $col=$id[2];
        $id=$id[0];
    if($table=='ocean_export_tracking')
    {
            $sql='SELECT c.* from '.$table.' i JOIN supplier_information c on c.supplier_id=i.supplier_id WHERE i.'.$col.' ="'.$id.'"';
            // echo $sql; die();
      $query=$this->db->query($sql);
      $row=$query->result_array();
      echo $row[0]['primaryemail']; 
    }
    elseif ($table=='sale_trucking') {
      $sql='SELECT c.* from '.$table.' i JOIN customer_information c on i.bill_to=c.customer_id WHERE i.'.$col.' ="'.$id.'"';
      $query=$this->db->query($sql);
      $row=$query->result_array();
        echo $row[0]['customer_email'];
      
    }
    elseif ($table=='sale_packing_list') {
      $sql='SELECT c.* FROM sale_packing_list s JOIN invoice i JOIN customer_information c on c.customer_id=i.customer_id where s.expense_packing_id='.$id;
      $query=$this->db->query($sql);
        $row=$query->result_array();
        echo $row[0]['customer_email'];
    }
    else
    {
           $sql='SELECT c.* from '.$table.' i JOIN customer_information c on c.customer_id=i.customer_id WHERE i.'.$col.' ="'.$id.'"';
     $query=$this->db->query($sql);
      $row=$query->result_array();
        echo $row[0]['customer_email'];

    }

    }

//     // Send email Attachments
//     public function sendmail_with_attachments($invoice_id)
//     {
//       $CA = & get_instance();
//       $CI = & get_instance();
//       $CA->load->model('invoice_design');
//       $CA->load->model('Web_settings');

//       $CI->load->model('invoice_content');

//       $sql='select * from invoice_content ';
//       $query=$this->db->query($sql);
//       $company_content=$query->result_array();
      
//     //   print_r( $company_content);
//     //  echo $this->db->last_query();die();

//       $currency_details = $CI->Web_settings->retrieve_setting_editdata();

//         $setting=  $CI->Web_settings->retrieve_setting_editdata();
//       $this->session->set_userdata('image_email', base_url().$setting[0]['invoice_logo']);
      
//       $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
//     $uid=$_SESSION['user_id'];
//     $sql='select c.* from company_information c join user_login as u on u.cid=c.company_id where u.user_id='.$uid;

//     $query=$this->db->query($sql);
//     $company_info=$query->result_array();
//     $product_sql='select c.* from invoice i join customer_information c on c.customer_id=i.customer_id where i.invoice_id='.$invoice_id;
//     $query=$this->db->query($product_sql);
//   // echo $this->db->last_query();
//     $customer_info=$query->result_array();
//     $this->session->set_userdata('image_email', base_url().$company_info[0]['logo']);
//     $sql='select p.*, i.* from `invoice_details` i join invoice p on p.invoice_id=i.invoice_id where i.invoice_id="'.$invoice_id.'";';
//     $query=$this->db->query($sql);
//     $product_info=$query->result_array();
//     $invoice_sql='select * from `invoice` i join invoice_details p on p.invoice_id=i.invoice_id';
//     $query=$this->db->query($invoice_sql);
//     $invoice_info=$query->result_array();
//     $email_sql = 'SELECT * FROM `email_config`';
//     $query = $this->db->query($email_sql);
//     $email_info = $query->result_array();
//     $sql='select * from invoice where invoice_id='.$invoice_id;
//     $query=$this->db->query($sql);
//     $invoice=$query->result_array();
//     $dataw = $CA->invoice_design->retrieve_data($this->session->userdata('user_id'));
//     $data['curn_info_default'] = $curn_info_default[0]['currency_name'];
//     $data['currency'] = $currency_details;
//     $data['company_info']=$company_info;
//     $data['customer_info']=$customer_info;
//     $data['product_info']=$product_info;
//     $data['invoiceid']=$invoice_id;
//     $data['invoice_info']=$invoice_info;
//     $data['invoice'] = $invoice;


//      $data['company_content'] = $company_content;
//      $data['logo'] = $setting;


//     $data['head']=$dataw;
//     $data['template'] = $dataw[0]['template'];
//     $content = $this->load->view('pdf_attach_mail/new_sale', $data, true);
// }



    
    public function Get_attachments(){
    $CI = & get_instance();
    $this->auth->check_admin_auth();
    $CI->load->model('Invoices');

        $inv_id = $this->input->post('rowinvoiceId');
        $getAttachmentData =  $CI->Invoices->retrieve_attachmentdata($inv_id);
        echo json_encode($getAttachmentData);
   }
   
   
    public function Get_oceanattachments(){
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        
        $ocean_id = $this->input->post('rowoceanId');
        $getOceanAttachmentData = $CI->Invoices->retrieve_oceanattachmentdata($ocean_id);

        echo json_encode($getOceanAttachmentData); 

    }
    
    public function Get_oceanattachments_view(){
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');

        $ocean_id = $this->input->post('ocean_id');
        $getOceanAttachmentDataView = $CI->Invoices->retrieve_oceanattachmentdata_view($ocean_id);

        echo json_encode($getOceanAttachmentDataView); 

    }
    
    public function Get_truckingattachments(){
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $truck_id = $this->input->post('rowTruckId');
        $getTruckingAttachmentData = $CI->Invoices->retrieve_truckingattachmentdata($truck_id);
        // print_r($getTruckingAttachmentData); die();

        echo json_encode($getTruckingAttachmentData); 

    }
    
    public function Get_truckingattachments_view(){
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');

        $truck_id = $this->input->post('trucking_id');
        // echo $truck_id; die();
        $getOceanAttachmentDataView = $CI->Invoices->retrieve_truckingattachmentdata_view($truck_id);

        echo json_encode($getOceanAttachmentDataView); 

    }




    public function sendmail_with_attachments($invoice_id)
    {
      $CA = & get_instance();
      $CI = & get_instance();
      $CA->load->model('invoice_design');
      $CA->load->model('Web_settings');
      $CA->load->model('Invoices');

      $CI->load->model('invoice_content');
      $w = & get_instance();

        $w->load->model('Ppurchases');
      $sql='select * from invoice_content ';
      $query=$this->db->query($sql);
      $company_content= $CI->invoice_content->retrieve_info_data();
      $getAttach =  $CA->Invoices->retrieve_attach($invoice_id);
      
   
    //  echo $this->db->last_query();die();

      $currency_details = $CI->Web_settings->retrieve_setting_editdata();

      $setting=  $CI->Web_settings->retrieve_setting_editdata();
      $company_info = $w->Ppurchases->retrieve_company();
    //   print_r($company_info);

      $this->session->set_userdata('image_email', base_url().(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']));

      $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
    $uid=$_SESSION['user_id'];
    $sql='select c.* from company_information c join user_login as u on u.cid=c.company_id where u.user_id='.$uid;

    $query=$this->db->query($sql);
    
    
    
    
    
    $product_sql='select c.* from invoice i join customer_information c on c.customer_id=i.customer_id where i.invoice_id='.$invoice_id;
    $query=$this->db->query($product_sql);
   // echo $this->db->last_query();
    $customer_info=$query->result_array();

    $sql='select p.*, i.* from `invoice_details` i join invoice p on p.invoice_id=i.invoice_id where i.invoice_id="'.$invoice_id.'";';
    $query=$this->db->query($sql);
    $product_info=$query->result_array();
    $invoice_sql='select * from `invoice` i join invoice_details p on p.invoice_id=i.invoice_id';
    $query=$this->db->query($invoice_sql);
    $invoice_info=$query->result_array();
    $email_sql = 'SELECT * FROM `email_config`';
    $query = $this->db->query($email_sql);
    $email_info = $query->result_array();
    $sql='select * from invoice where invoice_id='.$invoice_id;
    $query=$this->db->query($sql);
    $invoice=$query->result_array();
    $dataw = $CA->invoice_design->retrieve_data();
    $data['curn_info_default'] = $curn_info_default[0]['currency_name'];
    $data['currency'] = $currency_details;
    $data['company_info']=(!empty($company_content)?$company_content:$company_info);
      $data['company_content']=(!empty($company_content)?$company_content:$company_info);
    $data['customer_info']=$customer_info;
    $data['product_info']=$product_info;
    $data['invoiceid']=$invoice_id;
    $data['invoice_info']=$invoice_info;
    $data['invoice'] = $invoice;

    $data['logo'] = $setting;
//echo $setting[0]['invoice_logo'];

$data['attach'] = $getAttach;


  //  $data['company_content'] = $company_content;
  
   

    $data['head']=$dataw;

    $data['template'] = $dataw[0]['template'];
 
    $content = $this->load->view('pdf_attach_mail/new_sale', $data, true);
}






 public function getvendor_products() {
        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->model('Invoices');
        $value = $this->input->post('value',TRUE);
       
        $content = $CI->Invoices->getvendor_products($value);


      echo json_encode($content);

    }








    public function performa_pdf($purchase_id) {

        $CI = & get_instance();

        $CI->load->model('Invoices');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $purchase_detail = $CI->Invoices->retrieve_profarma_invoice_editdata($purchase_id);

        // print_r($purchase_detail); die();

        $all_profarma = $CI->Invoices->all_profarma($purchase_id);

      
        $product_name = $this->db->select('*')->from('product_information')->where("product_id",$all_profarma[0]['product_id'])->get()->result_array();

      // print_r($product_name);die();
      $setting=  $CI->Web_settings->retrieve_setting_editdata();


        $profarma_details = $this->db->select('*')->from('profarma_invoice_details')->where("purchase_id",$purchase_detail[0]['purchase_id'])->get()->result_array();



        if (!empty($purchase_detail)) {

            $i = 0;

            foreach ($purchase_detail as $k => $v) {

                $i++;

                $purchase_detail[$k]['sl'] = $i;         

        }

    }










        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $CII = & get_instance();
        $CC = & get_instance();
        $w = & get_instance();

        $w->load->model('Ppurchases');
        $company_info = $w->Ppurchases->retrieve_company();
         // print_r($company_info); exit();
        $CII->load->model('invoice_design');
        $CC->load->model('invoice_content');
        $CI1 = & get_instance();
        $CI1->load->model('Purchases');
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
      
        $all_supplier = $CI1->Purchases->select_all_supplier();
        $dataw = $CII->invoice_design->retrieve_data($this->session->userdata('user_id'));
        
       $datacontent = $CI->invoice_content->retrieve_data();
//  print_r($company_info);
//        print_r($datacontent); exit();


       $customer = $this->db->select('*')->from('customer_information')->where("customer_id",$purchase_detail[0]['customer_id'])->get()->result_array();
       // print_r($customer); die();
  //$prinfo = $this->db->select('*')->from('product_information')->where('product_id',$product_id)->get()->result_array();
        
              
        $data = array(
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency'  =>$currency_details[0]['currency'],
            'header'=> $dataw[0]['header'],
            'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:base_url().$company_info[0]['logo']),  
            'color'=> $dataw[0]['color'],
            'template'=> $dataw[0]['template'],
            'all_supplier' => $all_supplier,
           // 'address'=>$datacontent[0]['address'],
            
            'cname'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
            'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
            'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
            'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:$company_info[0]['reg_number']),  
            'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
            'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),   
         
            'customer_currency' => $customer[0]['currency_type'],
            'customer'      => $customer[0]['customer_name'],
      
            'tax' => $purchase_detail[0]['tax_details'],
            'company_info'=> (!empty($datacontent)?$datacontent:$company_info),

          //  'company_info'     => $datacontent,


                 'purchase_id'   => $purchase_detail[0]['purchase_id'],
            'chalan_no'     => $purchase_detail[0]['chalan_no'],
            'purchase_date'  => $purchase_detail[0]['purchase_date'],
            'billing_address'  => $purchase_detail[0]['billing_address'],
            'pre_carriage' => $purchase_detail[0]['pre_carriage'],
            'receipt'    =>  $purchase_detail[0]['receipt'],
            'country_goods'    =>  $purchase_detail[0]['country_goods'],
            'country_destination' =>  $purchase_detail[0]['country_destination'],
            'purchase_info' => $purchase_detail,
            'loading' =>  $purchase_detail[0]['loading'],
            'discharge'=>  $purchase_detail[0]['discharge'],
            'terms_payment'=>  $purchase_detail[0]['terms_payment'],
            'description_goods'=>  $purchase_detail[0]['description_goods'],
            'ac_details' =>  $purchase_detail[0]['ac_details'],
             'remarks' =>  $purchase_detail[0]['remarks'],
            'customer_name' => $purchase_detail[0]['customer_name'],
            'customer_id'   => $purchase_detail[0]['customer_id'],
         'purchase_info'   =>$purchase_detail,
                       
                                                'tax_id'   => $purchase_detail[0]['tax_id']
                                               
                                             
                                                
            

        );

        
 


        $chapterList = $CI->parser->parse('invoice/profarma_invoice_html', $data, true);
        $this->template->full_admin_html_view( $chapterList);


        return $chapterList;

    }
   public function performa_print($purchase_id) {

           $CI = & get_instance();

        $CI->load->model('Invoices');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $purchase_detail = $CI->Invoices->retrieve_profarma_invoice_editdata($purchase_id);

        // print_r($purchase_detail); die();

        $all_profarma = $CI->Invoices->all_profarma($purchase_id);

      
     $product_name = $this->db->select('*')->from('product_information')->where("product_id",$all_profarma[0]['product_id'])->get()->result_array();

      // print_r($product_name);die();
        

        $profarma_details = $this->db->select('*')->from('profarma_invoice_details')->where("purchase_id",$purchase_detail[0]['purchase_id'])->get()->result_array();



        if (!empty($purchase_detail)) {

            $i = 0;

            foreach ($purchase_detail as $k => $v) {

                $i++;

                $purchase_detail[$k]['sl'] = $i;         

        }

    }
     
       $setting=  $CI->Web_settings->retrieve_setting_editdata();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $CII = & get_instance();
        $CC = & get_instance();
        $w = & get_instance();

        $w->load->model('Ppurchases');
        $company_info = $w->Ppurchases->retrieve_company();
         // print_r($company_info); exit();
        $CII->load->model('invoice_design');
        $CC->load->model('invoice_content');
        $CI1 = & get_instance();
        $CI1->load->model('Purchases');
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
      
        $all_supplier = $CI1->Purchases->select_all_supplier();
        $dataw = $CII->invoice_design->retrieve_data($this->session->userdata('user_id'));
        
       $datacontent = $CI->invoice_content->retrieve_data();
       //print_r($datacontent); exit();
       $customer = $this->db->select('*')->from('customer_information')->where("customer_id",$purchase_detail[0]['customer_id'])->get()->result_array();
       // print_r($customer); die();
  //$prinfo = $this->db->select('*')->from('product_information')->where('product_id',$product_id)->get()->result_array();
        
              
        $data = array(
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency'  =>$currency_details[0]['currency'],
            'header'=> $dataw[0]['header'],
            'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:base_url().$company_info[0]['logo']),  
            'color'=> $dataw[0]['color'],
            'template'=> $dataw[0]['template'],
            'all_supplier' => $all_supplier,
            'address'=>$datacontent[0]['address'],
             'company_info'=> (!empty($datacontent)?$datacontent:$company_info),
           'cname'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
            'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
            'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
            'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:$company_info[0]['reg_number']),  
            'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
            'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']), 
         
            'customer_currency' => $customer[0]['currency_type'],
            'customer'      => $customer[0]['customer_name'],
      
            'tax' => $purchase_detail[0]['tax_details'],
            

          
                 'purchase_id'   => $purchase_detail[0]['purchase_id'],
            'chalan_no'     => $purchase_detail[0]['chalan_no'],
            'purchase_date'  => $purchase_detail[0]['purchase_date'],
            'billing_address'  => $purchase_detail[0]['billing_address'],
            'pre_carriage' => $purchase_detail[0]['pre_carriage'],
            'receipt'    =>  $purchase_detail[0]['receipt'],
            'country_goods'    =>  $purchase_detail[0]['country_goods'],
            'country_destination' =>  $purchase_detail[0]['country_destination'],
            'purchase_info' => $purchase_detail,
            'loading' =>  $purchase_detail[0]['loading'],
            'discharge'=>  $purchase_detail[0]['discharge'],
            'terms_payment'=>  $purchase_detail[0]['terms_payment'],
            'description_goods'=>  $purchase_detail[0]['description_goods'],
            'ac_details' =>  $purchase_detail[0]['ac_details'],
             'remarks' =>  $purchase_detail[0]['remarks'],
            'customer_name' => $purchase_detail[0]['customer_name'],
            'customer_id'   => $purchase_detail[0]['customer_id'],
         'purchase_info'   =>$purchase_detail,
                       
                                                'tax_id'   => $purchase_detail[0]['tax_id']
                                               
                                             
                                                
            

        );

        




        $chapterList = $CI->parser->parse('invoice/profarma_invoice_print', $data, true);
        $this->template->full_admin_html_view( $chapterList);


        return $chapterList;

    }


    public function get_email_data(){
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
       // $value = $this->input->post('customer_name',TRUE);
        $email_info = $CI->Invoices->get_email_data();
        echo json_encode($email_info);
    }
     

    function pdf()
    {
        $this->load->library('pdf');
        
        $html = $this->load->view('purchase/trucking_invoice_html', [], true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }

    public function sendmail()
    {
    //Load email library
$this->load->library('email');

$receiver_mail = $this->input->post('email_info',TRUE);
$name_email = $this->input->post('name_email',TRUE);
$subject_email = $this->input->post('subject_email',TRUE);
$message_email = $this->input->post('message_email',TRUE);
//SMTP & mail configuration
$config = array(
    'protocol'  => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'suryavenkatesh3093@gmail.com',
    'smtp_pass' => 'hdafyzlzbjqppnlq',
    'mailtype'  => 'text',
    'charset'   => 'utf-8'
);
$this->email->initialize($config);
$this->email->set_mailtype("html");
$this->email->set_newline("\r\n");

//Email content
$htmlContent = '<h1>Greeting from AmorioTech</h1>';
$htmlContent .= $name_email;
$htmlContent .= $message_email;

$this->email->to($receiver_mail);
$this->email->from('suryavenkatesh3093@gmail.com','AmorioTech');
$this->email->subject($subject_email);
$this->email->message($htmlContent);

//Send email
$this->email->send();
$data = "Message Sent Successfully";
echo json_encode($data);

    
    }
    public function getvendor(){
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Purchases');
        $value = $this->input->post('value',TRUE);
        $vendor_info = $CI->Purchases->select_supplier($value);
        echo json_encode($vendor_info);
       
    }
    public function getvendorbyname(){
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Purchases');
        $value = $this->input->post('value',TRUE);
        $vendor_info = $CI->Purchases->select_supplierbyname($value);
        echo json_encode($vendor_info);
       
    }
 /*   public function getcusto_currency(){
       
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $value = $this->input->post('value1',TRUE);
        $customer_info = $CI->Invoices->getcusto_currency($value);
        echo json_encode($customer_info);
  

   print_r($curn_info_customer);die();
}
*/
    public function getcustomer_data(){
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $value = $this->input->post('value',TRUE);
        $customer_info = $CI->Invoices->getcustomer_data($value);
     
        echo json_encode($customer_info);
        
    }
    public function delete_trucking() {
        $this->db->where('trucking_id', $_GET['val']);
        $this->db->delete('sale_trucking');
        $this->db->where('sale_trucking_id', $_GET['val']);
        $this->db->delete('sale_trucking_id');
           $this->db->where('payment_id', $_GET['payment_id']);
    $this->db->delete('payment');
   }
   public function delete_ocean_export(){
    $this->db->where('booking_no', $_GET['val']);
    $this->db->delete('ocean_export_tracking');
}
public function delete_packing() {
    $this->db->where('expense_packing_id', $_GET['val']);
    $this->db->delete('expense_packing_list');
    $this->db->where('expense_packing_id', $_GET['val']);
    $this->db->delete('expense_packing_list_detail');
}
public function deleteprofarma(){
    $this->db->where('purchase_id', $_GET['val']);
    $this->db->delete('profarma_invoice');
    $this->db->where('purchase_id', $_GET['val']);
    $this->db->delete('profarma_invoice_details');
       $this->db->where('payment_id', $_GET['payment_id']);
    $this->db->delete('payment');
}
public function deletesale(){
    $this->db->where('invoice_id', $_GET['val']);
    $this->db->delete('invoice');
    $this->db->where('invoice_id', $_GET['val']);
    $this->db->delete('invoice_details');
    $this->db->where('payment_id', $_GET['payment_id']);
    $this->db->delete('payment');
}
    public function getcustomer_byID(){
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $value = $this->input->post('value',TRUE);
        $customer_info = $CI->Invoices->customerinfo_rpt($value);
      
        echo json_encode($customer_info);
    }
    public function getdate(){
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $sales_invoice_date = $this->input->post('sales_invoice_date',TRUE);
        $days = $this->input->post('days',TRUE);
     //  echo $sales_invoice_date."===". $days;
      // $days= is_nan($days) ? 0 : $days;
       if($days == "NaN"){
         echo date('Y-m-d');
       }else{
       $date= date('Y-m-d', strtotime($sales_invoice_date. ' +'.$days.' day'));
        echo json_encode($date);
       }
    }
        public function profarma_invoice_update_form($invoice_id)
        {
           
            $CI = & get_instance();

            $CI->auth->check_admin_auth();
    
            $CI->load->library('linvoice');
    
            $content = $CI->linvoice->profarma_edit_data($invoice_id);
    
            $this->template->full_admin_html_view($content);
        }    

    public function packing_list(){
        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');
        $data=array();
       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('invoice/packing_list', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);
    }
  
    public function availability(){
        $CI = & get_instance();
        $output = new stdClass;
        $output->csrfName = $this->security->get_csrf_token_name();
        $output->csrfHash = $this->security->get_csrf_hash();
        $output->pdt=$this->input->post('pdt');
        $output->data = "add";
        $product_nam=$this->input->post('product_nam');
        $product_model=$this->input->post('product_model');
        $CI->load->model('Invoices');
      $data=  $CI->Invoices->availability($product_nam,$product_model);
        
        echo json_encode($data);
       // die();
   // echo $pdt;
    //   print_r($json);
      
     }
     public function product_id(){
        $CI = & get_instance();
        $output = new stdClass;
        $output->csrfName = $this->security->get_csrf_token_name();
        $output->csrfHash = $this->security->get_csrf_hash();
        $output->pdt=$this->input->post('pdt');
        $output->data = "add";
        $product_nam=$this->input->post('product_nam');
        $product_model=$this->input->post('product_model');
        $CI->load->model('Invoices');
      $data=  $CI->Invoices->product_id($product_nam,$product_model);
        
        echo json_encode($data);
       // die();
   // echo $pdt;
    //   print_r($json);
      
     }

        public function add_packing_list(){
        $CI = & get_instance();

        $CI->auth->check_admin_auth();
        $CI->load->model('Products');
        $CI->load->model('Invoices');
        $CI->load->library('linvoice');
        $products=$CI->Products->get_all_products();
        $data=array();
        $CI->load->model('Units');
        $voucher_no = $CI->Invoices->packing_list_no();
        $unit_list     = $CI->Units->unit_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data=array(
          //  'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency' => $currency_details[0]['currency'],
            'voucher_no' => $voucher_no,
            'products'=> $products,
            'unit_list'    => $unit_list,
            );
     
       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('invoice/add_packing_list', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);
    }


    public function ocean_export_tracking(){
        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');

         $content = $CI->linvoice->ocean_export_tracking_add_form();

        $this->template->full_admin_html_view($content);


      
    }

          //Ocean Import Tracking Update Form
    public function ocean_export_tracking_update_form($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $content = $CI->linvoice->ocean_export_tracking_edit_data($purchase_id);
        $this->template->full_admin_html_view($content);
    }



      public function trucking(){
        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');
       // $data=array();
        $content = $CI->linvoice->trucking_add_form();
      //  $content = $this->load->view('invoice/trucking', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);
    }
    public function trucking1(){
        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');
        $data=array();
        $content = $CI->linvoice->trucking_add_form1();
       // $content = $this->load->view('purchase/trucking', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);
    }


      public function insert_trucking() {


       
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
         $CI->load->model('Invoices');
        $invoiceid=$CI->Invoices->trucking_entry();
        echo json_encode($invoiceid);
      
    }

 

     public function oceanimport() {

        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');
        $data=array();
       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('invoice/oceanimport', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);

    }

    public function oceanexport() {

        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');
        $data=array();
       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('invoice/oceanexport', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);

    }

 public function add_profarma_invoice()
 {

       $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');
      //  $data=array();
        $CI->load->model('Invoices');
   $c=   $this->Invoices->add_profarma_invoice();
   //  print_r($c);
      $this->session->set_userdata(array('message' => display('successfully_added')));
      if (isset($_POST['add-purchase'])) {
        //  print_r($_POST['add-trucking']);
          redirect(base_url('Cinvoice/manage_profarma_invoice'));
          exit;
      } elseif (isset($_POST['add-trucking-another'])) {
         // print_r($_POST['add-trucking-another']);
          redirect(base_url('Cinvoice/trucking'));
          exit;
      }
 }   







    //Insert invoice

    public function insert_invoice() {

        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->model('Invoices');

        $invoice_id = $CI->Invoices->invoice_entry();

        $this->session->set_userdata(array('message' => display('successfully_added')));

        redirect(base_url('Cinvoice/invoice_inserted_data/'.$invoice_id));

    }



    // ================= manual sale insert ============================

    
    // ================= manual sale insert ============================
    




        public function insert_ocean_export() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $invoice_id=$CI->Invoices->ocean_export_entry();
         echo json_encode($invoice_id);
  
        
    }
    
    
    public function file_upload(){
        // $purchase_id = date('YmdHis');
        $booking_no = $this->input->post('booking_no',TRUE);
        // print_r($_FILES); die();
    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
        $no_files = count($_FILES["files"]['name']);
        for ($i = 0; $i < $no_files; $i++) {
            if ($_FILES["files"]["error"][$i] > 0) {
                echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
            } else {
                if (file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                    echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    return false;
                } else {
                    move_uploaded_file($_FILES["files"]["tmp_name"][$i], 'uploads/' . $_FILES["files"]["name"][$i]);
                    echo 'File successfully uploaded : uploads/' . $_FILES['files']['name'][$i] . ' ';
                   
                   $data = array(
                        'attachment_id' => $booking_no,
                        'files' => $_FILES['files']['name'][$i],
                        'image_dir' => 'uploads/' . $_FILES['files']['name'][$i],
                        'created_by'=> $this->session->userdata('user_id'),
                        'sub_menu' => 'ocean_export_tracking',
                    );

                    $this->db->insert('attachments', $data);
                    // echo $this->db->last_query();
                }
            }
        }
    } else {
        echo 'Please choose at least one file';
    }
}




public function invoice_file_upload(){
      
    $invoice_id = $this->input->post('attachment_id',TRUE);
    // echo $invoice_id;
   
    echo $invoice_id; 
    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
        $no_files = count($_FILES["files"]['name']);
        for ($i = 0; $i < $no_files; $i++) {
            if ($_FILES["files"]["error"][$i] > 0) {
                echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
            } else {
                if (file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                    echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    return false;
                } else {
                    move_uploaded_file($_FILES["files"]["tmp_name"][$i], 'uploads/' . $_FILES["files"]["name"][$i]);
                    echo 'File successfully uploaded : uploads/' . $_FILES['files']['name'][$i] . ' ';
                   
                    $data = array(
                        'attachment_id' => $invoice_id,
                        'files' => $_FILES['files']['name'][$i],
                        'image_dir' => 'uploads/' . $_FILES['files']['name'][$i],
                        'created_by'=> $this->session->userdata('user_id'),
                        'sub_menu' => 'invoice',
                    );

                    $this->db->insert('attachments', $data);
                    // echo $this->db->last_query();
                }
            }
        }
    } else {
        echo 'Please choose at least one file';
    }
}



public function trucking_file_upload(){
        // $purchase_id = date('YmdHis');
        $trucking_id = $this->input->post('attachment_id',TRUE);
        // print_r($_FILES); die();
    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
        $no_files = count($_FILES["files"]['name']);
        for ($i = 0; $i < $no_files; $i++) {
            if ($_FILES["files"]["error"][$i] > 0) {
                echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
            } else {
                if (file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                    echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    return false;
                } else {
                    move_uploaded_file($_FILES["files"]["tmp_name"][$i], 'uploads/' . $_FILES["files"]["name"][$i]);
                    echo 'File successfully uploaded : uploads/' . $_FILES['files']['name'][$i] . ' ';
                   
                    $data = array(
                        'attachment_id' => $trucking_id,
                        'files' => $_FILES['files']['name'][$i],
                        'image_dir' => 'uploads/' . $_FILES['files']['name'][$i],
                        'created_by'=> $this->session->userdata('user_id'),
                        'sub_menu' => 'Sales Trucking',
                    );

                    $this->db->insert('attachments', $data);
                    // echo $this->db->last_query();
                }
            }
        }
    } else {
        echo 'Please choose at least one file';
    }
}


    
    
    

/*
       public function invoice_pdf_generate($invoice_id = null) {

        $id = $invoice_id; 

        $this->load->model('Invoices');

        $this->load->model('Web_settings');

        $this->load->library('occational');

        $this->load->library('numbertowords');

        $invoice_detail = $this->Invoices->retrieve_invoice_html_data($invoice_id);

        $taxfield = $this->db->select('*')

                ->from('tax_settings')

                ->where('is_show',1)

                ->get()

                ->result_array();

        $txregname ='';

        foreach($taxfield as $txrgname){

        $regname = $txrgname['tax_name'].' Reg No  - '.$txrgname['reg_no'].', ';

        $txregname .= $regname;

        }       

        $subTotal_quantity = 0;

        $subTotal_cartoon = 0;

        $subTotal_discount = 0;

        $subTotal_ammount = 0;

        $descript = 0;

        $isserial = 0;

        $isunit = 0;

        $is_discount = 0;

        if (!empty($invoice_detail)) {

            foreach ($invoice_detail as $k => $v) {

                $invoice_detail[$k]['final_date'] = $this->occational->dateConvert($invoice_detail[$k]['date']);

            $subTotal_quantity = $subTotal_quantity + $invoice_detail[$k]['quantity'];

            $subTotal_ammount = $subTotal_ammount + $invoice_detail[$k]['total_price'];

            }

            $i = 0;

            foreach ($invoice_detail as $k => $v) {

            $i++;

            $invoice_detail[$k]['sl'] = $i;

            if(!empty($invoice_detail[$k]['description'])){

                $descript = $descript+1;

            }

             if(!empty($invoice_detail[$k]['serial_no'])){

                $isserial = $isserial+1; 

            }

             if(!empty($invoice_detail[$k]['discount_per'])){

                $is_discount = $is_discount+1;   

            }



            if(!empty($invoice_detail[$k]['unit'])){

                    $isunit = $isunit+1;

                    

                }

   

            }

        }



        $currency_details = $this->Web_settings->retrieve_setting_editdata();

        $company_info     = $this->Invoices->retrieve_company();

        $totalbal         = $invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'];

        $amount_inword    = $this->numbertowords->convert_number($totalbal);

        $user_id          = $invoice_detail[0]['sales_by'];

        $users            = $this->Invoices->user_invoice_data($user_id);

         $name            = $invoice_detail[0]['customer_name'];

        $email            = $invoice_detail[0]['customer_email'];

        $data = array(

        'title'             => display('invoice_details'),

        'invoice_id'        => $invoice_detail[0]['invoice_id'],

        'customer_info'     => $invoice_detail,

        'invoice_no'        => $invoice_detail[0]['invoice'],

        'customer_name'     => $invoice_detail[0]['customer_name'],

        'customer_address'  => $invoice_detail[0]['customer_address'],

        'customer_mobile'   => $invoice_detail[0]['customer_mobile'],

        'customer_email'    => $invoice_detail[0]['customer_email'],

        'final_date'        => $invoice_detail[0]['final_date'],

        'invoice_details'   => $invoice_detail[0]['invoice_details'],

        'total_amount'      => number_format($invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'], 2, '.', ','),

        'subTotal_quantity' => $subTotal_quantity,

        'total_discount'    => number_format($invoice_detail[0]['total_discount'], 2, '.', ','),

        'total_tax'         => number_format($invoice_detail[0]['total_tax'], 2, '.', ','),

        'subTotal_ammount'  => number_format($subTotal_ammount, 2, '.', ','),

        'paid_amount'       => number_format($invoice_detail[0]['paid_amount'], 2, '.', ','),

        'due_amount'        => number_format($invoice_detail[0]['due_amount'], 2, '.', ','),

        'previous'          => number_format($invoice_detail[0]['prevous_due'], 2, '.', ','),

        'shipping_cost'     => number_format($invoice_detail[0]['shipping_cost'], 2, '.', ','),

        'invoice_all_data'  => $invoice_detail,

        'company_info'      => $company_info,

        'currency'          => $currency_details[0]['currency'],

        'position'          => $currency_details[0]['currency_position'],

        'discount_type'     => $currency_details[0]['discount_type'],

        'currency_details'  => $currency_details,

        'am_inword'         => $amount_inword,

        'is_discount'       => $is_discount,

        'users_name'        => $users->first_name.' '.$users->last_name,

        'tax_regno'         => $txregname,

        'is_desc'           => $descript,

        'is_serial'         => $isserial,

        'is_unit'           => $isunit,

        );



        $this->load->library('pdfgenerator');

        $html = $this->load->view('invoice/invoice_download', $data, true);

        $dompdf = new DOMPDF();

        $dompdf->load_html($html);

        $dompdf->render();

        $output = $dompdf->output();

        file_put_contents('assets/data/pdf/invoice/' . $id . '.pdf', $output);

        $file_path = getcwd() . '/assets/data/pdf/invoice/' . $id . '.pdf';

        $send_email = '';

        if (!empty($email)) {

            $send_email = $this->setmail($email, $file_path, $invoice_detail[0]['invoice'], $name);

            

            if($send_email){

           return 1;

            }else{

               return 0;

               

            }

           

        }

      return 0; 

       

    }
*/
public function get_expense_datas(){
 $CI = & get_instance();

    $CI->auth->check_admin_auth();
       $product_nam=$this->input->post('product_nam');
        $product_model=$this->input->post('product_model');
          $bun_num=$this->input->post('bun_num');
        $CI->load->model('Invoices');
      $data=  $CI->Invoices->get_expense_datas($product_nam,$product_model,$bun_num);
        
        echo json_encode($data);
}

public function manual_sales_insert(){


    $CI = & get_instance();

    $CI->auth->check_admin_auth();

    $CI->load->model('Invoices');

    $invoice_id = $CI->Invoices->invoice_entry();



    echo json_encode($invoice_id);

}
    public function company_name() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
         $CI->load->model('Invoices');
        $companyid=$CI->Invoices->trucking_entry();
        echo json_encode($companyid);
    }


     public function setmail($email, $file_path, $id = null, $name = null) {

        $setting_detail = $this->db->select('*')->from('email_config')->get()->row();

        $subject = 'Purchase  Information';

        $message = strtoupper($name) . '-' . $id;

        $config = Array(

        'protocol'  => $setting_detail->protocol,

        'smtp_host' => $setting_detail->smtp_host,

        'smtp_port' => $setting_detail->smtp_port,

        'smtp_user' => $setting_detail->smtp_user,

        'smtp_pass' => $setting_detail->smtp_pass,

        'mailtype'  => 'html', 

        'charset'   => 'utf-8',

        'wordwrap'  => TRUE

        );

        $this->load->library('email', $config);

        $this->email->set_newline("\r\n");

        $this->email->from($setting_detail->smtp_user);

        $this->email->to($email);

        $this->email->subject($subject);

        $this->email->message($message);

        $this->email->attach($file_path);

        $check_email = $this->test_input($email);

        if (filter_var($check_email, FILTER_VALIDATE_EMAIL)) {

            if ($this->email->send()) {

               

               return true;

            } else {

              

                return false;

            }

        } else {

           

            return true;

        }

    }



    //Email testing for email

    public function test_input($data) {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    }



  //  invoice Update Form

    public function invoice_update_form($invoice_id) {

        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');

        $content = $CI->linvoice->invoice_edit_data($invoice_id);

        $this->template->full_admin_html_view($content);

    }

    
    
    
    
    
    
    

    // invoice Update

    public function invoice_update() {

        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->model('Invoices');

        $invoice_id = $CI->Invoices->update_invoice();

        $this->session->set_userdata(array('message' => display('successfully_updated')));

        // $this->invoice_inserted_data($invoice_id);
          redirect(base_url('Cinvoice/manage_invoice'));

    }

       // purchase Update
    public function update_ocean_export() {

        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $CI->Invoices->update_ocean_export();
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cinvoice/manage_ocean_export_tracking'));
        exit;
    }

 

    //Search Inovoice Item

    public function search_inovoice_item() {

        $CI = & get_instance();

        $this->auth->check_admin_auth();

        $CI->load->library('linvoice');



        $customer_id = $this->input->post('customer_id',TRUE);

        $content     = $CI->linvoice->search_inovoice_item($customer_id);

        $this->template->full_admin_html_view($content);

    }



    //Manage invoice list

    public function manage_invoice() {

        $this->session->unset_userdata('invoiceid');

        $this->session->unset_userdata('nation');
    $date = $this->input->post("daterangepicker-field");
// echo $date; die();
        $CI = & get_instance();

        $this->auth->check_admin_auth();

        $CI->load->library('linvoice');

        $CI->load->model('Invoices');
        
        
         $CI->load->model('Web_settings');

        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
 
        $value = $this->linvoice->invoice_list();

        $sale = $CI->Invoices->newsale($date);
        
        $email_settings = $CI->Invoices->getEmailConfigdata();
        
        // $getAttachmentData =  $CI->Invoices->retrieve_attachmentdata();
        
        // print_r($getAttachmentData);
        // print_r($email_settings);

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        // print_r($currency_details);
        $data['currency']          = $currency_details[0]['currency'];
    

        $data = array(
            'invoice'         =>  $value,

            'sale' => $sale,
            
            'email_settings' => $email_settings,
            
          'setting_detail' => $setting_detail

        );
        // print_r($sale);
        $content = $this->load->view('invoice/invoice', $data, true);
    
        $this->template->full_admin_html_view($content);
      

    }





// $uid=$_SESSION['user_id'];

//  $sql='select c.* from company_information c 
    
//     join 
//     user_login as u 
//     on u.cid=c.company_id
//     where u.user_id='.$uid;
//     $query=$this->db->query($sql);

//     $company_info=$query->result_array();


//  $sql='SELECT c.* from invoice i JOIN customer_information c on c.customer_id=i.customer_id where i.invoice_id='.$uid;
//     $query=$this->db->query($sql);

//     $customer_info=$query->result_array();




//   $sql='SELECT p.* FROM `invoice_details` i JOIN

//  product_information p
//  on p.product_id=i.product_id

//  where 
//  i.invoice_id="'.$invoiceid.'";
//  ';

//     $query=$this->db->query($sql);

//     $product_info=$query->result_array();



//     $data['company_info']=$company_info;
//     $data['customer_info']=$customer_info;
//     $data['product_info']=$product_info;
//     $data['invoiceid']=$invoiceid;




//     $content = $this->load->view('pdf_attach_mail/new_sale', $data, true);
//     if($content)
//     {
//   redirect("Cinvoice/manage_invoice");
// }
//          // $this->template->full_admin_html_view($content);
// }   




public function manage_profarma_invoice() {
    $this->session->unset_userdata('perfarma_invoice_id');
    $date = $this->input->post("daterangepicker-field");
    $CI = & get_instance();
    $CA = & get_instance();
    $this->auth->check_admin_auth();
    $CI->load->library('linvoice');
    $CI->load->model('Invoices');
    $CA->load->model('Web_settings');
    
            $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

  $invoice = $CI->Invoices->get_profarma_invoice();
  $email_setting = $CA->Web_settings->retrieve_email_setting();
//   print_r($email_setting);
  $sale = $CI->Invoices->sample($date);
  $currency_details = $CI->Web_settings->retrieve_setting_editdata();
     $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
      $profarmasearch = $CI->Invoices->getprofarma_data();
    $data = array(
           'curn_info_default' =>$curn_info_default[0]['currency_name'],
        'currency' =>$currency_details[0]['currency'],
        'invoice'         =>  $invoice,
        'email_setting'  => $email_setting,
        'sale' => $sale,
        'profarmasearch' => $profarmasearch,
                   'setting_detail' => $setting_detail

    );
    $content = $this->load->view('invoice/profarma_invoice_list', $data, true);
    $this->template->full_admin_html_view($content);
}
    public function get_setting() {
        $CI = & get_instance();

        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $menu = $this->input->post('menu');
      
     $submenu = $this->input->post('submenu');
       
        $user=$this->session->userdata('user_id');
  

                $invoice = $CI->Invoices->get_setting($user,$menu,$submenu);
               $menu= $invoice[0]->menu; 
               $submenu=$invoice[0]->submenu;
               $set= $invoice[0]->setting;
$data=array(
'menu'=> $menu,
'submenu'=> $submenu,
'setting' => $set
);
echo json_encode($data);

    }
    public function setting() {
      //  echo "<script>alert(localStorage.getItem('states'))</script>";
        $output = $this->input->post();
        $user=$this->session->userdata('user_id');
$this->output->set_content_type('application/json')
     ->set_output(json_encode($output));
    // echo $output['content'];
  $split= explode("/",$output['page']) ;
$set=json_encode( $output['content']);
  $data=array(
'user' => $user,
'menu' => $split[0],
'submenu' => $split[1],
'setting' => $set
 );
 
 $this->db->select('*');
 $this->db->from('bootgrid_data');
 $this->db->where('user', $user);
 $this->db->where('menu', $split[0]);
 $this->db->where('submenu', $split[1]);
 $query = $this->db->get();

    
        if ($query->num_rows() > 0) {
            $this->db->where('user', $user); 
            $this->db->where('menu', $split[0]); 
            $this->db->where('submenu', $split[1]); 
$this->db->set('setting',$set);
$this->db->update('bootgrid_data');



    }else{
        

 $this->db->insert('bootgrid_data', $data);

    }
   // 
}
    public function insert_packing_list() {

        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $invoice_id=$CI->Invoices->packing_list_entry();
      echo json_encode($invoice_id);
    
        } 
    

        public function manage_packing_list() {
            $this->session->unset_userdata('packingid');
            $date = $this->input->post("daterange");
            $CI = & get_instance();
            $CA = & get_instance();
            $this->auth->check_admin_auth();
            $CI->load->library('linvoice');
            $CI->load->model('Invoices');
             $CA->load->model('Web_settings');
            $sale = $CI->Invoices->packing_list($date);
            $value = $this->linvoice->packing_invoice_list();
            $email_setting = $CA->Web_settings->retrieve_email_setting();
            // print_r($email_setting); die();
            $data = array(
                 'invoice'         =>  $value,
                 'email_setting' => $email_setting,
                  'sale' => $sale
            );
          //  print_r($sale);
            $content = $this->load->view('invoice/packing_list', $data, true);
            $this->template->full_admin_html_view($content);
        }
    public function packing_list_update_form($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $content = $CI->linvoice->packing_list_edit_data($purchase_id);
        $this->template->full_admin_html_view($content);
    } 
    public function manage_ocean_export_tracking() {
        $this->session->unset_userdata('oceanid');
        $CI = & get_instance();
        $CA = & get_instance();

        $date = $this->input->post("daterangepicker-field");
        $this->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $CI->load->model('Invoices');
        $sale = $CI->Invoices->ocean_export($date);
        $value = $this->linvoice->ocean_export_tracking_invoice_list();
        $email_setting = $CA->Web_settings->retrieve_email_setting();
        $email_settings = $CI->Invoices->getEmailConfigdata();
        
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        
        // print_r($email_setting); die();
        $data = array(

            'invoice'         =>  $value,
            'email_setting' => $email_setting,
            'sale' => $sale,
            'email_settings' => $email_settings,
                       'setting_detail' => $setting_detail

        );
     //   print_r($sale);
        $content = $this->load->view('invoice/ocean_export_tracking_invoice_list', $data, true);
        $this->template->full_admin_html_view($content);
    }


    public function manage_trucking() {

        $this->session->unset_userdata('truckid');
        $CI = & get_instance();
        $CA = & get_instance();
        $date = $this->input->post("daterangepicker-field");
        $this->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $CI->load->model('Invoices');
        $value = $this->linvoice->trucking_invoice_list();
        $sale = $CI->Invoices->sale_trucking($date);
        $email_setting = $CA->Web_settings->retrieve_email_setting();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
                $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $email_settings = $CI->Invoices->getEmailConfigdata();
        $data = array(
            'currency' =>$currency_details[0]['currency'],
            'invoice'         =>  $value,
            'email_setting' => $email_setting,
            'sale' => $sale,
            'email_settings' => $email_settings,
                       'setting_detail' => $setting_detail

        );
        $content = $this->load->view('invoice/trucking_invoice_list', $data, true);
        $this->template->full_admin_html_view($content);
    }





        public function CheckInvoiceList(){

        // GET data

        $this->load->model('Invoices');

        $postData = $this->input->post();

        $data = $this->Invoices->getInvoiceList($postData);

        echo json_encode($data);


    } 



    // public function CheckProfarmaInvoiceList(){
       
    //     $CI = & get_instance();
    //     $CI->auth->check_admin_auth();
    //    $CI->load->model('Invoices');
    //     $content = $CI->Invoices->sample();
       
    //     $this->template->full_admin_html_view($content);
 
    // } 

    public function CheckProfarmaInvoiceList(){

        // GET data

        $this->load->model('Invoices');

        $postData = $this->input->post();

        $data = $this->Invoices->getProfarmaInvoiceList($postData);

        echo json_encode($data);

    }


     public function CheckPackingList(){
        // GET data
        $this->load->model('Invoices');
        $postData = $this->input->post();
        $data = $this->Invoices->getPackingList($postData);
        echo json_encode($data);
    }





    public function index1()
    { $CI = & get_instance();
        $CI->load->model('Invoices','boot');
        $data['data'] = $this->boot->get_datas();
        print_r($data);
        die();
        $this->load->view('invoice/profarma_invoice_list',$data);
    }

     //Retrive right now inserted data to cretae html
    public function ocean_export_tracking_details_data($purchase_id) {

        $CI = & get_instance();
        $CI->auth->check_admin_auth();
       $CI->load->library('linvoice');
    $content = $CI->linvoice->ocean_export_tracking_details_data($purchase_id);
     //   echo json_encode($content);
      $this->template->full_admin_html_view($content);
    }



    
      public function ocean_export_tracking_details_data_print($purchase_id) {

        $CI = & get_instance();
        $CI->auth->check_admin_auth();
       $CI->load->library('linvoice');
        $content = $CI->linvoice->ocean_export_tracking_details_data_print($purchase_id);
       // echo json_encode($content);
      $this->template->full_admin_html_view($content);
    }
  public function add_payment_type(){
        $this->load->model('Invoices');
        $postData = $this->input->post('new_payment_type');
        $data = $this->Invoices->add_payment_type($postData);
        echo json_encode($data);
    }
        public function add_state_tax_id(){
        $this->load->model('Invoices');
        $postData = $this->input->post('new_state_tax_id');
        $data = $this->Invoices->add_state_tax_id($postData);
        echo json_encode($data);
    }
     // manage my company--->add local tax number
     public function add_local_tax_id(){
        $this->load->model('Invoices');
        $postData = $this->input->post('new_local_tax_id');
        $data = $this->Invoices->add_local_tax_id($postData);
        echo json_encode($data);
    }
      public function add_city_tax(){
        $this->load->model('Invoices');
        $postData = $this->input->post('new_city_tax');
        $data = $this->Invoices->add_city_tax($postData);
        echo json_encode($data);
    }
      public function add_paymentroll_type(){
        $this->load->model('Invoices');
        $payrollData = $this->input->post('new_payroll_type');
        $data = array(
         'payroll_type' => $payrollData,
         'created_by' => $this->session->userdata('user_id')
        );
        $this->db->insert('payroll_type', $data);
//echo $this->db->last_query();
        $payroll_data = $this->Invoices->add_paymentroll_type();
        // print_r($payroll_data);die();
        echo json_encode($payroll_data);
    }


       public function add_employee_type(){
        $this->load->model('Invoices');
        $payrollData = $this->input->post('employee_type');
        $data = array(
         'employee_type' => $payrollData,
         'created_by' => $this->session->userdata('user_id')
        );
        $this->db->insert('employee_type', $data);
        $employee_data = $this->Invoices->add_employees_type();
        // print_r($employee_data);
        echo json_encode($employee_data);
    }

      public function CheckOceanExportList(){
        // GET data
         $this->load->model('Invoices');
        $postData = $this->input->post();
        $data = $this->Invoices->getOceanExportList($postData);
        echo json_encode($data);
    } 


        public function CheckTruckingList(){
         $this->load->model('Invoices');
        $postData = $this->input->post();
        $data = $this->Invoices->getTruckingList($postData);
        echo json_encode($data);
     }
     public function select_bank_name(){
   
    }

          //Trucking Update Form
    public function trucking_update_form($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $content = $CI->linvoice->trucking_edit_data($purchase_id);
        $this->template->full_admin_html_view($content);
    } 


// invoice list pdf download

    public function sale_downloadpdf(){

        $CI = & get_instance();

        $CI->load->model('Invoices');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $CI->load->library('linvoice');

        $CI->load->library('pdfgenerator'); 

        $invoices_list = $CI->Invoices->invoice_list_pdf();

        if (!empty($invoices_list)) {

            $i = 0;

            if (!empty($invoices_list)) {

                 foreach ($invoices_list as $k => $v) {

                $invoices_list[$k]['final_date'] = $CI->occational->dateConvert($invoices_list[$k]['date']);

            }

                foreach ($invoices_list as $k => $v) {

                    $i++;

                    $invoices_list[$k]['sl'] = $i + $CI->uri->segment(3);

                }

            }

        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

         $company_info = $CI->Invoices->retrieve_company();

        $data = array(

            'title'         => display('manage_invoice'),

            'invoices_list' => $invoices_list,

            'currency'      => $currency_details[0]['currency'],

            'logo'          => $currency_details[0]['logo'],

            'position'      => $currency_details[0]['currency_position'],

            'company_info'  => $company_info

        );

            $this->load->helper('download');

            $content = $this->parser->parse('invoice/invoice_list_pdf', $data, true);

            $time = date('Ymdhi');

            $dompdf = new DOMPDF();

            $dompdf->load_html($content);

            $dompdf->render();

            $output = $dompdf->output();

            file_put_contents('assets/data/pdf/'.'sales'.$time.'.pdf', $output);

            $file_path = 'assets/data/pdf/'.'sales'.$time.'.pdf';

           $file_name = 'sales'.$time.'.pdf';

            force_download(FCPATH.'assets/data/pdf/'.$file_name, null);

    }





//         public function invoicdetails_download($invoice_id = null) {



//         $this->load->model('Invoices');

//         $this->load->model('Web_settings');

//         $this->load->library('occational');

//         $this->load->library('numbertowords');

//         $invoice_detail = $this->Invoices->retrieve_invoice_html_data($invoice_id);

//          // print_r($invoice_detail);
//          // die;

//         $taxfield = $this->db->select('*')

//                 ->from('tax_settings')

//                 ->where('is_show',1)

//                 ->get()

//                 ->result_array();

//         $txregname ='';

//         foreach($taxfield as $txrgname){

//         $regname = $txrgname['tax_name'].' Reg No  - '.$txrgname['reg_no'].', ';

//         $txregname .= $regname;

//         }       

//         $subTotal_quantity = 0;

//         $subTotal_cartoon = 0;

//         $subTotal_discount = 0;

//         $subTotal_ammount = 0;

//         $descript = 0;

//         $isserial = 0;

//         $isunit = 0;

//         $is_discount = 0;

//         if (!empty($invoice_detail)) {

//             foreach ($invoice_detail as $k => $v) {

//                 $invoice_detail[$k]['final_date'] = isset($invoice_detail[$k]['date'])?$this->occational->dateConvert($invoice_detail[$k]['date']):$this->occational->dateConvert(date('Y-m-d'));

//                 $subTotal_quantity = $subTotal_quantity + $invoice_detail[$k]['quantity'];

//                 $subTotal_ammount = $subTotal_ammount + $invoice_detail[$k]['total_price']; 

//             }

//             $i = 0;

//             foreach ($invoice_detail as $k => $v) {

//                 $i++;

//                 $invoice_detail[$k]['sl'] = $i;

//                 if(!empty($invoice_detail[$k]['description'])){

//                     $descript = $descript+1;

//                 }

//                  if(!empty($invoice_detail[$k]['serial_no'])){

//                     $isserial = $isserial+1;

//                 }

//                  if(!empty($invoice_detail[$k]['discount_per'])){

//                     $is_discount = $is_discount+1;

//                 }

//                 if(!empty($invoice_detail[$k]['unit'])){

//                     $isunit = $isunit+1;

//                 }

//             }

//         }


//         $t=isset($invoice_detail[0]['total_amount'])?$invoice_detail[0]['total_amount']:0;
//         $t1=isset($invoice_detail[0]['prevous_due'])?$invoice_detail[0]['prevous_due']:0;
//         $currency_details = $this->Web_settings->retrieve_setting_editdata();

//         $company_info     = $this->Invoices->retrieve_company();

//         $totalbal         = $t+$t1;

//         $amount_inword    = $this->numbertowords->convert_number($totalbal);

//         $user_id          = isset($invoice_detail[0]['sales_by'])?$invoice_detail[0]['sales_by']:0;

//         $users            = $this->Invoices->user_invoice_data($user_id);

//         $data = array(

//         'title'             => display('invoice_details'),

//         'invoice_id'        => @$invoice_detail[0]['invoice_id'],

//         'customer_info'     => @$invoice_detail,

//         'invoice_no'        => @$invoice_detail[0]['invoice'],

//         'customer_name'     => @$invoice_detail[0]['customer_name'],

//         'customer_address'  => @$invoice_detail[0]['customer_address'],

//         'customer_mobile'   => @$invoice_detail[0]['customer_mobile'],

//         'customer_email'    => @$invoice_detail[0]['customer_email'],

//         'final_date'        => @$invoice_detail[0]['final_date'],

//         'invoice_details'   => @$invoice_detail[0]['invoice_details'],

//         'total_amount'      => number_format($t+$t1, 2, '.', ','),

//         'subTotal_quantity' => $subTotal_quantity,

//         'total_discount'    =>isset($invoice_detail[0]['total_discount'])?number_format($invoice_detail[0]['total_discount'], 2, '.', ','):0,

//         'total_tax'         => isset($invoice_detail[0]['total_tax'])?number_format($invoice_detail[0]['total_tax'], 2, '.', ','):0,

//         'subTotal_ammount'  => number_format($subTotal_ammount, 2, '.', ','),

//         'paid_amount'       => isset($invoice_detail[0]['paid_amount'])?number_format($invoice_detail[0]['paid_amount'], 2, '.', ','):0,

//         'due_amount'        => isset($invoice_detail[0]['due_amount'])?number_format($invoice_detail[0]['due_amount'], 2, '.', ','):0,

//         'previous'          => number_format($t1, 2, '.', ','),

//         'shipping_cost'     => isset($invoice_detail[0]['shipping_cost'])?number_format($invoice_detail[0]['shipping_cost'], 2, '.', ','):0,

//         'invoice_all_data'  => $invoice_detail,

//         'company_info'      => $company_info,

//         'currency'          => $currency_details[0]['currency'],

//         'position'          => $currency_details[0]['currency_position'],

//         'discount_type'     => $currency_details[0]['discount_type'],

//         'currency_details'  => $currency_details,

//         'am_inword'         => $amount_inword,

//         'is_discount'       => $is_discount,

//         'users_name'        => $users->first_name.' '.$users->last_name,

//         'tax_regno'         => $txregname,

//         'is_desc'           => $descript,

//         'is_serial'         => $isserial,

//         'is_unit'           => $isunit,

//         );

//    $this->load->library('pdfgenerator');

//         $dompdf = new DOMPDF();

//         $page = $this->load->view('invoice/invoice_download', $data, true);

//         $file_name = time();

//         $dompdf->load_html($page,'UTF-8');

//         $dompdf->render();

//         $output = $dompdf->output();

//         file_put_contents("assets/data/pdf/invoice/$file_name.pdf", $output);

//         $filename = $file_name . '.pdf';

//         $file_path = base_url() . 'assets/data/pdf/invoice/' . $filename;



//         $this->load->helper('download');

//         force_download('./assets/data/pdf/invoice/' . $filename, NULL);

//         redirect("Cinvoice/manage_invoice");

//     }



    // search invoice by customer id

    public function invoice_search() {

        $CI = & get_instance();

        $this->auth->check_admin_auth();

        $CI->load->library('linvoice');

        $CI->load->model('Invoices');

        $customer_id = $this->input->get('customer_id');

        #

        #pagination starts

        #

        $config["base_url"] = base_url('Cinvoice/invoice_search/');

        $config["total_rows"] = $this->Invoices->invoice_search_count($customer_id);

        $config["per_page"] = 10;

        $config["uri_segment"] = 3;

        $config["num_links"] = 5;

        $config['suffix'] = '?' . http_build_query($_GET);

        $config['first_url'] = $config["base_url"] . $config['suffix'];

        /* This Application Must Be Used With BootStrap 3 * */

        $config['full_tag_open'] = "<ul class='pagination'>";

        $config['full_tag_close'] = "</ul>";

        $config['num_tag_open'] = '<li>';

        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";

        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

        $config['next_tag_open'] = "<li>";

        $config['next_tag_close'] = "</li>";

        $config['prev_tag_open'] = "<li>";

        $config['prev_tagl_close'] = "</li>";

        $config['first_tag_open'] = "<li>";

        $config['first_tagl_close'] = "</li>";

        $config['last_tag_open'] = "<li>";

        $config['last_tagl_close'] = "</li>";

        /* ends of bootstrap */

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $links = $this->pagination->create_links();

        #

        #pagination ends

        #  

        $content = $this->linvoice->invoice_search($customer_id, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);

    }



    // search invoice by invoice id

    public function manage_invoice_invoice_id() {

        $CI = & get_instance();

        $this->auth->check_admin_auth();

        $CI->load->library('linvoice');

        $CI->load->model('Invoices');

        $invoice_no = $this->input->post('invoice_no',TRUE);

        $content = $this->linvoice->invoice_list_invoice_no($invoice_no);

        $this->template->full_admin_html_view($content);

    }



    // invoice list date to date 

    public function date_to_date_invoice() {

        $CI = & get_instance();

        $this->auth->check_admin_auth();

        $CI->load->library('linvoice');

        $CI->load->model('Invoices');

        $from_date = $this->input->get('from_date');

        $to_date = $this->input->get('to_date');



        #

        #pagination starts

        #

        $config["base_url"] = base_url('Cinvoice/date_to_date_invoice/');

        $config["total_rows"] = $this->Invoices->invoice_list_date_to_date_count($from_date, $to_date);

        $config["per_page"] = 10;

        $config["uri_segment"] = 3;

        $config["num_links"] = 5;

        $config['suffix'] = '?' . http_build_query($_GET, '', '&');

        $config['first_url'] = $config["base_url"] . $config['suffix'];

        /* This Application Must Be Used With BootStrap 3 * */

        $config['full_tag_open'] = "<ul class='pagination'>";

        $config['full_tag_close'] = "</ul>";

        $config['num_tag_open'] = '<li>';

        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";

        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

        $config['next_tag_open'] = "<li>";

        $config['next_tag_close'] = "</li>";

        $config['prev_tag_open'] = "<li>";

        $config['prev_tagl_close'] = "</li>";

        $config['first_tag_open'] = "<li>";

        $config['first_tagl_close'] = "</li>";

        $config['last_tag_open'] = "<li>";

        $config['last_tagl_close'] = "</li>";

        /* ends of bootstrap */

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $links = $this->pagination->create_links();

        #

        #pagination ends

        #  



        $content = $this->linvoice->invoice_list_date_to_date($from_date, $to_date, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);

    }


 


     public function packing_list_details_data($invoice_id) {
    
     // echo $invoice_id; die();
        $CI = & get_instance();
        $CC = & get_instance();
        $CA = & get_instance();
        $w = & get_instance();
        $w->load->model('Ppurchases');
        $company_info = $w->Ppurchases->retrieve_company();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CA->load->model('invoice_design');
        $CC->load->model('invoice_content');
        $invoice_detail = $CI->Invoices->invoice_pdf($invoice_id);
        // print_r($invoice_detail); die();
        $all_invoice = $CI->Invoices->all_invoice($invoice_id);
         // print_r($all_invoice); die();
         $setting=  $CI->Web_settings->retrieve_setting_editdata();

          $dataw = $CA->invoice_design->retrieve_data($this->session->userdata('user_id'));
        $datacontent = $CC->invoice_content->retrieve_data();
        $customer = $this->db->select('*')->from('customer_information')->where("customer_id",$invoice_detail[0]['customer_id'])->get()->result_array();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
         $product_name = $this->db->select('*')->from('product_information')->where("product_id",$all_invoice[0]['product_id'])->get()->result_array();
        //  echo $this->db->last_query(); die();
          // print_r($product_name); die();
        $data=array(
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency'  =>$currency_details[0]['currency'],
            'header'=> $dataw[0]['header'],
           'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']), 
            'color'=> $dataw[0]['color'],
            'template'=> $dataw[0]['template'],
            'packing_id'  =>$invoice_detail[0]['packing_id'],
          'company'=> (!empty($datacontent)?$datacontent:$company_info), 
            'customer_currency'=> $customer[0]['currency_type'],
            'customername'=> $customer[0]['customer_name'],
           
            'mobile'=> $customer[0]['customer_mobile'],
            'customeraddress'=> $customer[0]['customer_address'],
             'all_invoice'=>$all_invoice,
               'invoice_detail'=>$invoice_detail
        );
        //   print_r($dataw[0]['color']);


       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('invoice/packing_list_invoice_html', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);
    }
    
    
    
    
   public function packing_list_details_data_print($invoice_id) {
    
     // echo $invoice_id; die();
        $CI = & get_instance();
        $CC = & get_instance();
        $CA = & get_instance();
        $w = & get_instance();
        $w->load->model('Ppurchases');
        $company_info = $w->Ppurchases->retrieve_company();
        $CI->load->model('Invoices');
        $CA->load->model('invoice_design');
        $CC->load->model('invoice_content');
                $CI->load->model('Web_settings');

        
        
        $invoice_detail = $CI->Invoices->invoice_pdf($invoice_id);
        // print_r($invoice_detail); die();
        $all_invoice = $CI->Invoices->all_invoice($invoice_id);
         // print_r($all_invoice); die();
         
                  $setting=  $CI->Web_settings->retrieve_setting_editdata();

         
           $dataw = $CA->invoice_design->retrieve_data($this->session->userdata('user_id'));
        $datacontent = $CC->invoice_content->retrieve_data();
        $customer = $this->db->select('*')->from('customer_information')->where("customer_id",$invoice_detail[0]['customer_id'])->get()->result_array();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
         $product_name = $this->db->select('*')->from('product_information')->where("product_id",$all_invoice[0]['product_id'])->get()->result_array();
        //  echo $this->db->last_query(); die();
          // print_r($product_name); die();
           $data=array(
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency'  =>$currency_details[0]['currency'],
            'header'=> $dataw[0]['header'],
          'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']), 
            'color'=> $dataw[0]['color'],
            'template'=> $dataw[0]['template'],
            'packing_id'  =>$invoice_detail[0]['packing_id'],
          'company'=> (!empty($datacontent)?$datacontent:$company_info), 
            'customer_currency'=> $customer[0]['currency_type'],
            'customername'=> $customer[0]['customer_name'],
           
            'mobile'=> $customer[0]['customer_mobile'],
            'customeraddress'=> $customer[0]['customer_address'],
             'all_invoice'=>$all_invoice,
               'invoice_detail'=>$invoice_detail
        );
   //print_r($data);
       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('invoice/packing_list_invoice_print', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);
    }



    //POS invoice page load

    public function pos_invoice() {

        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');

        $content = $CI->linvoice->pos_invoice_add_form();

        $this->template->full_admin_html_view($content);

    }



    //Insert pos invoice

    public function insert_pos_invoice() {

        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->model('Invoices');

        $CI->load->model('Web_settings');

        $product_id = $this->input->post('product_id',TRUE);



        $product_details  = $CI->Invoices->pos_invoice_setup($product_id);

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $taxfield = $CI->db->select('tax_name,default_value')

                ->from('tax_settings')

                ->get()

                ->result_array();

           $prinfo = $this->db->select('*')->from('product_information')->where('product_id',$product_id)->get()->result_array();

        $tr = " ";

        if (!empty($product_details)) {

            $product_id = $this->generator(5);

            $serialdata =explode(',', $product_details->serial_no);

            if($product_details->total_product > 0){

              $qty = 1;

            }else{

                $qty = 1;

            }



        $html = "";

        if (empty($serialdata)) {

            $html .="No Serial Found !";

        }else{

            // Select option created for product

            $html .="<select name=\"serial_no[]\"   class=\"serial_no_1 form-control\" id=\"serial_no_" . $product_details->product_id . "\">";

                $html .= "<option value=''>".display('select_one')."</option>";

                foreach ($serialdata as $serial) {

                    $html .="<option value=".$serial.">".$serial."</option>";

                }   

            $html .="</select>";

        }

            

            $tr .= "<tr id=\"row_" . $product_details->product_id . "\">

                        <td class=\"\" style=\"width:220px\">

                            

                            <input type=\"text\" name=\"product_name\" onkeypress=\"invoice_productList('" . $product_details->product_id . "');\" class=\"form-control productSelection \" value='" . $product_details->product_name . "- (" . $product_details->product_model . ")" . "' placeholder='" . display('product_name') . "' required=\"\" id=\"product_name_" . $product_details->product_id . "\" tabindex=\"\" readonly>



                            <input type=\"hidden\" class=\"form-control autocomplete_hidden_value product_id_" . $product_details->product_id . "\" name=\"product_id[]\" id=\"SchoolHiddenId_" . $product_details->product_id . "\" value = \"$product_details->product_id\"/>

                            

                        </td>

                         <td>

                             <input type=\"text\" name=\"desc[]\" class=\"form-control text-right \"  />

                                        </td>

                                        <td>".$html."</td>

                        <td>

                            <input type=\"text\" name=\"available_quantity[]\" class=\"form-control text-right available_quantity_" . $product_details->product_id . "\" value='" . $product_details->total_product . "' readonly=\"\" id=\"available_quantity_" . $product_details->product_id . "\"/>

                        </td>



                        <td>

                            <input class=\"form-control text-right unit_'" . $product_details->product_id . "' valid\" value=\"$product_details->unit\" readonly=\"\" aria-invalid=\"false\" type=\"text\">

                        </td>

                    

                        <td>

                            <input type=\"text\" name=\"product_quantity[]\" onkeyup=\"quantity_calculate('" . $product_details->product_id . "');\" onchange=\"quantity_calculate('" . $product_details->product_id . "');\" class=\"total_qntt_" . $product_details->product_id . " form-control text-right\" id=\"total_qntt_" . $product_details->product_id . "\" placeholder=\"0.00\" min=\"0\" value='" . $qty . "'/>

                        </td>



                        <td style=\"width:85px\">

                            <input type=\"text\" name=\"product_rate[]\" onkeyup=\"quantity_calculate('" . $product_details->product_id . "');\" onchange=\"quantity_calculate('" . $product_details->product_id . "');\" value='" . $product_details->price . "' id=\"price_item_" . $product_details->product_id . "\" class=\"price_item1 form-control text-right\" required placeholder=\"0.00\" min=\"0\"/>

                        </td>



                        <td class=\"\">

                            <input type=\"text\" name=\"discount[]\" onkeyup=\"quantity_calculate('" . $product_details->product_id . "');\" onchange=\"quantity_calculate('" . $product_details->product_id . "');\" id=\"discount_" . $product_details->product_id . "\" class=\"form-control text-right\" placeholder=\"0.00\" min=\"0\"/>



                            <input type=\"hidden\" value=" . $currency_details[0]['discount_type'] . " name=\"discount_type\" id=\"discount_type_" . $product_details->product_id . "\">

                        </td>



                        <td class=\"text-right\" style=\"width:100px\">

                            <input class=\"total_price form-control text-right\" type=\"text\" name=\"total_price[]\" id=\"total_price_" . $product_details->product_id . "\" value='" . $product_details->price . "' tabindex=\"-1\" readonly=\"readonly\"/>

                        </td>



                        <td>";

                        $sl=0;

                        foreach ($taxfield as $taxes) {

                            $txs = 'tax'.$sl;

                           $tr .= "<input type=\"hidden\" id=\"total_tax".$sl."_" . $product_details->product_id . "\" class=\"total_tax".$sl."_" . $product_details->product_id . "\" value='" . $prinfo[0][$txs] . "'/>

                            <input type=\"hidden\" id=\"all_tax".$sl."_" . $product_details->product_id . "\" class=\" total_tax".$sl."\" value='" . $prinfo[0][$txs]*$product_details->price . "' name=\"tax[]\"/>";  

                       $sl++; }

                        

                             $tr .= "<input type=\"hidden\" id=\"total_discount_" . $product_details->product_id . "\" />

                            <input type=\"hidden\" id=\"all_discount_" . $product_details->product_id . "\" class=\"total_discount dppr\"/>

                            <button  class=\"btn btn-danger btn-xs text-center\" type=\"button\"  onclick=\"deleteRow(this)\">" . '<i class="fa fa-close"></i>' . "</button>

                        </td>

                    </tr>";

            echo $tr;

        } else {

            return false;

        }

    }



    //Retrive right now inserted data to cretae html

    public function invoice_inserted_data($invoice_id) {

        $CI = & get_instance();
        $CC = & get_instance();
        $CA = & get_instance();
        $w = & get_instance();

        $w->load->model('Ppurchases');
        $company_info = $w->Ppurchases->retrieve_company();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CA->load->model('invoice_design');
        $CC->load->model('invoice_content');
        
         $invoice_detail = $CI->Invoices->invoice_pdf($invoice_id);
         $all_invoice = $CI->Invoices->all_invoice($invoice_id);
         $setting=  $CI->Web_settings->retrieve_setting_editdata(); 
         $dataw = $CA->invoice_design->retrieve_data();

        //  print_r($dataw); 

        //  die();

         $datacontent = $CC->invoice_content->retrieve_data();
         $customer = $this->db->select('*')->from('customer_information')->where("customer_id",$invoice_detail[0]['customer_id'])->get()->result_array();
         $currency_details = $CI->Web_settings->retrieve_setting_editdata();
         $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
         $product_name = $this->db->select('*')->from('product_information')->where("product_id",$all_invoice[0]['product_id'])->get()->result_array();


        $data=array(
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency'  =>$currency_details[0]['currency'],
            'header'=> $dataw[0]['header'],
            'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),   
            'color'=> $dataw[0]['color'],
           'template'=> $dataw[0]['template'],
            'invoice_id'      => $invoice_detail[0]['invoice_id'],
            'customer_id'     => $invoice_detail[0]['customer_id'],
            'customer_name'   => $invoice_detail[0]['customer_name'],
            'date'            => $invoice_detail[0]['date'],
            'commercial_invoice_number' => $invoice_detail[0]['commercial_invoice_number'],
            'billing_address' => $invoice_detail[0]['billing_address'],
            'container_no'=> $invoice_detail[0]['container_no'],
            'bl_no'=> $invoice_detail[0]['bl_no'],
            'company'=> (!empty($datacontent)?$datacontent:$company_info),     
            'customer_currency'=> $customer[0]['currency_type'],
            'customername'=> $customer[0]['customer_name'],
            'mobile'=> $customer[0]['customer_mobile'],
            'all_products'=>$product_name,
             'port_of_discharge' => $invoice_detail[0]['port_of_discharge'],
            'invoice_detail' => $invoice_detail[0]['invoice_details'],
            'invoice'         => $invoice_detail[0]['invoice'],
            'total_amount'    => $invoice_detail[0]['total_amount'],
            'paid_amount'     => $invoice_detail[0]['paid_amount'],
            'due_amount'      => $all_invoice[0]['due_amount'],
            'invoice_discount'=> $invoice_detail[0]['invoice_discount'],
            'total_discount'  => $invoice_detail[0]['total_discount'],
            'unit'            => $invoice_detail[0]['unit'],
            'tax'             => $invoice_detail[0]['tax'],
            'payment_terms'             => $invoice_detail[0]['payment_terms'],
            'number_of_days'  =>$invoice_detail[0]['number_of_days'],
            'etd'  =>$invoice_detail[0]['etd'],
            'eta'  =>$invoice_detail[0]['eta'],
            'all_tax' =>$taxfield1,
            'payment_due_date' =>$invoice_detail[0]['payment_due_date'],
            'taxes'          => $taxfield,
            'prev_due'        => $invoice_detail[0]['prevous_due'],
            'net_total'       => $invoice_detail[0]['prevous_due'] + $invoice_detail[0]['total_amount'],
            'shipping_cost'   => $invoice_detail[0]['shipping_cost'],
            'total_tax'       => $invoice_detail[0]['taxs'],
            'Port_of_discharge'       => $invoice_detail[0]['Port_of_discharge'],
            'invoice_all_data'=> $invoice_detail,
            'taxvalu'         => $taxinfo,
            'payment_type'  =>$paytype,
            'all_invoice'=>$all_invoice,
            'date'=> $all_invoice[0]['date'],
            'rate'=> $all_invoice[0]['rate'],
            'ac_details'=> $all_invoice[0]['ac_details'],
            'remark'=> $all_invoice[0]['remark'],
            'total'=> $all_invoice[0]['total_price'],
            'tax_details'=> $all_invoice[0]['total_tax'],
            'etd'=> $all_invoice[0]['etd'],
            'eta'=> $all_invoice[0]['eta'],
            'gtotal'       => $all_invoice[0]['gtotal'],
            'discount_type'   => $currency_details[0]['discount_type'],
            'bank_list'       => $bank_list,
            'bank_id'         => $invoice_detail[0]['bank_id'],
            'paytype'         => $invoice_detail[0]['payment_type'],
            'invoice_detail'=>$invoice_detail
         
        );
//  print_r($data);die();
      //   print_r($dataw[0]['color']);
    $content = $this->load->view('invoice/new_invoice_pdf_html', $data, true);

    $this->template->full_admin_html_view($content);


    }

    public function invoice_inserted_data_print($invoice_id) {

      
  // echo $invoice_id; die();

        $CI = & get_instance();
        $CC = & get_instance();
        $CA = & get_instance();
        $w = & get_instance();

        $w->load->model('Ppurchases');
        $company_info = $w->Ppurchases->retrieve_company();
        $CI->load->model('Invoices');
        $CA->load->model('invoice_design');
        $CC->load->model('invoice_content');
        $CI->load->model('Web_settings');

        $invoice_detail = $CI->Invoices->invoice_pdf($invoice_id);

        // print_r($invoice_detail); die();

        $all_invoice = $CI->Invoices->all_invoice($invoice_id);
         $setting=  $CI->Web_settings->retrieve_setting_editdata();

         // print_r($all_invoice); die();

            $dataw = $CA->invoice_design->retrieve_data($this->session->userdata('user_id'));
       
        $datacontent = $CC->invoice_content->retrieve_data();

        $customer = $this->db->select('*')->from('customer_information')->where("customer_id",$invoice_detail[0]['customer_id'])->get()->result_array();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
      

         $product_name = $this->db->select('*')->from('product_information')->where("product_id",$all_invoice[0]['product_id'])->get()->result_array();

        //  echo $this->db->last_query(); die();

          // print_r($product_name); die();

       
        $data=array(
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency'  =>$currency_details[0]['currency'],
            'header'=> $dataw[0]['header'],
         'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  
            'color'=> $dataw[0]['color'],
            'template'=> $dataw[0]['template'],
     'invoice_id'      => $invoice_detail[0]['invoice_id'],
            'customer_id'     => $invoice_detail[0]['customer_id'],
            'customer_name'   => $invoice_detail[0]['customer_name'],
            'date'            => $invoice_detail[0]['date'],
            'commercial_invoice_number' => $invoice_detail[0]['commercial_invoice_number'],
            'billing_address' => $invoice_detail[0]['billing_address'],
            'container_no'=> $invoice_detail[0]['container_no'],
            'bl_no'=> $invoice_detail[0]['bl_no'],
             'company'=> (!empty($datacontent)?$datacontent:$company_info), 
            'customer_currency'=> $customer[0]['currency_type'],
            'customername'=> $customer[0]['customer_name'],
   
            'mobile'=> $customer[0]['customer_mobile'],
       
            'all_products'=>$product_name,
             'port_of_discharge' => $invoice_detail[0]['port_of_discharge'],
            'invoice_detail' => $invoice_detail[0]['invoice_details'],
            'invoice'         => $invoice_detail[0]['invoice'],
            'total_amount'    => $invoice_detail[0]['total_amount'],
           'paid_amount'     => $invoice_detail[0]['paid_amount'],
            'due_amount'      => $all_invoice[0]['due_amount'],
            'invoice_discount'=> $invoice_detail[0]['invoice_discount'],
            'total_discount'  => $invoice_detail[0]['total_discount'],
            'unit'            => $invoice_detail[0]['unit'],
            'tax'             => $invoice_detail[0]['tax'],
            'payment_terms'             => $invoice_detail[0]['payment_terms'],
            'number_of_days'  =>$invoice_detail[0]['number_of_days'],
            'etd'  =>$invoice_detail[0]['etd'],
            'eta'  =>$invoice_detail[0]['eta'],
            'all_tax' =>$taxfield1,
            'payment_due_date' =>$invoice_detail[0]['payment_due_date'],
            'taxes'          => $taxfield,
            'prev_due'        => $invoice_detail[0]['prevous_due'],
            'net_total'       => $invoice_detail[0]['prevous_due'] + $invoice_detail[0]['total_amount'],
            'shipping_cost'   => $invoice_detail[0]['shipping_cost'],
            'total_tax'       => $invoice_detail[0]['taxs'],
            'invoice_all_data'=> $invoice_detail,
            'taxvalu'         => $taxinfo,
            'payment_type'  =>$paytype,
            'all_invoice'=>$all_invoice,
            'date'=> $all_invoice[0]['date'],
            'rate'=> $all_invoice[0]['rate'],
            'ac_details'=> $all_invoice[0]['ac_details'],
            'remark'=> $all_invoice[0]['remark'],
            'total'=> $all_invoice[0]['total_price'],
            'tax_details'=> $all_invoice[0]['total_tax'],
            'etd'=> $all_invoice[0]['etd'],
            'eta'=> $all_invoice[0]['eta'],
            'gtotal'       => $all_invoice[0]['gtotal'],
            'discount_type'   => $currency_details[0]['discount_type'],
            'bank_list'       => $bank_list,
            'bank_id'         => $invoice_detail[0]['bank_id'],
            'paytype'         => $invoice_detail[0]['payment_type'],
            'invoice_detail'=>$invoice_detail
         
        );
   

    $content = $this->load->view('invoice/print_new_sale', $data, true);

    $this->template->full_admin_html_view($content);


    }
    public function sale_packing(){

        $CI = & get_instance();
        $CC = & get_instance();
        $CA = & get_instance();
        $w = & get_instance();

        $w->load->model('Ppurchases');
        $company_info = $w->Ppurchases->retrieve_company();
        $CI->load->model('Invoices');
        $CA->load->model('invoice_design');
        $CC->load->model('invoice_content');
        
        $company_info = $w->Ppurchases->retrieve_company();
        $packing_detail = $CI->Invoices->packing_pdf();

        // print_r($packing_detail); die();

        $data=array(
            'header'=> $dataw[0]['header'],
            'logo'=> $dataw[0]['logo'],
            'color'=> $dataw[0]['color'],
            'template'=> $dataw[0]['template'],
            'company'=> $company_info[0]['company_name'],
            // 'address'=> $company_info[0]['address'],
            // 'customername'=> $customer[0]['customer_name'],
            // 'payment'=> $invoice_detail[0]['payment_type'],
            // 'billing'=> $invoice_detail[0]['billing_address'],
            // 'date'=> $invoice_detail[0]['date'],
            // 'paymentterms'=> $invoice_detail[0]['payment_terms'],
            // 'days'=> $invoice_detail[0]['number_of_days'],
            // 'mobile'=> $customer[0]['customer_mobile'],
            // 'customeraddress'=> $customer[0]['customer_address'],
            // 'invoicenumber'=> $invoice_detail[0]['commercial_invoice_number'],
            // 'container'=> $invoice_detail[0]['container_no'],
            // 'blno'=> $invoice_detail[0]['bl_no'],
            // 'port'=> $invoice_detail[0]['port_of_discharge'],
            // 'paymentdue'=> $invoice_detail[0]['payment_due_date'],
            // 'product'=> $product_name[0]['product_name'],
            // 'stock'=> $product_name[0]['p_quantity'],
            // 'quantity'=> $all_invoice[0]['quantity'],
            // 'rate'=> $all_invoice[0]['rate'],
            // 'total'=> $all_invoice[0]['total_price'],
        );
     
    

    $content = $this->load->view('invoice/packing_list_invoice_html', $data, true);

    $this->template->full_admin_html_view($content);



    }
 public function get_all_products() {
      $CI = & get_instance();
 $prodt = $CI->db->select('product_name,product_model,p_quantity')
        ->from('product_information')
        ->get()
        ->result_array();
echo json_encode($prodt);
 }


    public function profarma_invoice_inserted_data() {

        $CI = & get_instance();
        ////////////Tax value////////////////

        $tx=& get_instance();
        $tx->load->model('Tax');
        $tx->Tax->taxlist();
       // $taxfield = $CI->db->select('tax_name,default_value')
       // ->from('tax_settings')
       // ->get()
       // ->result_array();   
       // $data1 = array(
           
       //     'taxes'         => $taxfield
            
      //  );
      //  $invoiceForm = $CI->parser->parse('invoice/add_invoice_form', $data1, true);
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $customer_details = $CI->Invoices->pos_customer_setup();
     
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield1 = $CI->db->select('tax_id,tax')
        ->from('tax_information')
        ->get()
        ->result_array();
        $taxfield = $CI->db->select('tax_name,default_value')
                ->from('tax_settings')
                ->get()
                ->result_array();
        $bank_list          = $CI->Web_settings->bank_list();
        $prodt = $CI->db->select('product_name,product_model,p_quantity')
        ->from('product_information')
        ->get()
        ->result_array();
        $voucher_no = $CI->Invoices->packing_list_no();
       
        $data = array(
            'title'         => display('add_new_invoice'),
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
            'tax'           => $taxfield1,
            'product'       =>$prodt,
           
            'customer_name' => isset($customer_details[0]['customer_name'])?$customer_details[0]['customer_name']:'',
            'customer_id'   => isset($customer_details[0]['customer_id'])?$customer_details[0]['customer_id']:'',
            'bank_list'     => $bank_list,
            'voucher_no' => $voucher_no,
                'tax_name'=>'ww',
        );
        $content = $this->load->view('invoice/profarma_invoice_html', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);

    }


    public function packing_invoice_inserted_data(){
         $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');
        $data=array();
       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('invoice/packing_list_invoice_html', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);
    }

     public function ocean_invoice_inserted_data(){
         $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');
        $data=array();
       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('invoice/ocean_export_invoice_html', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);
    }


    
     public function trucking_invoice_inserted_data(){
         $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');
        $data=array();
       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('invoice/trucking_invoice_html', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);
    }





        public function invoice_inserted_data_manual() {

        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $invoice_id = $this->input->post('invoice_id',TRUE);

        $CI->load->library('linvoice');

        $content = $CI->linvoice->invoice_html_data_manual($invoice_id);

        $this->template->full_admin_html_view($content);

    }

    public function pos_invoice_inserted_data_manual() {

        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');

        $invoice_id = $this->input->post('invoice_id',TRUE);

        $url = $this->input->post('url',TRUE);

        $content = $CI->linvoice->pos_invoice_html_data_manual($invoice_id,$url);

        $this->template->full_admin_html_view($content);

    }





    //Retrive right now inserted data to cretae html

    public function pos_invoice_inserted_data($invoice_id) {

        // 


    }

//Min invoice data

     public function min_invoice_inserted_data($invoice_id) {

        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');

        $content = $CI->linvoice->min_invoice_html_data($invoice_id);

        $this->template->full_admin_html_view($content);

    }



    // Retrieve_product_data from expense

        public function retrieve_product_data() {

        $CI = & get_instance();

        $this->auth->check_admin_auth();

        $CI->load->model('Invoices');

        $product_id  = $this->input->post('product_id',TRUE);

        $supplier_id = $this->input->post('supplier_id',TRUE);



        $product_info = $CI->Invoices->get_total_product($product_id, $supplier_id);



        echo json_encode($product_info);

    }



    //Retrieve_product_data from purchase order


      public function retrieve_product_data_from_po() {

        $CI = & get_instance();

        $this->auth->check_admin_auth();

        $CI->load->model('Invoices');

        $product_id  = $this->input->post('product_id',TRUE);

        //$supplier_id = $this->input->post('supplier_id',TRUE);



        $product_info = $CI->Invoices->get_total_product_from_purchase_order($product_id);



        echo json_encode($product_info);

    }

    // Retrieve_product_data

    // public function retrieve_product_data() {

    //      echo "hello";return;

    //     $CI = & get_instance();

    //     $this->auth->check_admin_auth();

    //     $CI->load->model('Invoices');

    //     $product_id  = $this->input->post('product_id',TRUE);

    //     $supplier_id = $this->input->post('supplier_id',TRUE);



    //     $product_info = $CI->Invoices->get_total_product($product_id, $supplier_id);



    //     echo json_encode($product_info);

    // }



    //product info retrive by product id for invoice

    public function retrieve_product_data_inv() {

        $CI = & get_instance();

        $this->auth->check_admin_auth();

        $CI->load->model('Invoices');

        $product_id = $this->input->post('product_id',TRUE);

        $product_info = $CI->Invoices->get_total_product_invoic($product_id);



        echo json_encode($product_info);

    }



    // Invoice delete

    public function invoice_delete($invoice_id) {

        $CI = & get_instance();

        $this->auth->check_admin_auth();

        $CI->load->model('Invoices');

        $result = $CI->Invoices->delete_invoice($invoice_id);

        if ($result) {

            $this->session->set_userdata(array('message' => display('successfully_delete')));

             redirect('Cinvoice/manage_invoice');

        }

    }



        public function autocompleteproductsearch(){

        $CI =& get_instance();

        $this->auth->check_admin_auth();

        $CI->load->model('Invoices');

        $product_name   = $this->input->post('product_name',TRUE);

        $product_info   = $CI->Invoices->autocompletproductdata($product_name);



       if(!empty($product_info)){

        $list[''] = '';

        foreach ($product_info as $value) {
          
            $json_product[] = array('label'=>$value['product_name'].'('.$value['product_model'].')','value'=>$value['product_id']);

        } 

    }else{

        //$json_product[] = 'No Product Found';
        $json_product[] = 'Add New Product';

        }

        echo json_encode($json_product);

    

    }



    //AJAX INVOICE STOCKs

    public function product_stock_check($product_id) {

        $CI = & get_instance();

        $this->auth->check_admin_auth();

        $CI->load->model('Invoices');

        $purchase_stocks = $CI->Invoices->get_total_purchase_item($product_id);

        $total_purchase = 0;

        if (!empty($purchase_stocks)) {

            foreach ($purchase_stocks as $k => $v) {

                $total_purchase = ($total_purchase + $purchase_stocks[$k]['quantity']);

            }

        }

        $sales_stocks = $CI->Invoices->get_total_sales_item($product_id);

        $total_sales = 0;

        if (!empty($sales_stocks)) {

            foreach ($sales_stocks as $k => $v) {

                $total_sales = ($total_sales + $sales_stocks[$k]['quantity']);

            }

        }



        $final_total = ($total_purchase - $total_sales);

        return $final_total;

    }



//    =========== its for 1 increment =============

    function randomChange($myValue) {

        $random = rand(0, 1);

        if ($random > 0)

            return $myValue + 1;



        return $myValue - 1;

    }



    //This function is used to Generate Key

    public function generator($lenth) {

        $number = array("1", "2", "3", "4", "5", "6", "7", "8", "9");



        for ($i = 0; $i < $lenth; $i++) {

            $rand_value = rand(0, 8);

            $rand_number = $number["$rand_value"];



            if (empty($con)) {

                $con = $rand_number;

            } else {

                $con = "$con" . "$rand_number";

            }

        }

        return $con;

    }

    //customer previous due

     public function previous() {

         $CI = & get_instance();

        $CI->load->model('Customers');

        $customer_id = $this->input->post('customer_id',TRUE);

        $this->db->select("a.*,b.HeadCode,((select ifnull(sum(Debit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)-(select ifnull(sum(Credit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)) as balance");

         $this->db->from('customer_information a');

         $this->db->join('acc_coa b','a.customer_id = b.customer_id','left');

         $this->db->where('a.customer_id',$customer_id);

        $result = $this->db->get()->result_array();

       $balance = $result[0]['balance'];   

       $b = (!empty($balance)?$balance:0);                            

        if ($b){

           echo  $b;

        } else {

           echo  $b;

        }

    }



    public function customer_autocomplete(){

        $CI =& get_instance();

        $this->auth->check_admin_auth();

        $CI->load->library('lpurchase');

        $CI->load->model('Customers');

        $customer_id    = $this->input->post('customer_id',TRUE);

        $customer_info   = $CI->Customers->customer_search($customer_id);



          if($customer_info){

        $json_customer[''] = '';

        foreach ($customer_info as $value) {

            $json_customer[] = array('label'=>$value['customer_name'],'value'=>$value['customer_id']);

        }

         }else{

           $json_customer[] = 'No Record found';

        }

        echo json_encode($json_customer);

    }

    //csv excel 

     public function exportinvocsv() {

        // file name 

        $this->load->model('Invoices');

        $filename = 'sale_' . date('Ymd') . '.csv';

        header("Content-Description: File Transfer");

        header("Content-Disposition: attachment; filename=$filename");

        header("Content-Type: application/csv; ");

        // get data 

        $invoicedata = $this->Invoices->invoice_csv_file();

        // file creation 

        $file = fopen('php://output', 'w');



        $header = array('invoice_no', 'invoice_id', 'customer_name', 'date', 'total_amount');

        fputcsv($file, $header);

        foreach ($invoicedata as $line) {

            fputcsv($file, $line);

        }

        fclose($file);

        exit;

    }





    public function gui_pos(){

    //      ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

           $this->load->model('Invoices');

           $this->load->model('Web_settings');

            $taxfield = $this->db->select('tax_name,default_value')

                ->from('tax_settings')

                ->get()

                ->result_array();

                $tablecolumn = $this->db->list_fields('tax_collection');

                $num_column = count($tablecolumn)-4;

            $data['title'] = display('gui_pos');

            $saveid=$this->session->userdata('user_id');

            $walking_customer      = $this->Invoices->walking_customer();

            $data['customer_id']   = $walking_customer[0]['customer_id'];

            $data['customer_name'] = $walking_customer[0]['customer_name'];

           $data['categorylist']  = $this->Invoices->category_dropdown();
            //$data['categorylist']  = array();

            $customer_details      = $this->Invoices->pos_customer_setup();

            $data['customerlist']  = $this->Invoices->customer_dropdown();

            $currency_details      = $this->Web_settings->retrieve_setting_editdata();

            $data['customer_name'] = $customer_details[0]['customer_name'];

            $data['customer_id']   = $customer_details[0]['customer_id'];

            $data['itemlist']      =  $this->Invoices->allproduct();

            $data['discount_type'] = $currency_details[0]['discount_type'];

            $data['position']       = $currency_details[0]['currency_position'];

            $data['currency']       = $currency_details[0]['currency'];

            $data['taxes']         = $taxfield;

            $data['taxnumber']     = $num_column;

            $data['todays_invoice']= $this->Invoices->todays_invoice();

            $content  = $this->parser->parse('invoice/gui_pos_invoice', $data, true);

     $this->template->full_admin_html_view($content);  

        }



        //gui pos invoice 

        public function gui_pos_invoice() {

        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->model('Invoices');

        $CI->load->model('Web_settings');

        //$product_id = $this->input->post('product_id',TRUE);
        $product_id = $this->input->post('product_id',TRUE);



        $product_details = $CI->Invoices->pos_invoice_setup($product_id);
     //  print_r($product_details);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $taxfield = $CI->db->select('tax_name,default_value')

                ->from('tax_settings')

                ->get()

                ->result_array();

           $prinfo = $this->db->select('*')->from('product_information')->where('product_id',$product_id)->get()->result_array();



        $tr = " ";

        if (!empty($product_details)) {

            $product_id = $this->generator(5);

            $serialdata =explode(',', $product_details->serial_no);

            if($product_details->total_product > 0){

              $qty = 1;

            }else{

                $qty = 1;

            }



        $html = "";

        if (empty($serialdata)) {

            $html .="No Serial Found !";

        }else{

            // Select option created for product

            $html .="<select name=\"serial_no[]\"   class=\"serial_no_1 form-control\" id=\"serial_no_".$product_details->product_id."\">";

                $html .= "<option value=''>".display('select_one')."</option>";

                foreach ($serialdata as $serial) {

                    $html .="<option value=".$serial.">".$serial."</option>";

                }   

            $html .="</select>";

        }

            

            $tr .= "<tr id=\"row_" . $product_details->product_id . "\">

                        <td class=\"\" style=\"width:220px\">

                            

                            <input type=\"text\" name=\"product_name\" onkeypress=\"invoice_productList('" . $product_details->product_id . "');\" class=\"form-control productSelection \" value='" . $product_details->product_name . "- (" . $product_details->product_model . ")" . "' placeholder='" . display('product_name') . "' required=\"\"  tabindex=\"\" readonly>



                            <input type=\"hidden\" class=\"form-control autocomplete_hidden_value product_id_" . $product_details->product_id . "\" name=\"product_id[]\" id=\"SchoolHiddenId_" . $product_details->product_id . "\" value = \"$product_details->product_id\"/>

                        </td>

                        <td>".$html."</td>

                        <td>

                            <input type=\"text\" name=\"available_quantity[]\" class=\"form-control text-right available_quantity_" . $product_details->product_id . "\" value='" . $product_details->total_product . "' readonly=\"\" id=\"available_quantity_" . $product_details->product_id . "\"/>

                        </td>

                        <td>

                            <input type=\"text\" name=\"product_quantity[]\" onkeyup=\"quantity_calculate('" . $product_details->product_id . "');\" onchange=\"quantity_calculate('" . $product_details->product_id . "');\" class=\"total_qntt_" . $product_details->product_id . " form-control text-right\" id=\"total_qntt_" . $product_details->product_id . "\" placeholder=\"0.00\" min=\"0\" value='" . $qty . "' required=\"required\"/>

                        </td>

                        <td style=\"width:85px\">

                            <input type=\"text\" name=\"product_rate[]\" onkeyup=\"quantity_calculate('" . $product_details->product_id . "');\" onchange=\"quantity_calculate('" . $product_details->product_id . "');\" value='" . $product_details->price . "' id=\"price_item_" . $product_details->product_id . "\" class=\"price_item1 form-control text-right\" required placeholder=\"0.00\" min=\"0\"/>

                        </td>



                        <td class=\"\">

                            <input type=\"text\" name=\"discount[]\" onkeyup=\"quantity_calculate('" . $product_details->product_id . "');\" onchange=\"quantity_calculate('" . $product_details->product_id . "');\" id=\"discount_" . $product_details->product_id . "\" class=\"form-control text-right\" placeholder=\"0.00\" min=\"0\"/>



                            <input type=\"hidden\" value=" . $currency_details[0]['discount_type'] . " name=\"discount_type\" id=\"discount_type_" . $product_details->product_id . "\">

                        </td>



                        <td class=\"text-right\" style=\"width:100px\">

                            <input class=\"total_price form-control text-right\" type=\"text\" name=\"total_price[]\" id=\"total_price_" . $product_details->product_id . "\" value='" . $product_details->price . "' tabindex=\"-1\" readonly=\"readonly\"/>

                        </td>



                        <td>";

                            $sl=0;

                        foreach ($taxfield as $taxes) {

                            $txs = 'tax'.$sl;

                           $tr .= "<input type=\"hidden\" id=\"total_tax".$sl."_" . $product_details->product_id . "\" class=\"total_tax".$sl."_" . $product_details->product_id . "\" value='" . $prinfo[0][$txs] . "'/>

                            <input type=\"hidden\" id=\"all_tax".$sl."_" . $product_details->product_id . "\" class=\" total_tax".$sl."\" value='" . $prinfo[0][$txs]*$product_details->price . "' name=\"tax[]\"/>";  

                       $sl++; }

                           $tr.="<input type=\"hidden\" id=\"total_discount_" . $product_details->product_id . "\" />

                            <input type=\"hidden\" id=\"all_discount_" . $product_details->product_id . "\" class=\"total_discount dppr\"/>

                            <a style=\"text-align: right;\" class=\"btn btn-danger btn-xs\" href=\"#\"  onclick=\"deleteRow(this)\">" . '<i class="fa fa-close"></i>' . "</a>

                             <a style=\"text-align: right;\" class=\"btn btn-success btn-xs\" href=\"#\"  onclick=\"detailsmodal('".$product_details->product_name."','".$product_details->total_product."','".$product_details->product_model."','".$product_details->unit."','".$product_details->price."','".$product_details->image."')\">" . '<i class="fa fa-eye"></i>' . "</a>

                        </td>

                    </tr>";

            echo $tr;

        } else {

            return false;

        }

    }



        public function getitemlist(){

             $this->load->model('Invoices');

                $prod=$this->input->post('product_name',TRUE);

                $catid=$this->input->post('category_id',TRUE);

                $getproduct = $this->Invoices->searchprod($catid,$prod);

                if(!empty($getproduct)){

                $data['itemlist']=$getproduct;

                $this->load->view('invoice/getproductlist', $data);  

                }

                else{

                    $title['title'] = 'Product Not found';

                    $this->load->view('invoice/productnot_found', $title);

                    }

        }
        // public function trucking_details_data($purchase_id) {

        //     $CI = & get_instance();
        //     $CI->auth->check_admin_auth();
        //     $CI->load->library('linvoice');
        //     $content = $CI->linvoice->trucking_details_data($purchase_id);
        //     $this->template->full_admin_html_view($content);
    
        // }
    
    public function trucking_details_data($purchase_id) {
            $CI = & get_instance();
            $CI->auth->check_admin_auth();
            $CI->load->library('linvoice');
            $content = $CI->linvoice->trucking_details_data($purchase_id);
            $this->template->full_admin_html_view($content);
        }


     public function trucking_details_data_print($purchase_id) {

            $CI = & get_instance();
            $CI->auth->check_admin_auth();
            $CI->load->library('linvoice');
            $content = $CI->linvoice->trucking_details_data_print($purchase_id);
            $this->template->full_admin_html_view($content);
    
        }
    public function packing_ins(){

        $purchase_id  = date('YmdHis');

        $data = array(
            'expense_packing_id'        => $purchase_id,
            'create_by'       =>  $this->session->userdata('user_id'),
            'invoice_no'          => $this->input->post('invoice_no',TRUE),
            'invoice_date'        => $this->input->post('invoice_date',TRUE),
            'gross_weight' => $this->input->post('gross_weight',TRUE),
            'thickness' => $this->input->post('thickness',TRUE),
            'description'=> $this->input->post('description',TRUE),
            'product_id' => $this->input->post('product_id',TRUE),
            // 'grand_total_amount' => $this->input->post('grand_total_price',TRUE),
            'container_no'     => $this->input->post('container_no',TRUE),
            'grand_total_amount'      => $this->input->post('total',TRUE),
            'status'             => 1,
        );

        $content = $this->load->view('invoice/add_packing_list', $data, true);

        $this->template->full_admin_html_view($content);

        $this->db->insert('sale_packing_list', $data);

        $this->session->set_userdata(array('message' => display('successfully_added')));

        redirect('Cinvoice/manage_packing_list');


        // print_r($data); exit();
    }

public function product_info(){
        $CI = & get_instance();
        $this->auth->check_admin_auth();
    
        $CI->load->model('Invoices');
        $product_model = $this->input->post('product_model',TRUE);
        $product_name = $this->input->post('product_nam',TRUE);
        $product_info = $CI->Invoices->product_search_item($product_model, $product_name);
echo json_encode($product_info);
}

public function performer_ins(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $data=array();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
      // print_r($_POST);
         $purchase_id = date('YmdHis');
         $chalan_no=$this->input->post('chalan_no');
       // echo $chalan_no;
        $postData = $this->input->post();
       // print_r($postData);
       // foreach ($post as $id)
       //  {
      //   $this->model_admin->delete_admin_user($id);
      //   }
         $data = array(
                    'purchase_id' => $purchase_id,
                    'chalan_no'=>$this->input->post('chalan_no'),
                    'purchase_date'=>$this->input->post('purchase_date'),
                    'billing_address'=> $this->input->post('billing_address'),
                    'customer_id'=>$this->input->post('customer_id'),
                    'pre_carriage'=>$this->input->post('pre_carriage'),
                    'receipt'=>$this->input->post('receipt'),
                    'remarks'=>$this->input->post('remark'),
                    'tax_details'=>$this->input->post('tax_details'),
                    'total_gross' =>  $this->input->post('total_gross',TRUE),
'total_net' =>  $this->input->post('total_net',TRUE),
'total_weight' =>  $this->input->post('total_weight',TRUE),
                 'gtotal'=>$this->input->post('gtotal'),
                 'total'  => $this->input->post('Over_all_Total'),
                //  'overall_gross' =>  $this->input->post('overall_gross',TRUE),
                //  'overall_net' =>  $this->input->post('overall_net',TRUE),
                 'payment_id' =>$this->input->post('payment_id'),
                  'customer_gtotal'  =>$this->input->post('customer_gtotal'),
                    'country_goods'=>$this->input->post('country_goods'),
                    'country_destination'=>$this->input->post('country_destination'),
                    'loading'=>$this->input->post('loading'),
                    'discharge'=>$this->input->post('discharge'),
                    'terms_payment'=>$this->input->post('terms_payment'),
                    'description_goods'=>$this->input->post('description_goods'),
                    'amt_paid'=>$this->input->post('amount_paid'),
                    'bal_amt'=>$this->input->post('balance'),
                    'ac_details'=>$this->input->post('ac_details'),
                    'sales_by'        => $this->session->userdata('user_id')
                 );
             //  print_r($data); die();
                $purchase_id_1 = $this->db->where('chalan_no',$this->input->post('chalan_no',TRUE));
                $q=$this->db->get('profarma_invoice');
                $row = $q->row_array();
            if(!empty($row['purchase_id'])){
                $this->session->set_userdata("profarma_1",$row['purchase_id']);
           $this->db->where('purchase_id', $this->session->userdata("profarma_1"));
          $this->db->delete('profarma_invoice');
                $this->db->insert('profarma_invoice', $data);
         // echo $this->db->last_query();
           }
            else{
            $this->db->insert('profarma_invoice', $data);
   //  echo $this->db->last_query();
            }
            $purchase_id = $this->db->select('purchase_id')->from('profarma_invoice')->where('chalan_no',$this->input->post('chalan_no',TRUE))->get()->row()->purchase_id;
      //  echo $this->db->last_query();
            $this->session->set_userdata("profarma_2",$purchase_id);
                 $avl = $this->input->post('available_quantity');
                 $p_id = $this->input->post('product_id');
              //   $p_id = $this->input->post('product_id');
                // $quantity = $this->input->post('product_quantity');
             //    $rate = $this->input->post('product_rate');
                 $t_price = $this->input->post('total_amt');
                 $p_name= $this->input->post('prodt');
                 $rowCount = count($this->input->post('product_id',TRUE));
                 $thickness = $this->input->post('thickness',TRUE);
                 $supplier_block_no = $this->input->post('supplier_block_no',TRUE);
                 $supplier_slab_no = $this->input->post('supplier_slab_no',TRUE);
                 $gross_width = $this->input->post('gross_width',TRUE);
                 $gross_height = $this->input->post('gross_height',TRUE);
                 $gross_sq_ft = $this->input->post('gross_sq_ft',TRUE);
                 $bundle_no = $this->input->post('bundle_no',TRUE);
                 $slab_no = $this->input->post('slab_no',TRUE);
                 $net_width = $this->input->post('net_width',TRUE);
                 $net_height = $this->input->post('net_height',TRUE);
                 $net_sq_ft = $this->input->post('net_sq_ft',TRUE);
                 $cost_sq_ft = $this->input->post('cost_sq_ft',TRUE);
                    $tableid=$this->input->post('tableid',TRUE);
                 $cost_sq_slab = $this->input->post('cost_sq_slab',TRUE);
                 $sales_amt_sq_ft = $this->input->post('sales_amt_sq_ft',TRUE);
                 $sales_slab_amt = $this->input->post('sales_slab_amt',TRUE);
                 $weight = $this->input->post('weight',TRUE);
                //  $origin = $this->input->post('origin',TRUE);
                 $total = $this->input->post('total',TRUE);
                        $this->db->where('purchase_id', $this->session->userdata("profarma_1"));
                  $this->db->delete('profarma_invoice_details');
                 for ($i = 0; $i < $rowCount; $i++) {
                //    $product_name = $p_name[$i];
                 //   $product_quantity = $quantity[$i];
                 //   $product_rate = $rate[$i];
                    $product_id = $p_id[$i];
                    $total_price = $t_price[$i];
                    $thick =   $thickness[$i];
                    $suppli =   $supplier_block_no[$i];
                    $supplier_sla =   $supplier_slab_no[$i];
                    $gross_wid =   $gross_width[$i];
                    $gross_hei =   $gross_height[$i];
                    $gross_sq =   $gross_sq_ft[$i];
                    $bun_no =   $bundle_no[$i];
                  //  $sa_no =   $slab_no[$i];
                    $net_wid =   $net_width[$i];
                    $net_hei =   $net_height[$i];
                    $net_sq =   $net_sq_ft[$i];
                    $cost_sqf =   $cost_sq_ft[$i];
                    $cost_sqf_sla =   $cost_sq_slab[$i];
                    $saleamt_sqf =   $sales_amt_sq_ft[$i];
                    $sales_slab_am =   $sales_slab_amt[$i];
                    $weig =   $weight[$i];
                    // $orig =   $origin[$i];
                    $description_data=$this->input->post('description',TRUE);
                    $data1 = array(
                        'purchase_detail_id' => $this->generator(15),
                        'purchase_id'        => $this->session->userdata("profarma_2"),
                        'product_id'         => $product_id,
                         'description'         => $description_data[$i],
                       // 'quantity'           => $product_quantity,
                       // 'rate'               => $product_rate,
                         'tableid'   => $tableid[$i],
                        'thickness'             => $thick,
                        'supplier_block_no'  =>  $suppli,
                        'supplier_slab_no'  => $supplier_sla ,
                        'gross_width'  => $gross_wid,
                        'gross_height'  => $gross_hei,
                        'gross_sq_ft'  =>$gross_sq ,
                        'bundle_no'  =>$bun_no,
                     //   'slab_no'  =>  $sa_no,
                        'net_width'  => $net_wid,
                        'net_height'  => $net_hei,
                         'net_sq_ft'  =>$net_sq ,
                        'cost_sq_ft'  =>  $cost_sqf,
                        'cost_sq_slab'  =>   $cost_sqf_sla,
                        'sales_amt_sq_ft ' =>  $saleamt_sqf,
                        'sales_slab_amt'   => $sales_slab_am,
                        'weight'  =>  $weig ,
                        // 'origin'  => $orig,
                        'total_amount'       => $total_price,
                        'create_by'          =>  $this->session->userdata('user_id'),
                        'status'             => 1
                    );
           
                  $this->db->insert('profarma_invoice_details', $data1);
                //echo $this->db->last_query();
                  

                   $data2 = array(
        'create_by'        => $this->session->userdata('user_id'),
        'overall_total'         =>    $this->input->post('gtotal',TRUE),
        'product_id'         => $product_id,
        'description_table'         => $description_data[$i],
       'thickness'             => $thick,
       'supplier_block_no'  =>  $suppli,
       'supplier_slab_no'  => $supplier_sla ,
       'g_width'  => $gross_wid,
       'g_height'  => $gross_hei,
       'gross_sqft'  =>$gross_sq ,
       'bundle_no'  =>$bun_no,
       'n_width'  => $net_wid,
       'n_height'  => $net_hei,
        'net_sqft'  =>$net_sq ,
       'cost_sqft'  =>  $cost_sqf,
       'cost_slab'  =>   $cost_sqf_sla,
       'sales_price_sqft ' =>  $saleamt_sqf,
       'sales_slab_price'   => $sales_slab_am,
       'weight'  =>  $weig ,
         'total_amt'       => $total_price,
    //   'origin'  => $orig,
       'status'             => 1
        );
//                   $this->db->where('product_id', $product_id[$i]);
//   $this->db->where('create_by', $this->session->userdata('user_id'));
//     $this->db->where('bundle_no', $bundle_no[$i]);
//             $this->db->delete('product_details');
//         $this->db->insert('product_details', $data2);
      //   echo $this->db->last_query();







                }
               $final_return = $purchase_id."/".$chalan_no;
             echo json_encode($final_return);
     }


public function addCart()
    {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $content = $CI->linvoice->add_cartitems();
        $this->template->full_admin_html_view($content);
    }

public function fetchData()
    {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $CI->load->library('linvoice');
        $items = $CI->Invoices->items_insert();
        $content = $CI->linvoice->dataCart();
             // print_r($content[0]['description']);
        $this->template->full_admin_html_view($content);
    }
    
    
    
    
      public function sales_tax() {
      $CI = & get_instance();
    $this->load->model('Invoices');
        $CI->load->model('Web_settings');
    
        $data['setting_detail']  = $CI->Web_settings->retrieve_setting_editdata();
    $data['sales_tax'] = $this->Invoices->sales_tax();


$content = $CI->parser->parse('report/tax_report', $data, true);
        $this->template->full_admin_html_view($content);
}







public function expense_tax() {
      $CI = & get_instance();
    $this->load->model('Invoices');

    $CI->load->model('Web_settings');

    $data['setting_detail']  = $CI->Web_settings->retrieve_setting_editdata();

 $data['exp_tax'] = $this->Invoices->expense_tax();
  $data['ser_exp_tax'] = $this->Invoices->service_provider_expense_tax();
$content = $CI->parser->parse('report/taxsable_expense', $data, true);
        $this->template->full_admin_html_view($content);
}





public function instant_customer(){
 $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Customers');
        $t_status='';
        if(empty($this->input->post('taxes',TRUE))){
 $t_status='0';
        }else{
 $t_status='1';
        }
    $data = array(
        'customer_name'   => $this->input->post('customer_name',TRUE),
        'customer_address'=> $this->input->post('address',TRUE),
        'address2'        => $this->input->post('address2',TRUE),
        'customer_mobile' => $this->input->post('mobile',TRUE),
        'currency_type'   => $this->input->post('currency1',TRUE),
        'phone'           => $this->input->post('phone',TRUE),
        'payment_terms'   =>$this->input->post('payment',TRUE),
        'sales_tax'       =>$this->input->post('tax',TRUE),
        'tax_percent'     =>$this->input->post('taxes',TRUE)."%",
        'tax_status'  =>$t_status,
        'fax'             => $this->input->post('fax',TRUE),
        'contact'         => $this->input->post('contact',TRUE),
        'city'            => $this->input->post('city',TRUE),
        'state'           => $this->input->post('state',TRUE),
        'zip'             => $this->input->post('zip',TRUE),
        'country'         => $this->input->post('country',TRUE),
        'email_address'   => $this->input->post('emailaddress',TRUE),
        'customer_email'  => $this->input->post('email',TRUE),
        'credit_limit'  => $this->input->post('previous_balance',TRUE),
        'customer_type'  => $this->input->post('customer_type',TRUE),
        'status'          => 2,
        'create_by'       => $this->session->userdata('user_id'),
  );
    $result = $this->Customers->customer_entry($data);
  
    if ($result) {
    $customer_id = $this->db->insert_id();
    $vouchar_no = $this->auth->generator(10);
    //Customer  basic information adding.
    $coa = $this->Customers->headcode();
        if($coa->HeadCode!=NULL){
            $headcode=$coa->HeadCode+1;
        }else{
            $headcode="102030001";
        }
$c_acc=$customer_id.'-'.$this->input->post('customer_name',TRUE);
$createby=$this->session->userdata('user_id');
$createdate=date('Y-m-d H:i:s');
$customer_coa = [
         'HeadCode'         => $headcode,
         'HeadName'         => $c_acc,
         'PHeadName'        => 'Customer Receivable',
         'HeadLevel'        => '4',
         'IsActive'         => '1',
         'IsTransaction'    => '1',
         'IsGL'             => '0',
         'HeadType'         => 'A',
         'IsBudget'         => '0',
         'IsDepreciation'   => '0',
         'customer_id'      => $customer_id,
         'DepreciationRate' => '0',
         'CreateBy'         => $createby,
         'CreateDate'       => $createdate,
    ];
        //Previous balance adding -> Sending to customer model to adjust the data.
        $this->db->insert('acc_coa',$customer_coa);
        $this->Customers->previous_balance_add($this->input->post('previous_balance',TRUE), $customer_id);
    //     $data['status']        = true;
    //     $data['message']       = display('save_successfully');
    //     $data['customer_id']   = $customer_id;
    //     $data['customer_name'] = $data['customer_name'];
    // } else {
    //     $data['status'] = false;
    //     $data['error_message'] = display('please_try_again');
    // }
}
$all_customer = $this->Customers->all_customer();
    echo json_encode($all_customer);
    }

public function newsale_with_attachment_stand($invoiceid)
  {

    $sql='select c.* from user_login  u
    join 
    company_information c
    on c.company_id=u.cid
     where u.user_id='.$_SESSION['user_id'];
    $query=$this->db->query($sql);
    $data['company_info']=$query->result_array();

        $sql='SELECT b.* from invoice a JOIN customer_information b on b.customer_id=a.customer_id
 WHERE a.invoice_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['customer_info']=$query->result_array();

      $sql='select b.* from invoice_details a join product_information b on a.product_id=b.product_id
 where a.invoice_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['product_info']=$query->result_array();

 $sql='select * from invoice_details where invoice_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['invoice_details']=$query->result_array();
$sql='select * from invoice where invoice_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['invoice']=$query->result_array();

    $content = $this->load->view('pdf_attach_mail/new_sale', $data, true);
  
   
  }

  public function newsale_with_attachment_cus($invoiceid)
  {
   
    $sql='select c.* from user_login  u
    join 
    company_information c
    on c.company_id=u.cid
     where u.user_id='.$_SESSION['user_id'];
    $query=$this->db->query($sql);
    $data['company_info']=$query->result_array();

        $sql='SELECT b.* from invoice a JOIN customer_information b on b.customer_id=a.customer_id
 WHERE a.invoice_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['customer_info']=$query->result_array();

      $sql='select b.* from invoice_details a join product_information b on a.product_id=b.product_id
 where a.invoice_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['product_info']=$query->result_array();

 $sql='select * from invoice_details where invoice_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['invoice_details']=$query->result_array();
$sql='select * from invoice where invoice_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['invoice']=$query->result_array();
    $sql='select * from invoice_email where uid='.$_SESSION['user_id'];;
    $query=$this->db->query($sql);

    $data['mail']= $query->result_array();

    $content = $this->load->view('pdf_attach_mail/new_sale', $data, true);
  
   

  }


  /////////////////////proforma//////////////////////////////////

  public function proforma_with_attachment_stand($invoiceid)
  {
  
  
    $sql='select c.* from user_login  u
    join 
    company_information c
    on c.company_id=u.cid
     where u.user_id='.$_SESSION['user_id'];
    $query=$this->db->query($sql);
    $data['company_info']=$query->result_array();

        $sql='SELECT b.* from profarma_invoice a JOIN customer_information b on b.customer_id=a.customer_id
 WHERE a.purchase_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['customer_info']=$query->result_array();

      $sql='select a.* from profarma_invoice_details a join product_information b on a.product_id=b.product_id
 where a.purchase_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['product_info']=$query->result_array();

 $sql='select * from profarma_invoice_details where purchase_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['invoice_details']=$query->result_array();
$sql='select * from profarma_invoice where purchase_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['invoice']=$query->result_array();

$content = $this->load->view('pdf_attach_mail/profarma', $data, true);
  }



public function proforma_with_attachment_cus($invoiceid)
  {
      $CA = & get_instance();
      $CI = & get_instance();
      $CA->load->model('invoice_design');
      $CA->load->model('invoice_content');
      $CA->load->model('Web_settings');
       $w = & get_instance();

        $w->load->model('Ppurchases');
         
      $dataw = $CA->invoice_design->proforma_data();
      $currency_details = $CI->Web_settings->retrieve_setting_editdata();
      $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
       // print_r($curn_info_default); die();
       $data['head']=$dataw;
    $sql='select c.* from user_login  u
    join
    company_information c
    on c.company_id=u.cid
     where u.user_id='.$_SESSION['user_id'];
    $query=$this->db->query($sql);
// echo $this->db->last_query();
  $company_content= $CA->invoice_content->retrieve_info_data();
   $company_info = $w->Ppurchases->retrieve_company();

  

        //   $this->session->set_userdata('image_email', base_url().$data['company_info'][0]['logo']);
        //  echo base_url().$data['company_info'][0]['logo'];
    // print_r( $data['company_info']); die();
    
    
    $setting=  $CI->Web_settings->retrieve_setting_editdata();
     $this->session->set_userdata('image_email', base_url().(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']));
    
    
    
    
        $sql='SELECT * from profarma_invoice a JOIN customer_information b on b.customer_id=a.customer_id
     WHERE a.purchase_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['customer_info']=$query->result_array();
      // print_r( $data['customer_info']); die();
      $sql='select a.*, b.*, c.* from profarma_invoice_details a join profarma_invoice b on a.purchase_id=b.purchase_id join product_information c on c.product_id=a.product_id where a.purchase_id='.$invoiceid;
      // print_r($sql);
    $query=$this->db->query($sql);
    $data['product_info']=$query->result_array();
   // print_r( $data['product_info']); die();
 $sql='select * from profarma_invoice_details where purchase_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['invoice_details']=$query->result_array();
$sql='select * from profarma_invoice where purchase_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['invoice']=$query->result_array();
    // print_r($data['invoice']);
    $sql='select * from invoice_email where uid='.$_SESSION['user_id'];;
    $query=$this->db->query($sql);
    $data['mail']= $query->result_array();
    $data['template'] = $dataw[0]['template'];
    $data['curn_info_default'] = $curn_info_default[0]['currency_name'];
    $data['currency'] = $currency_details;

    $sql='select * from invoice_content ';
    $query=$this->db->query($sql);
    // $company_content
   $data['company_info']=(!empty($company_content)?$company_content:$company_info);
      $data['company_content']=(!empty($company_content)?$company_content:$company_info);
    $data['logo'] = $setting;



    $content = $this->load->view('pdf_attach_mail/profarma', $data, true);
  }
  /////////////////////packing//////////////////////////////////

  public function packing_with_attachment_stand($invoiceid)
  {
    
$sql='select c.* from user_login  u
    join 
    company_information c
    on c.company_id=u.cid
     where u.user_id='.$_SESSION['user_id'];
    $query=$this->db->query($sql);
    $data['company_info']=$query->result_array();

    

      $sql='select b.* from sale_packing_list_detail a join product_information b on a.product_id=b.product_id
 where a.expense_packing_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['product_info']=$query->result_array();

 $sql='select * from sale_packing_list_detail where expense_packing_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['invoice_details']=$query->result_array();
$sql='select * from sale_packing_list where expense_packing_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['invoice']=$query->result_array();

    $content = $this->load->view('pdf_attach_mail/packing', $data, true);


  } 

  public function packing_with_attachment_cus($invoiceid)
  {
    $CA = & get_instance();
    $CI = & get_instance();
    $CA->load->model('invoice_design');
    // $CA->load->model('Web_settings');
      $dataw = $CA->invoice_design->retrieve_data($this->session->userdata('user_id'));
      // $currency_details = $CI->Web_settings->retrieve_setting_editdata();
      // $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
  $sql='select c.* from user_login  u
    join
    company_information c
    on c.company_id=u.cid
     where u.user_id='.$_SESSION['user_id'];
    $query=$this->db->query($sql);
    $data['company_info']=$query->result_array();
     // print_r($data['company_info']); die();
    $sql='select * from sale_packing_list_detail a join product_information b on a.product_id=b.product_id
      where a.expense_packing_id='.$invoiceid;
    $query=$this->db->query($sql);
    // echo $this->db->last_query(); die();
    $data['product_info']=$query->result_array();
    // print_r($data['product_info']); die();
    $sql='select * from sale_packing_list_detail where expense_packing_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['invoice_details']=$query->result_array();
    $sql='select * from sale_packing_list where expense_packing_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['invoice']=$query->result_array();
    $sql='SELECT * FROM sale_packing_list s JOIN invoice i JOIN customer_information c on c.customer_id=i.customer_id where s.expense_packing_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['customer_info']=$query->result_array();
    // echo '<pre>';
    // print_r($data['customer_info'][0]['customer_email']); die();
    // echo '</pre>';
     // print_r($data['invoice']);
    $sql='select * from invoice_email where uid='.$_SESSION['user_id'];;
    $query=$this->db->query($sql);
    $data['mail']= $query->result_array();
     $data['template'] = $dataw[0]['template'];
    // $data['curn_info_default'] = $curn_info_default[0]['currency_name'];
    // $data['currency'] = $currency_details;
    $content = $this->load->view('pdf_attach_mail/packing', $data, true);
  }
  /////////////////////Ocean//////////////////////////////////

  public function ocean_with_attachment_stand($invoiceid)
  {
   
$sql='select c.* from user_login  u
    join 
    company_information c
    on c.company_id=u.cid
     where u.user_id='.$_SESSION['user_id'];
    $query=$this->db->query($sql);
    $data['company_info']=$query->result_array();

         $sql='SELECT b.* from ocean_export_tracking a JOIN supplier_information b on b.supplier_id=a.supplier_id
 WHERE a.ocean_export_tracking_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['supplier_info']=$query->result_array();

  

 
$sql='select * from ocean_export_tracking where ocean_export_tracking_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['ocean']=$query->result_array();
$content = $this->load->view('pdf_attach_mail/ocean', $data, true);
   

  }

  public function ocean_with_attachment_cus($invoiceid)
  {
    $CA = & get_instance();
    $CI = & get_instance();
    $CA->load->model('invoice_design');
    $CA->load->model('invoice_content');
    $CA->load->model('Invoices');
     $w = & get_instance();

        $w->load->model('Ppurchases');
        $getOceanAttach =  $CA->Invoices->retrieve_ocean($invoiceid);
       
     $dataw = $CA->invoice_design->proforma_data();
   $sql='select c.* from user_login  u join company_information c on c.company_id=u.cid where u.user_id='.$_SESSION['user_id'];
    $query=$this->db->query($sql);
  
     
   $sql='select b.* from ocean_export_tracking a join supplier_information b on b.supplier_id=a.supplier_id WHERE a.ocean_export_tracking_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['supplier_info']=$query->result_array();
   $sql='select * from ocean_export_tracking where ocean_export_tracking_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['ocean']=$query->result_array();
    // print_r($data['ocean']); die();
//    echo($data['ocean'][0]['consignee']); die();
    $customer_name = $CI->db->select('*')->from('customer_information')->where('customer_id', $data['ocean'][0]['consignee'])->get()->result_array();
    $data['customername']= $customer_name;

    $sql='SELECT c.* from ocean_export_tracking i JOIN supplier_information c on c.supplier_id=i.supplier_id WHERE i.ocean_export_tracking_id ='.$invoiceid ;
    $query=$this->db->query($sql);
    $data['customer_info']=$query->result_array();

      $setting=  $CI->Web_settings->retrieve_setting_editdata();
      $this->session->set_userdata('image_email', base_url().(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']));

    $sql='select * from invoice_content ';
    $query=$this->db->query($sql);
    // $company_content
  
    
      $company_content= $CA->invoice_content->retrieve_info_data();
   $company_info = $w->Ppurchases->retrieve_company();
     $data['company_info']=(!empty($company_content)?$company_content:$company_info);
      $data['company_content']=(!empty($company_content)?$company_content:$company_info);
 $this->session->set_userdata('image_email', base_url().(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']));

   $sql='select * from invoice_email where uid='.$_SESSION['user_id'];;
    $query=$this->db->query($sql);
    $data['mail']= $query->result_array();
    $data['template'] = $dataw[0]['template'];
     $data['head']=$dataw;
         $data['logo'] = $setting;
         $data['ocean_attach'] = $getOceanAttach;
          

     
    $content = $this->load->view('pdf_attach_mail/ocean_export', $data, true);
}
  /////////////////////Trucking//////////////////////////////////

  public function trucking_with_attachment_stand($invoiceid)
  {
  
$sql='select c.* from user_login  u
    join 
    company_information c
    on c.company_id=u.cid
     where u.user_id='.$_SESSION['user_id'];
    $query=$this->db->query($sql);
    $data['company_info']=$query->result_array();

     $sql=' SELECT b.* FROM `sale_trucking` a join customer_information b on b.customer_id=a.bill_to where trucking_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['customer_info']=$query->result_array();  

 

  $sql='select * from sale_trucking_details where sale_trucking_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['sale_trucking_details']=$query->result_array();
$sql='select * from sale_trucking where trucking_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['sale_trucking']=$query->result_array();
    $sql='select * from sale_trucking_details where sale_trucking_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['sale_trucking_details']=$query->result_array();
$sql='select * from sale_trucking where trucking_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['sale_trucking']=$query->result_array();

$content = $this->load->view('pdf_attach_mail/trucking', $data, true);
  }









 public function trucking_with_attachment_cus($invoiceid)
  {
    $CA = & get_instance();
    $CI = & get_instance();
    $CA->load->model('invoice_design');
    $CI->load->model('Web_settings');
         $CI->load->model('invoice_content');
         $CI->load->model('Invoices');
          $w = & get_instance();

        $w->load->model('Ppurchases');
            $dataw = $CA->invoice_design->retrieve_data();
            $getTrucking =  $CI->Invoices->retrieve_trucking($invoiceid);




    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
  
    $sql='select c.* from user_login  u
    join
    company_information c
    on c.company_id=u.cid

     where u.user_id='.$_SESSION['user_id'];


    $query=$this->db->query($sql);
   
    // echo $sql;
   $company_content= $CI->invoice_content->retrieve_info_data();
     $company_info = $w->Ppurchases->retrieve_company();
    $data['head']=$dataw;
   $data['company_info']=(!empty($company_content)?$company_content:$company_info);
      $data['company_content']=(!empty($company_content)?$company_content:$company_info);
  

     $this->session->set_userdata('image_email', base_url().$data['company_info'][0]['logo']);


    //  echo $data['company_info'][0]['logo'];  die();

   $sql=' SELECT * FROM `sale_trucking` a join customer_information b on b.customer_id=a.bill_to where trucking_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['customer_info']=$query->result_array();
   $sql='select * from sale_trucking_details where sale_trucking_id='.$invoiceid;
    $query=$this->db->query($sql);
    $data['sale_trucking_details']=$query->result_array();
    // print_r($data['sale_trucking_details']);

    $sql='select * from sale_trucking where trucking_id='.$invoiceid;
    $query=$this->db->query($sql);

 
      $setting=  $CI->Web_settings->retrieve_setting_editdata();
    

      $this->session->set_userdata('image_email', base_url().(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']));

    $data['sale_trucking']=$query->result_array();
    $sql='select * from invoice_email where uid='.$_SESSION['user_id'];;
    $query=$this->db->query($sql);
    $data['mail']= $query->result_array();
    $data['template'] = $dataw[0]['template'];
    $data['curn_info_default'] = $curn_info_default[0]['currency_name'];
    $data['currency'] = $currency_details;

    // image_email
    $sql='select * from invoice_content ';
    $query=$this->db->query($sql);
    // $company_content
   

        $data['logo'] = $setting;
        $data['trucking'] = $getTrucking;


$content = $this->load->view('pdf_attach_mail/trucking', $data, true);
  }

}







