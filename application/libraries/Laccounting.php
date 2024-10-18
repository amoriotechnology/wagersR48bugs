<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laccounting {

    public function coa_form() {

         $CI = & get_instance();
         $CI->load->model('Accounts_model');
         $data['title'] = 'Chart of Account';

        $account = $CI->parser->parse('newaccount/coa',$data,true);
        return $account;
    }
    public function tableview_form($date = null) {
    $CI = &get_instance();
    $CI->load->model('Accounts_model');
    $CI->load->model('Web_settings');
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data['results']    =  $CI->Accounts_model->invoice_paid_amount($date);
    $data['purchase_paid_amount']    =  $CI->Accounts_model->purchase_paid_amount($date);
    $data['provider_paid_amount']    =  $CI->Accounts_model->provider_paid_amount($date);
    
    
    
    $data['title'] = display('accounts_form');
    if($date) {
    $split=explode(' to ',$date);
    $start =  $split[0];
    $end = $split[1];
    }
    $invoice_data = $CI->Accounts_model->get_dataof_invoice($date);
    $expense_data = $CI->Accounts_model->get_dataof_expense($date);
    $service_data = $CI->Accounts_model->get_dataof_service($date);
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

    // print_r($service_data);
    $data = array(
    'currency' =>$currency_details[0]['currency'],
    'invoice_data' => $invoice_data,
    'expense_data' => $expense_data,
    'services_data' => $service_data,
    'start' =>  (!empty($start)?$start:0),
    'end' =>  (!empty($end)?$end:0),
        'setting_detail' => $setting_detail

    );
    $treeinfo = $CI->parser->parse('newaccount/account_list', $data, true);
    return $treeinfo;
    }

    public function treeview_form($id=null){
         $CI = & get_instance();
         $CI->load->model('Accounts_model');
           $data['title'] = display('accounts_form');
           $id            = ($id ?$id :2);
           $data['id']    = ($id ?$id :2);

        $data = array(
            'userList' => $CI->Accounts_model->get_userlist(),
            'userID'   => set_value('userID'),
        );

        $treeinfo = $CI->parser->parse('newaccount/treeview',$data,true);
        return $treeinfo;

    }
}

?>