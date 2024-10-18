<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function check_valid_user($username, $password) {
        $password = md5("gef" . $password);
      
        $this->db->where(array('username' => $username, 'password' => $password, 'status' => 1));
        $query = $this->db->get('user_login');
     //   echo $this->db->last_query();
       
        $result = $query->result_array();
        if (count($result) == 1) {
            $user_id = $result[0]['user_id'];
            $this->db->select('*');
            $this->db->from('user_login');
         
            $this->db->where('user_id', $user_id);
              $this->db->where('status', '1');

          /*  $this->db->select('a.*,b.*');
            $this->db->from('user_login a');
            $this->db->join('users b', 'b.user_id = a.user_id');
            $this->db->where('a.user_id', $user_id);*/
            $query = $this->db->get();
           // echo $this->db->last_query();
            if ($query->num_rows() > 0) {

                return $query->result_array();
       //  die();
            }else{
                $this->db->select('*');
                $this->db->from('users');
             
                $this->db->where('user_id', $user_id);
                $query = $this->db->get();
              //  echo $this->db->last_query();
              //  die();
                return $query->result_array();

            }
        }
        return false;
    }
    
   public function user_data() {
        $id=$_SESSION['user_id'];

        $this->db->select('*');

        $this->db->from('user_login');

        $this->db->where('user_id', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }
    public function userPermissionadmin($id = null)
    {
        
        return $this->db->select("
            sub_module.directory, 
            role_permission.fk_module_id, 
            role_permission.create, 
            role_permission.price, 
            role_permission.update, 
            role_permission.delete
            ")
            ->from('role_permission')
            ->join('sub_module', 'sub_module.id = role_permission.fk_module_id', 'full')
            ->where('role_permission.role_id', $id)
            ->where('sub_module.status', 1)
            ->group_start()
                ->where('create', 1)
                ->or_where('price', 1)
                ->or_where('update', 1)
                ->or_where('delete', 1)
            ->group_end()
            ->get()
            ->result();
    }

    public function userPermission($id = null)
    {
        

        $userrole=$this->db->select('sec_userrole.*,sec_role.*')->from('sec_userrole')->join('sec_role','sec_userrole.roleid=sec_role.id')->where('sec_userrole.user_id',$id)->get()->result();

        $roleid = array();
        foreach ($userrole as $role) {
            $roleid[] =$role->roleid;
        }
    
        if(!empty($roleid)){
         return $result =  $this->db->select("

                    role_permission.fk_module_id, 
                    sub_module.directory,
                    IF(SUM(role_permission.create) >= 1,1,0) AS 'create', 
                    IF(SUM(role_permission.price) >= 1,1,0) AS 'price', 
                    IF(SUM(role_permission.update) >= 1,1,0) AS 'update', 
                    IF(SUM(role_permission.delete) >= 1,1,0) AS 'delete'
                ")
                ->from('role_permission')
                ->join('sub_module', 'sub_module.id = role_permission.fk_module_id', 'full')
                ->where_in('role_permission.role_id',$roleid)
                ->where('sub_module.status', 1)
                ->group_by('role_permission.fk_module_id')
                ->group_start()
                    ->where('create', 1)
                    ->or_where('price', 1)
                    ->or_where('update', 1)
                    ->or_where('delete', 1)
                ->group_end()
                
                ->get()
                ->result();
            }else{

            return $this->db->select("
            sub_module.directory, 
            role_permission.fk_module_id, 
            role_permission.create, 
            role_permission.price, 
            role_permission.update, 
            role_permission.delete
            ")
            ->from('role_permission')
            ->join('sub_module', 'sub_module.id = role_permission.fk_module_id', 0)
            ->where('role_permission.role_id', 0)
            ->where('sub_module.status', 1)
            ->group_start()
                ->where('create', 1)
                ->or_where('price', 1)
                ->or_where('update', 1)
                ->or_where('delete', 1)
            ->group_end()
            ->get()
            ->result();
            }
    }

public function insertToken($user_id)
    {   
       // echo "ID :".$user_id;
        $token = substr(sha1(rand()), 0, 30); 
        $date = date('Y-m-d');
        
        $string = array(
                'token'=> $token,
                'user_id'=>$user_id,
                'created'=>$date
            );
          
        $query = $this->db->insert('tokens',$string);

        $this->db->query($query);
     //   echo $this->db->last_query();die();
        return $token . $user_id;
        
    }
      public function getUserInfoByEmail($email)
    {
          $this->db->select('*');

        $this->db->from('user_login');

        $this->db->where('email_id', $email);

        $query = $this->db->get();
   //echo $this->db->last_query();die();
        if ($query->num_rows() > 0) {

            return $query->result_array();

        }else{
            error_log('no user found getUserInfo('.$email.')');
            return false;
        }

       


      
    }
    public function isTokenValid($token)
    {
       $tkn = substr($token,0,30);
       $uid = substr($token,30);      
       
        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn, 
            'tokens.user_id' => $uid), 1);                         
        //   echo $this->db->last_query();
   
        if($this->db->affected_rows() > 0){
            $row = $q->row();             
            
            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d'); 
            $todayTS = strtotime($today);
            
            if($createdTS != $todayTS){
                return false;
            }
            
            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
            
        }else{
            return false;
        }
        
    }    
    
    public function getUserInfo($id)
    {
        $q = $this->db->get_where('user_login', array('unique_id' => $id), 1);  
       
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }
    
      public function updatePassword($post)
    {   
        $this->db->where('unique_id', $post['unique_id']);
        $this->db->update('user_login', array('password' => $post['password'])); 
        $success = $this->db->affected_rows(); 
     
        if(!$success){
            error_log('Unable to updatePassword('.$post['unique_id'].')');
            return false;
        }        
        return true;
    } 
    /*
     * *User registration
     */

    public function user_registration() {
        $birth_day = $this->input->post('birth_day');
        $birth_month = $this->input->post('birth_month');
        $birth_year = $this->input->post('birth_year');
        $dbo = $birth_year . '-' . $birth_month . '-' . $birth_day;

        $data1 = array(
            'user_id' => null,
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'gender' => $this->input->post('user_sex'),
            'date_of_birth' => $dbo,
            'status' => 1
        );
        $this->db->insert('users', $data1);
        $insert_id = $this->db->insert_id();
        //Inset user Login table 

        $password = $this->input->post('password');
        $password = md5("ctgs" . $password);

        $data = array(
            'user_id' => 1,
            'username' => $this->input->post('username'),
            'password' => $password,
            'address' => $this->input->post('address'),
            'user_type' => 2,
            'security_code' => '',
            'status' => 0
        );
        $this->db->insert('user_login', $data);
    }

    public function profile_edit_data() {
        $unique_id = $this->session->userdata('unique_id');
        $this->db->select('a.*,b.*');
        $this->db->from('users a');
        $this->db->join('user_login b', 'b.unique_id = a.unique_id');
        $this->db->where('a.unique_id', $unique_id);
        $query = $this->db->get();
//echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    
    }

    //Update Profile
    
    
    
    public function profile_update() {
      //  $this->load->library('upload');
        if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = 'my-assets/image/logo/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;
 


            $this->load->library('upload', $config);

            // print_r( $config); die();


            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                // print_r($error); 
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                // redirect(base_url('Admin_dashboard/edit_profile'));
            } else {
            $data = $this->upload->data();  
            $logo = $config['upload_path'].$data['file_name']; 
            $config['image_library']  = 'gd2';
            $config['source_image']   = $logo;
            $config['create_thumb']   = false;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 200;
            $config['height']         = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $logo =  $logo;
           
            }
    
        }

        $old_logo = $this->input->post('old_logo');
        $user_id = $this->session->userdata('unique_id');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $gender = $this->input->post('gender');
        $dob = $this->input->post('dob');
        $new_logo = (!empty($logo) ? $logo : $old_logo);
        $user=$this->session->userdata('user_id');

    //    print_r($old_logo);   die();


if($this->session->userdata('u_type')==2){
  
     
     
     $this->db->set('logo',$new_logo)
         ->where('cid',$user)
               ->where('unique_id',$user_id)
        ->update('user_login');
        
        
      return   $this->db->query("UPDATE `users` AS `a`,`user_login` AS `b`,`web_setting` AS `c` SET `a`.`first_name` = '$first_name', `a`.`last_name` = '$last_name', `a`.`gender` = '$gender',`a`.`date_of_birth` = '$dob',`c`.`logo` = '$new_logo' WHERE `c`.`create_by` = '$user' AND `a`.`unique_id` = '$user_id' AND `a`.`unique_id` = `b`.`unique_id`");
    

    }else{
          $this->db->set('logo',$new_logo)
         ->where('cid',$user)
               ->where('unique_id',$user_id)
        ->update('user_login');
           
          return $this->db->query("UPDATE `users` AS `a`,`user_login` AS `b`,`users` AS `c` SET `a`.`first_name` = '$first_name', `a`.`last_name` = '$last_name', `a`.`gender` = '$gender',`a`.`date_of_birth` = '$dob',`c`.`userlogo` = '$new_logo' WHERE `c`.`create_by` = '$user' AND `a`.`unique_id` = '$user_id' AND `a`.`unique_id` = `b`.`unique_id`"); 

    

}
    
    
    
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    //Change Password
    public function change_password($email, $old_password, $new_password) {
        $user_name = md5("gef" . $new_password);
        $password = md5("gef" . $old_password);
        $this->db->where(array('username' => $email, 'password' => $password, 'status' => 1));
        $query = $this->db->get('user_login');
        $result = $query->result_array();

        if (count($result) == 1) {
            $this->db->set('password', $user_name);
            $this->db->where('password', $password);
            $this->db->where('username', $email);
            $this->db->update('user_login');

            return true;
        }
        return false;
    }

}
