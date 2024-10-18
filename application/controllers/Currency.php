<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Currency extends CI_Controller {

    public $menu;

    function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('session');
        $this->load->model('Settings');
        $this->auth->check_admin_auth();
        $this->template->current_menu = 'web_setting';
    }


    public function index() {

        $CI = & get_instance();

        $CI->load->model('Web_settings');

        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

    $data['title'] = display('currency_list');

     $data['setting_detail'] = $setting_detail;


    $data['list'] = $this->Settings->currencylist();
    $content = $this->parser->parse('settings/currency_list', $data, true);
    $this->template->full_admin_html_view($content); 
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    // Add Currency
    public function currency_form($id = null){
        
        
          $CI = & get_instance();

        $CI->load->model('Web_settings');

        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
        
        if(!empty($id)){
            $data['title'] = 'Currency Update';
        }else{
             $data['title'] = 'Add Currency';
        }
    $data['cuerrencyinfo'] = $this->Settings->currencyinfo($id);
    
        $data['setting_detail'] = $setting_detail;

    
    $content = $this->parser->parse('settings/currency_form', $data, true);
    $this->template->full_admin_html_view($content); 
    }
    public function submit_currency(){
    $data =[
   'id'            => $this->input->post('id',true),
   'currency_name' => $this->input->post('currency_name',true),
   'icon'          => $this->input->post('currency_icon',true),
    ];
    if(!empty($this->input->post('id'))){
         $this->db->where('id',$this->input->post('id'))
         ->update('currency_tbl',$data);
          $this->session->set_userdata(array('message' => display('successfully_updated')));
          redirect("Currency");
    }else{
        $this->db->insert('currency_tbl',$data);
         $this->session->set_userdata(array('message' => display('successfully_inserted')));
         redirect("Currency");
    }

    }

}
