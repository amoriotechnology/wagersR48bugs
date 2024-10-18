<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Luser {









    //Login....
    public function edit_profile_form() {
        $CI = & get_instance();
        $CI->load->model('Users');
           $CI->load->model('Web_settings');

        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
        // print_r( $setting_detail); 
        $edit_data = $CI->Users->profile_edit_data();
 //echo $edit_data[0]['logo'];
        $data = array(
            'title'      => display('update_profile'),
            // 'first_name' =>  (!empty( $edit_data[0]['first_name'])? $setting_detail[0]['first_name']:''),
            // 'last_name'  => (!empty( $edit_data[0]['last_name'])? $setting_detail[0]['last_name']:''), 
            // 'gender'  => (!empty( $edit_data[0]['gender'])? $setting_detail[0]['gender']:''),   
            // 'date_of_birth'       => (!empty( $edit_data[0]['date_of_birth'])? $setting_detail[0]['date_of_birth']:''),  
             
            'first_name' =>  (!empty( $edit_data[0]['first_name'])? $edit_data[0]['first_name']:''),
            'last_name'  => (!empty( $edit_data[0]['last_name'])? $edit_data[0]['last_name']:''), 
            'gender'  => (!empty( $edit_data[0]['gender'])? $edit_data[0]['gender']:''),   
            'date_of_birth'       => (!empty( $edit_data[0]['date_of_birth'])? $edit_data[0]['date_of_birth']:''),  
          //  'logo'              => (!empty( $setting_detail[0]['logo'])? $setting_detail[0]['logo']:''), 


         //   'userlogo'              => (!empty( $edit_data[0]['logo'])? $edit_data[0]['logo']:''), 

             'edit_data'   =>$edit_data,
             'create_by '  =>$edit_data[0]['create_by'], 


             
        );
        // print_r( $data ); 

        $profile_data = $CI->parser->parse('user/edit_profile', $data, true);
        return $profile_data;
    }







}

?>