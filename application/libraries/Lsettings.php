<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lsettings {

    //Add person
    public function add_person() {
        $CI = & get_instance();
        $CI->load->model('Settings');


        $data = array(
            'title' => display('add_person')
        );
        $bankList = $CI->parser->parse('settings/add_person', $data, true);
        return $bankList;
    }

    //personal loan
    public function add_person1() {
        $CI = & get_instance();
        $CI->load->model('Settings');

        $data = array(
            'title' => display('add_person')
        );
        $bankList = $CI->parser->parse('settings/add_person1', $data, true);
        return $bankList;
    }

    //Add loan
    public function add_loan() {
        $CI = & get_instance();
        $CI->load->model('Settings');
        $person_list = $CI->Settings->person_list_personal_loan();

        $data = array(
            'title'       => display('add_loan'),
            'person_list' => $person_list,
        );
        $add_loan = $CI->parser->parse('settings/add_loan', $data, true);
        return $add_loan;
    }

    //Add payment
    public function add_payment() {
        $CI = & get_instance();
        $CI->load->model('Settings');
        $person_list = $CI->Settings->person_list_personal_loan();

        $data = array(
            'title'       => display('add_payment'),
            'person_list' => $person_list,
        );
        $add_payment = $CI->parser->parse('settings/add_payment', $data, true);
        return $add_payment;
    }

    //Manage person
    public function manage_person($links, $per_page, $limit) {
        $CI = & get_instance();
        $CI->load->model('Settings');
        $CI->load->model('Web_settings');
        $person_list = $CI->Settings->person_list_limt($per_page, $limit);
 $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'       => display('manage_person'),
            'person_list' => $person_list,
            'currency'    => $currency_details[0]['currency'],
            'position'    => $currency_details[0]['currency_position'],
            'links'       => $links
        );
        $manage_person = $CI->parser->parse('settings/manage_person', $data, true);
        return $manage_person;
    }

    //Manage personal loan person information 
    public function manage_person_loan_person($links, $per_page, $limit) {
        $CI = & get_instance();
        $CI->load->model('Settings');
        $person_list = $CI->Settings->person_list_limt_loan($per_page, $limit);

        if (!empty($person_list)) {
            foreach ($person_list as $index => $value) {
                $person_list[$index]['balance'] = $person_list[$index]['debit'] - $person_list[$index]['credit'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'       => display('manage_person'),
            'person_list' => $person_list,
            'links'       => $links,
            'currency'    => $currency_details[0]['currency'],
            'position'    => $currency_details[0]['currency_position'],
        );
        $manage_person = $CI->parser->parse('settings/peson_loan_manage', $data, true);
        return $manage_person;
    }

    // ####### Manage Personal loan ###############
    public function manage_loan($links, $per_page, $limit) {
        $CI = & get_instance();
        $CI->load->model('Settings');
        $person_list = $CI->Settings->loan_list_personal($per_page, $limit);

        $data = array(
            'title'       => display('manage_person'),
            'person_list' => $person_list,
            'links'       => $links
        );
        $manage_person = $CI->parser->parse('settings/loan_manage', $data, true);
        return $manage_person;
    }

    public function edit_person($person_id) {
        $CI = & get_instance();
        $CI->load->model('Settings');
        $person_list = $CI->Settings->select_person_by_id($person_id);

        $data = array(
            'title'          => display('personal_edit'),
            'person_id'      => $person_list[0]['person_id'],
            'person_name'    => $person_list[0]['person_name'],
            'person_phone'   => $person_list[0]['person_phone'],
            'person_address' => $person_list[0]['person_address'],
        );

        $manage_person = $CI->parser->parse('settings/person_edit', $data, true);
        return $manage_person;
    }

    //personal loan update date
    public function edit_person_loan($person_id) {
        $CI = & get_instance();
        $CI->load->model('Settings');
        $person_list = $CI->Settings->select_loan_person_by_id($person_id);

        $data = array(
            'title'          => display('personal_edit'),
            'person_id'      => $person_list[0]['person_id'],
            'person_name'    => $person_list[0]['person_name'],
            'person_phone'   => $person_list[0]['person_phone'],
            'person_address' => $person_list[0]['person_address'],
        );

        $manage_person = $CI->parser->parse('settings/person_loan_edit', $data, true);
        return $manage_person;
    }

    // Edit loan for personal loan
    public function edit_loan($person_id) {
        $CI = & get_instance();
        $CI->load->model('Settings');
        $loan_per_list = $CI->Settings->loan_updatlist_personal();
        $person_list = $CI->Settings->updata_loan_id($person_id);

        $data = array(
            'title'               => 'Manage Person',
            'person_id'           => $loan_per_list,
            'date'                => $person_list[0]['date'],
            'per_loan_id'         => $person_list[0]['per_loan_id'],
            'per_loan_name'       => $person_list[0]['person_name'],
            'seleceted_person_id' => $person_list[0]['person_id'],
            'debit'               => $person_list[0]['debit'],
            'credit'              => $person_list[0]['credit'],
            'details'             => $person_list[0]['details'],
        );

        $manage_person = $CI->parser->parse('settings/loan_edit', $data, true);
        return $manage_person;
    }

    //Person Ledger data
    public function person_ledger_data($person_id) {
        $CI = & get_instance();
        $CI->load->model('Settings');

        $person_details_all = $CI->Settings->person_list();
        $person_details     = $CI->Settings->select_person_by_id($person_id);
        $ledger             = $CI->Settings->personledger_tradational($person_id);
        $CI->load->library('occational');
        $balance            = 0;
        $total_credit       = 0;
        $total_debit        = 0;
        $total_balance      = 0;

        if (!empty($ledger)) {
            foreach ($ledger as $k => $v) {
                $ledger[$k]['balance']         = ($ledger[$k]['debit'] - $ledger[$k]['credit']) + $balance;
                $balance                       = $ledger[$k]['balance'];
                $ledger[$k]['subtotalDebit']   = $total_debit + $ledger[$k]['debit'];
                $ledger[$k]['date'] =$CI->occational->dateConvert($ledger[$k]['date']);
                $total_debit                   = $ledger[$k]['subtotalDebit'];
                $ledger[$k]['subtotalCredit']  = $total_credit + $ledger[$k]['credit'];
                $total_credit                  = $ledger[$k]['subtotalCredit'];
                $ledger[$k]['subtotalBalance'] = $total_balance + $ledger[$k]['balance'];
                $total_balance                 = $ledger[$k]['subtotalDebit'] - $ledger[$k]['subtotalCredit'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'              => display('person_ledger'),
            'person_details_all' => $person_details_all,
            'person_details'     => $person_details,
            'person_id'          => $person_details[0]['person_id'],
            'person_name'        => $person_details[0]['person_name'],
            'person_phone'       => $person_details[0]['person_phone'],
            'person_address'     => $person_details[0]['person_address'],
            'currency'           => $currency_details[0]['currency'],
            'position'           => $currency_details[0]['currency_position'],
            'ledger'             => $ledger,
            'subtotalDebit'      => number_format($total_debit, 2, '.', ','),
            'subtotalCredit'     => number_format($total_credit, 2, '.', ','),
            'subtotalBalance'    => number_format($total_balance, 2, '.', ','),
            'links'              => '',
        );
        $chapterList = $CI->parser->parse('settings/person_ledger', $data, true);
        return $chapterList;
    }

    // personal loan details 
    public function person_loan_data($person_id) {
        $CI = & get_instance();
        $CI->load->model('Settings');
        $CI->load->library('occational');
        $person_details_all = $CI->Settings->person_list_personal_loan();
        $person_details     = $CI->Settings->select_loan_person_by_id($person_id);
        $ledger             = $CI->Settings->personal_loan_tradational($person_id);
        $balance            = 0;
        $total_credit       = 0;
        $total_debit        = 0;
        $total_balance      = 0;

        if (!empty($ledger)) {
            foreach ($ledger as $k => $v) {
                $ledger[$k]['balance'] = ($ledger[$k]['debit'] - $ledger[$k]['credit']) + $balance;
                $balance = $ledger[$k]['balance'];
                $ledger[$k]['date'] = $CI->occational->dateConvert($ledger[$k]['date']);
                $ledger[$k]['subtotalDebit']  = $total_debit + $ledger[$k]['debit'];
                $total_debit                  = $ledger[$k]['subtotalDebit'];
                $ledger[$k]['subtotalCredit'] = $total_credit + $ledger[$k]['credit'];
                $total_credit                 = $ledger[$k]['subtotalCredit'];
                $ledger[$k]['subtotalBalance']= $ledger[$k]['subtotalDebit'] - $ledger[$k]['subtotalCredit'];
                $total_balance                = $ledger[$k]['subtotalBalance'];
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'              => display('person_ledger'),
            'person_details_all' => $person_details_all,
            'person_details'     => $person_details,
            'person_id'          => $person_details[0]['person_id'],
            'person_name'        => $person_details[0]['person_name'],
            'person_phone'       => $person_details[0]['person_phone'],
            'person_address'     => $person_details[0]['person_address'],
            'currency'           => $currency_details[0]['currency'],
            'position'           => $currency_details[0]['currency_position'],
            'ledger'             => $ledger,
            'subtotalDebit'      => number_format($total_debit, 2, '.', ','),
            'subtotalCredit'     => number_format($total_credit, 2, '.', ','),
            'subtotalBalance'    => number_format($total_balance, 2, '.', ','),
            'links'              => '',
        );
        $chapterList = $CI->parser->parse('settings/person_loan_summary', $data, true);
        return $chapterList;
    }

    //Ledger search by date
    public function ledger_search_by_date($person_id, $from_date, $to_date) {

        $CI = & get_instance();
        $CI->load->model('Settings');
        $CI->load->library('occational');
        $person_details_all = $CI->Settings->person_list();
        $person_details     = $CI->Settings->select_person_by_id($person_id);
        $ledger = $CI->Settings->ledger_search_by_date($person_id,$from_date, $to_date);

        $balance = 0;
        $total_credit = 0;
        $total_debit = 0;
        $total_balance = 0;

        if (!empty($ledger)) {
            foreach ($ledger as $k => $v) {
                $ledger[$k]['balance'] = ($ledger[$k]['debit'] - $ledger[$k]['credit']) + $balance;
            $balance                       = $ledger[$k]['balance'];
            $ledger[$k]['date']      = $CI->occational->dateConvert($ledger[$k]['date']);
            $ledger[$k]['subtotalDebit']   = $total_debit + $ledger[$k]['debit'];
            $total_debit                   = $ledger[$k]['subtotalDebit'];
            $ledger[$k]['subtotalCredit']  = $total_credit + $ledger[$k]['credit'];
            $total_credit                  = $ledger[$k]['subtotalCredit'];
            $ledger[$k]['subtotalBalance'] = $total_balance + $ledger[$k]['balance'];
            $total_balance = $ledger[$k]['subtotalBalance'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'              => display('person_ledger'),
            'person_details'     => $person_details,
            'person_details_all' => $person_details_all,
            'person_id'          => $person_details[0]['person_id'],
            'person_name'        => $person_details[0]['person_name'],
            'person_phone'       => $person_details[0]['person_phone'],
            'person_address'     => $person_details[0]['person_address'],
            'currency'           => $currency_details[0]['currency'],
            'position'           => $currency_details[0]['currency_position'],
            'ledger'             => $ledger,
            'subtotalDebit'      => $total_debit,
            'subtotalCredit'     => $total_credit,
            'subtotalBalance'    => $total_balance,
            'links'              => '',
        );
        $chapterList = $CI->parser->parse('settings/person_ledger', $data, true);
        return $chapterList;
    }

    //person_loan_search_by_date search by date
    public function person_loan_search_by_date($person_id, $from_date, $to_date) {

        $CI = & get_instance();
        $CI->load->model('Settings');
        $CI->load->library('occational');
        $person_details_all = $CI->Settings->pesonal_loan_information();
        $person_details     = $CI->Settings->select_person_by_id($person_id);
        $ledger             = $CI->Settings->person_loan_search_by_date($person_id, $from_date, $to_date);
        $balance      = 0;
        $total_credit = 0;
        $total_debit  = 0;
        $total_balance= 0;

        if (!empty($ledger)) {
            foreach ($ledger as $k => $v) {
                $ledger[$k]['balance'] = ($ledger[$k]['debit'] - $ledger[$k]['credit']) + $balance;
            $balance = $ledger[$k]['balance'];
            $ledger[$k]['date'] = $CI->occational->dateConvert($ledger[$k]['date']);
            $ledger[$k]['subtotalDebit']   = $total_debit + $ledger[$k]['debit'];
            $total_debit                   = $ledger[$k]['subtotalDebit'];
            $ledger[$k]['subtotalCredit']  = $total_credit + $ledger[$k]['credit'];
            $total_credit                  = $ledger[$k]['subtotalCredit'];
            $ledger[$k]['subtotalBalance'] = $total_balance + $ledger[$k]['balance'];
            $total_balance = $ledger[$k]['subtotalBalance'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'              => display('person_ledger'),
            'person_details'     => $person_details,
            'person_details_all' => $person_details_all,
            'person_id'          => $person_details[0]['person_id'],
            'person_name'        => $person_details[0]['person_name'],
            'person_phone'       => $person_details[0]['person_phone'],
            'person_address'     => $person_details[0]['person_address'],
            'currency'           => $currency_details[0]['currency'],
            'position'           => $currency_details[0]['currency_position'],
            'ledger'             => $ledger,
            'subtotalDebit'      => $total_debit,
            'subtotalCredit'     => $total_credit,
            'subtotalBalance'    => $total_balance,
            'links'              => '',
        );
        $chapterList = $CI->parser->parse('settings/person_loan_summary', $data, true);
        return $chapterList;
    }

    #===============Bank list============#

    public function bank_list() {
        $CI = & get_instance();
        $CI->load->model('Settings');
        $CI->load->model('Web_settings');
        $bank_list = $CI->Settings->get_bank_list();

        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        if (!empty($bank_list)) {
            foreach ($bank_list as $index => $value) {
                $bb = $CI->Settings->bank_balance($value['bank_name']);
                 $bank_list[$index]['balance'] = (!empty($bb[0]['balance'])?$bb[0]['balance']:0);
            }
        }

        $i = 0;
        if (!empty($bank_list)) {
            foreach ($bank_list as $k => $v) {
                $i++;
                $bank_list[$k]['sl'] = $i;
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
               $get_bank_search = $CI->Settings->get_bank_search();
 
        
        
        $data = array(
            'title'     => display('bank_list'),
            'bank_list' => $bank_list,
            'currency'  => $currency_details[0]['currency'],
            'position'  => $currency_details[0]['currency_position'],
            'get_bank_search' => $get_bank_search,
                        'setting_detail' => $setting_detail


        );
        $bankList = $CI->parser->parse('settings/bank', $data, true);
        return $bankList;
    }








 public function list_ledger()
    {
        $CI = & get_instance();
        $CI->load->model('Settings');
        $CI->load->model('Web_settings');
        $bank_list = $CI->Settings->get_bank_list();
        $get_bank_search = $CI->Settings->get_bank_search();
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();


        if (!empty($bank_list)) {
            foreach ($bank_list as $index => $value) {
                $bb = $CI->Settings->bank_balance($value['bank_name']);
                 $bank_list[$index]['balance'] = (!empty($bb[0]['balance'])?$bb[0]['balance']:0);
            }
        }

        $i = 0;
        if (!empty($bank_list)) {
            foreach ($bank_list as $k => $v) {
                $i++;
                $bank_list[$k]['sl'] = $i;
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'     => display('bank_list'),
            'bank_list' => $bank_list,
            'currency'  => $currency_details[0]['currency'],
            'position'  => $currency_details[0]['currency_position'],
             'get_bank_search' => $get_bank_search,
             'setting_detail' => $setting_detail

            
            
        );
        $bankList = $CI->parser->parse('settings/ledger_list', $data, true);
        return $bankList;
    }












    #=============Bank show by id=======#

       public function bank_show_by_id($bank_id) {
        $CI = & get_instance();
        $CI->load->model('Settings');
        $CI->load->model('Web_settings');

        $bank_list = $CI->Settings->get_bank_by_id($bank_id);
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();



        $data = array(
            'title'     => display('bank_edit'),
            'bank_list' => $bank_list,
            'setting_detail' => $setting_detail

        );
        $bankList = $CI->parser->parse('settings/edit_bank', $data, true);
        return $bankList;
    }



    public function  transaction_show_by_id($VNo){

        $CI = & get_instance();
        $CI->load->model('Settings');
        $CI->load->model('Web_settings');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    
        $bank_list = $CI->Settings->get_bank_list();

        $edit_transaction_information = $CI->Settings->edit_transaction_information($VNo);

        $data = array(
            'title'     => display('bank_edit'),
            'bank_list' => $bank_list,

            'edit_transaction_information' => $edit_transaction_information,

            'currency'  => $currency_details[0]['currency'],
            

        );
        // print_r($edit_transaction_information); 

        $bankList = $CI->parser->parse('settings/edit_transaction', $data, true);
        return $bankList;
    }

    










    // Expense Edit Data
     public function expense_show_by_id($id)
    {
        $CI = & get_instance();
        $CI->load->model('Hrm_model');
        $CI->load->model('Web_settings');
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $currency =  $currency_details[0]['currency'];
        $expense_list = $CI->Hrm_model->get_expense_by_id($id);
          $person_list = $CI->Hrm_model->employee_list();
          $setting_detail = $CI->Web_settings->retrieve_setting_editdata();



          $data = array(
            'expense_list' => $expense_list,
            'currency' => $currency,
            'person_list' =>$person_list,
            'setting_detail' =>$setting_detail

        );
        // print_r($data);
        $expenseList = $CI->parser->parse('hr/edit_expense', $data, true);
        return $expenseList;
    }


    // Update Expense
    public function update_expense_id($id)
    {
        $CI = & get_instance();
        $CI->load->model('Hrm_model');
        $CI->load->model('Web_settings');
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $currency =  $currency_details[0]['currency'];
        $update_expense_list = $CI->Hrm_model->update_expense_id($id);
        return true;
    }

    #=============Bank Update by id=======#

    public function bank_update_by_id($bank_id) {
        $CI = & get_instance();
        $CI->load->model('Settings');
        $bank_list = $CI->Settings->bank_update_by_id($bank_id);
        // print_r($bank_list); die();
        return true;
    }
    #============bank ledger=============#

// public function bank_ledger($bank_id = null,$from= null,$to= null) {
//         // echo $bank_id; die();
//         $CI = & get_instance();
//         $CI->load->model('Settings');
//         $CI->load->model('Reports');
//         $CI->load->model('Web_settings');
//         $bank_list = $CI->Settings->get_bank_list();
//         $from_date = (!empty($from)?$from:date('Y-m-d'));
//         $to_date = (!empty($to)?$to:date('Y-m-d'));
//         $bank_info = $CI->Settings->bank_info($bank_id);
//         // print_r($bank_info); die();
//         // $ledger = $CI->Settings->bank_ledger($bank_info[0]['bank_name']);
//         $ledger = $CI->Settings->bank_ledger($bank_info[0]['bank_name'],$from_date,$to_date);
//         $total_ammount = 0;
//         $total_credit = 0;
//         $total_debit = 0;
//         $balance = 0;
//         $total_debit = 0;
//         $total_credit = 0;
//         if (!empty($ledger)) {
//             foreach ($ledger as $index => $value) {
//                     $ledger[$index]['debit'] = $ledger[$index]['Debit'];
//                     $total_debit += $ledger[$index]['debit'];
//                     $ledger[$index]['balance'] = $balance + ($ledger[$index]['Debit'] - $ledger[$index]['Credit']);
//                     $ledger[$index]['credit']  = $ledger[$index]['Credit'];
//                     $total_credit += $ledger[$index]['credit'];
//                      $balance = $ledger[$index]['balance'];
//             }
//         }
//         $currency_details = $CI->Web_settings->retrieve_setting_editdata();
//         $company_info         = $CI->Reports->retrieve_company();
//         $data = array(
//             'title'        => display('bank_ledger'),
//             'ledger'       => $ledger,
//             'bank_info'    => $bank_info,
//             'bank_list'    => $bank_list,
//             'total_credit' => number_format($total_credit, 2, '.', ','),
//             'total_debit'  => number_format($total_debit, 2, '.', ','),
//             'balance'      => number_format($balance, 2, '.', ','),
//             'currency'     => $currency_details[0]['currency'],
//             'position'     => $currency_details[0]['currency_position'],
//             'software_info'=> $currency_details,
//             'company'      => $company_info,
//         );
//         $bank_ledger = $CI->parser->parse('settings/bank_ledger', $data, true);
//         return $bank_ledger;
//     }
// //BANK LIST
//     public function get_bank_list() {
//         $this->db->select('*');
//         $this->db->from('bank_add');
//         $this->db->where('created_by',$this->session->userdata('user_id'));
//         $this->db->order_by('bank_name','asc');
//         $this->db->where('status', 1);
//         $query = $this->db->get();
//         if ($query->num_rows() > 0) {
//             return $query->result_array();
//         }
//         return false;
//     }


public function bank_ledger($bank_id = null,$from= null,$to= null) {
    $CI = & get_instance();
    $CI->load->model('Settings');
    $CI->load->model('Reports');
    $CI->load->model('Web_settings');
    $w = & get_instance();
    $w->load->model('Ppurchases');
    $CC = & get_instance();

    $CI->load->model('Web_settings');
    $CC->load->model('invoice_content');


    $bank_list = $CI->Settings->get_bank_list();
    $from_date = (!empty($from)?$from:date('Y-m-d'));
    $to_date = (!empty($to)?$to:date('Y-m-d'));
    $bank_info = $CI->Settings->bank_info($bank_id);
    $ledger = $CI->Settings->bank_ledger($bank_info[0]['bank_name'],$from_date,$to_date);
    $total_ammount = 0;
    $total_credit = 0;
    $total_debit = 0;
    $balance = 0;
    $total_debit = 0;
    $total_credit = 0;

    if (!empty($ledger)) {
        foreach ($ledger as $index => $value) {
                $ledger[$index]['debit'] = $ledger[$index]['Debit'];
                $total_debit += $ledger[$index]['debit'];

                $ledger[$index]['balance'] = $balance + ($ledger[$index]['Debit'] - $ledger[$index]['Credit']);
                $ledger[$index]['credit']  = $ledger[$index]['Credit'];
                $total_credit += $ledger[$index]['credit'];
                 $balance = $ledger[$index]['balance'];
          
        }
    }
    $datacontent = $CC->invoice_content->retrieve_data();
    $company_info = $w->Ppurchases->retrieve_company();

    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    // $company_info         = $CI->Reports->retrieve_company();
    $data = array(
        'title'        => display('bank_ledger'),
        'ledger'       => $ledger,
        'bank_info'    => $bank_info,
        'bank_list'    => $bank_list,
        'total_credit' => number_format($total_credit, 2, '.', ','),
        'total_debit'  => number_format($total_debit, 2, '.', ','),
        'balance'      => number_format($balance, 2, '.', ','),
        'currency'     => $currency_details[0]['currency'],
        'position'     => $currency_details[0]['currency_position'],
        'software_info'=> $currency_details,
        // 'company'      => $company_info,
        'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  

        'company'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
        'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
        'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
        // 'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:$company_info[0]['reg_number']),  
        'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
        'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),

    );
    $bank_ledger = $CI->parser->parse('settings/bank_ledger', $data, true);
    return $bank_ledger;
}
public function bank_led_view($bank_id = null,$date=null) {
    $CI = & get_instance();
    $CI->load->model('Settings');
    $CI->load->model('Reports');
    
    $CI->load->model('Web_settings');
    $w = & get_instance();
    $w->load->model('Ppurchases');
    $CC = & get_instance();

    $CI->load->model('Web_settings');
    $CC->load->model('invoice_content');
    $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

$bank_info_sales = $CI->Reports->bank_info_sales($bank_id,$date);
$bank_info_purchase = $CI->Reports->bank_info_purchase($bank_id,$date);
$bank_info_service = $CI->Reports->bank_info_service($bank_id,$date);
    $bank_list = $CI->Settings->get_bank_list();
$total_ammount = 0;
    $total_credit = 0;
    $total_debit = 0;
    $balance = 0;
    $total_debit = 0;
    $total_credit = 0;

    if (!empty($ledger)) {
        foreach ($ledger as $index => $value) {
                $ledger[$index]['debit'] = $ledger[$index]['Debit'];
                $total_debit += $ledger[$index]['debit'];

                $ledger[$index]['balance'] = $balance + ($ledger[$index]['Debit'] - $ledger[$index]['Credit']);
                $ledger[$index]['credit']  = $ledger[$index]['Credit'];
                $total_credit += $ledger[$index]['credit'];
                 $balance = $ledger[$index]['balance'];
          
        }
    }
    $datacontent = $CC->invoice_content->retrieve_data();
    $company_info = $w->Ppurchases->retrieve_company();

    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
     $data = array(
        'title'        => display('bank_ledger'),
      'bank_info_purchase'  =>$bank_info_purchase,
       'bank_info_sales' =>$bank_info_sales,
       'bank_info_service' =>$bank_info_service,
        'bank_list'    => $bank_list,
        'total_credit' => number_format($total_credit, 2, '.', ','),
        'total_debit'  => number_format($total_debit, 2, '.', ','),
        'balance'      => number_format($balance, 2, '.', ','),
        'currency'     => $currency_details[0]['currency'],
        'position'     => $currency_details[0]['currency_position'],
        'software_info'=> $currency_details,
        'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  

        'company'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
        'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
        'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
       'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
        'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),
        'setting_detail' => $setting_detail

    );
    // print_r($data);
    $bank_ledger = $CI->parser->parse('settings/bank_ledger', $data, true);
    return $bank_ledger;
}
}

?>