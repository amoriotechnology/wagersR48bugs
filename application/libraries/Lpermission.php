<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lpermission {

	public function permission_form(){


		$CI=& get_instance();
		$CI->load->model('Permission_model');

		$user_list=$CI->Permission_model->user_list();
		$account=$CI->Permission_model->permission_list();
		$data = array(
          'title'    => 'Create permission',
          'account'  => $account,
          'user_list'=> $user_list,
		);
		
		$account = $CI->parser->parse('permission/permission_form',$data,true);
		return $account;
	}
    public function  company_assign_role_form($admin_id){
        $CI=& get_instance();
        $CI->load->model('Permission_model');
        $CI->load->model('Companies');
        $super_role_list=$CI->Permission_model->super_role_list();
        $cl=$CI->Companies->company_list();
        $admin_info=$CI->Permission_model->company_admin_data($admin_id);
        $data = array(
          'title'     => 'Company assign role',
          'company_info'=>$cl,
          'super_role_list' => $super_role_list,
        );
        $account = $CI->parser->parse('permission/super_company_assignrole',$data,true);
        return $account;
    }
public function edit_company_role($id){
    $CI=& get_instance();
    $CI->load->model('Permission_model');
    $details_permission_list=$CI->Permission_model->details_permission_list();
    $details_list_info=  $CI->Permission_model->details_list_info($id);
    $role_edit_super=$CI->Permission_model->role_edit_super($id);
    $data = array(
          'details_permission_list' => $details_permission_list,
          'details_list_info'      =>$details_list_info,
          'crt'      =>$role_edit_super
    );
    $account = $CI->parser->parse('permission/edit_company_role_form',$data,true);
    return $account;
}
public function super_role_view(){
        $CI=& get_instance();
        $CI->load->model('Permission_model');
        $super_count = $CI->Permission_model->super_count();
        $super_user_list  = $CI->Permission_model->super_user_list();
          $account=$CI->Permission_model->superpermission_list();
        $data = array(
            'title'      => 'Role List',
            'super_count' => $super_count,
            'super_user_list'  => $super_user_list,
            'accounts' => $account,
        );
        $page = $CI->parser->parse('permission/super_role_list',$data,true);
        return $page;
    }

    public function assign_form(){

		$CI=& get_instance();
		$CI->load->model('Permission_model');
        $CI->load->model('Web_settings');

		$user=$CI->Permission_model->user();
		$user_list=$CI->Permission_model->user_list();
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();


		$data = array(
          'title'     => 'User assign role',
          'user'      => $user,
          'user_list' => $user_list,
          'setting_detail' => $setting_detail

		);
		$account = $CI->parser->parse('permission/assign_form',$data,true);
		return $account;
	}






	public function role_form(){

      
    }
    
    
    
    
    
    
     public function role_view(){
        $CI=& get_instance();
        $CI->load->model('Permission_model');
        $CI->load->model('Web_settings');

        $user_count = $CI->Permission_model->user_count();
        $user_list  = $CI->Permission_model->user_list();
          $account=$CI->Permission_model->permission_list();
          $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(
            'title'      => 'Role List',
            'user_count' => $user_count,
            'user_list'  => $user_list,
            'accounts' => $account,
            'setting_detail' => $setting_detail

        );
        $page = $CI->parser->parse('permission/role_view_form',$data,true);
        return $page;
    }
    
    
    
    
    
    
    public function roleinsert_user($data){
        $CI=& get_instance();
        $CI->load->model('Permission_model');

        $CI->Permission_model->insert_user_entry($data);
        return true;
    }

    public function user_edit_data($id){
        $CI =& get_instance();
        $CI->load->model('Permission_model');
        $category_detail = $CI->Permission_model->userdata_editdata($id);
        $role = $CI->Permission_model->role_edit($id);
     
        $data=array(
            'id' 			=> $category_detail[0]['id'],
            'type' 			=> $category_detail[0]['type'],
            'role'          =>$role,
        );
        $chapterList = $CI->parser->parse('permission/edit_role_form',$data,true);
        return $chapterList;
    }

     public function edit_role_data($id){

        $CI=& get_instance();
        $CI->load->model('Permission_model');
        $CI->load->model('Web_settings');

          $account=$CI->Permission_model->permission_list();
          $role_type=$CI->Permission_model->role_name($id);
          $ac=$CI->Permission_model->role_edit($id);
          $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
          $role_name=$CI->Permission_model->role_edit2($id);
      
        $data = array(
            'title'    => 'Create role name',
            'accounts' => $account,
             'role'      =>$ac,
            'name'      =>$role_name,
            'type'   =>$role_type,
            'setting_detail' => $setting_detail

        );
 
        $account = $CI->parser->parse('permission/edit_role_form',$data,true);
        // print_r($account);
        return $account;


    }
	
}