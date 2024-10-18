<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Web_settings extends CI_Model {



    private $table = "language";

    private $phrase = "phrase";



    public function __construct() {

        parent::__construct();

    }
     public function save_notifications($menu, $select_dates, $statuses, $select_sources, $emails, $companies, $unique_id, $user_id) {
        $existing_notifications = $this->db->get_where('notification', array('unique_id' => $unique_id))->result_array();
  if (!empty($existing_notifications)) {
            foreach ($existing_notifications as $notification) {
                if (in_array($notification['menu'], $menu)) {
                    $this->db->delete('notification', array('id' => $notification['id']));
                }
            }
        }
    $notifications = array();
        for ($i = 0; $i < count($menu); $i++) {
            if ($select_sources[$i] != 'Select Preferred Source') {
                $data = array(
                    'menu' => $menu[$i],
                  
                    'unique_id' => $unique_id,
                    'notification_time' => $select_dates[$i], 
                    'notification_source' => $select_sources[$i],
                    'created_by' => $user_id, 
                   
                );

              
                $notifications[] = $data;
            }
        }

      
        if (!empty($notifications)) {
            $this->db->insert_batch('notification', $notifications);
        }
 return true; 
    }
    public function Fetchemailattachment($id = null)
    {
        $this->db->select('*');
        $this->db->from('email_data');
        $this->db->where('id', $id);
        $this->db->where('created_by', $this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function searchAllData($postData = null)
    {
        $this->db->select('ws.*, pi.*, ci.*');
        $this->db->from('web_setting ws');
        $this->db->join('product_information pi', 'ws.create_by = pi.created_by', 'left');
        $this->db->join('company_information ci', 'ci.company_id = pi.created_by', 'left');
        $this->db->where('ws.agree_share', 'Yes');
        $this->db->like('pi.product_name', $postData);
        $query = $this->db->get();
// echo $this->db->last_query(); die();
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }
   public function get_info_data($postData)
    {
        $this->db->select('ws.*, pi.*, ci.*');
        $this->db->from('web_setting ws');
        $this->db->join('product_information pi', 'ws.create_by = pi.created_by', 'left');
        $this->db->join('company_information ci', 'ci.company_id = pi.created_by', 'left');
        $this->db->where('ws.agree_share', 'Yes');
        $this->db->like('pi.product_name', $postData);
        $query = $this->db->get();
        // echo $this->db->last_query(); die();
        if (!$query) {
            $error = $this->db->error();
            log_message('error', 'Database error: ' . $error['message']);
            return false;
        }
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function retrieve_agentcheck()
    {
        $this->db->select('i.*, a.*');
        $this->db->from('invoice i');
        $this->db->join('agent a', 'a.agent_name=i.user_emp_id');
        $this->db->where('i.sales_by', $this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function retrieve_agentviewcheck($id = null)
    {
        $this->db->select('i.*, a.*');
        $this->db->from('invoice i');
        $this->db->join('agent a', 'a.agent_name=i.user_emp_id');
        $this->db->where('a.id', $id);
        $this->db->where('i.sales_by', $this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function getemailConfig()
    {
        $this->db->select('*');
        $this->db->from('email_config');
        $this->db->where('created_by', $this->session->userdata('user_id'));
        $query = $this->db->get();
      //  echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    
    
    public function get_employee_data() {
        $this->db->select('*');
        $this->db->from('employee_history');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function insertDateforScheduleStatus()
    {
        $this->db->select('*');

        $this->db->from('schedule_list');

        $this->db->where('schedule_status', 1);

        $this->db->where('created_by', $this->session->userdata('user_id'));
        
        // date_default_timezone_set('Asia/Kolkata');

        // $this->db->where('end >=', date('Y-m-d H:i:s'));

        $query = $this->db->get();
        
        // echo $this->db->last_query(); die();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    
    public function insertDateforSchedule()
    {
        $this->db->select('id, title, description, start, end');

        $this->db->from('schedule_list');

        $this->db->where('created_by', $this->session->userdata('user_id'));

        $query = $this->db->get();

        // echo $this->db->last_query(); die();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
       public function get_email_scheduled(){
            $todayDate = date('Y-m-d');
        $this->db->select('id, title, description, start, end,invoice_no');

        $this->db->from('schedule_list');
       $this->db->where('source', 'EMAIL');
        $this->db->where('start', $todayDate);
        $this->db->where('created_by', $this->session->userdata('user_id'));

        $query = $this->db->get();
      
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function getDataForTodayEmailSchedule()
    {
        $this->db->select('*');

        $this->db->from('company_information');

      

        $this->db->where('company_id', $this->session->userdata('user_id'));

        $query = $this->db->get();

        // echo $this->db->last_query(); die();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }



    // Cron Jobs Time for Sale Today date
    
    public function getDataForToday($selectedStatus)
    {   
        if($selectedStatus === 'NewSaleETD'){

            $this->db->select('*');

            $this->db->from('invoice');

            $this->db->where('sales_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'NewSaleETA'){
            
            $this->db->select('*');

            $this->db->from('invoice');

            $this->db->where('sales_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'NewSalePAYMENTDUEDATE'){
            
            $this->db->select('*');

            $this->db->from('invoice');

            $this->db->where('sales_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'OceanexporttrackingETD'){
            
            $this->db->select('*');

            $this->db->from('ocean_export_tracking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'OceanexporttrackingETA'){

            $this->db->select('*');

            $this->db->from('ocean_export_tracking');

            $this->db->where('create_by', $this->session->userdata('user_id')); 

        }else if($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE'){

            $this->db->select('*');

            $this->db->from('sale_trucking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'TRUCKINGDELIVERYDATE'){
            
            $this->db->select('*');

            $this->db->from('sale_trucking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }

        $query = $this->db->get();

        // echo $this->db->last_query(); die();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    // Cron Jobs Time for Sale -1 days
    
    public function getDataForyesterday($selectedStatus)
    {
        if($selectedStatus === 'NewSaleETD'){
        
        $this->db->select('*');

        $this->db->from('invoice');

        $this->db->where('sales_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'NewSaleETA'){

        $this->db->select('*');

        $this->db->from('invoice');

       

        $this->db->where('sales_by', $this->session->userdata('user_id'));    
            

        }else if($selectedStatus === 'NewSalePAYMENTDUEDATE'){

        $this->db->select('*');

        $this->db->from('invoice');

        $this->db->where('sales_by', $this->session->userdata('user_id'));    
            

        }else if($selectedStatus === 'OceanexporttrackingETD'){

        $this->db->select('*');

        $this->db->from('ocean_export_tracking');

        $this->db->where('create_by', $this->session->userdata('user_id'));    
            

        }else if($selectedStatus === 'OceanexporttrackingETA'){

        $this->db->select('*');

        $this->db->from('ocean_export_tracking');


        $this->db->where('create_by', $this->session->userdata('user_id'));    
 

        }else if($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE'){

        $this->db->select('*');

        $this->db->from('sale_trucking');


        $this->db->where('create_by', $this->session->userdata('user_id'));    


        }else if($selectedStatus === 'TRUCKINGDELIVERYDATE'){
            
        $this->db->select('*');

        $this->db->from('sale_trucking');

        $this->db->where('create_by', $this->session->userdata('user_id'));    

        }


        $query = $this->db->get();

        // echo $this->db->last_query(); die();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    // Cron Jobs Time for Sale -3 days
    
    public function getDataForThreedaysAgo($selectedStatus)
    {
        if($selectedStatus === 'NewSaleETD'){
        
        $this->db->select('*');

        $this->db->from('invoice');

        $this->db->where('sales_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'NewSaleETA'){

        $this->db->select('*');

        $this->db->from('invoice');

        $this->db->where('sales_by', $this->session->userdata('user_id'));
            

        }else if($selectedStatus === 'NewSalePAYMENTDUEDATE'){

        $this->db->select('*');

        $this->db->from('invoice');

        $this->db->where('sales_by', $this->session->userdata('user_id'));
            

        }else if($selectedStatus === 'OceanexporttrackingETD'){

        $this->db->select('*');

        $this->db->from('ocean_export_tracking');

        $this->db->where('create_by', $this->session->userdata('user_id'));    
            

        }else if($selectedStatus === 'OceanexporttrackingETA'){

        $this->db->select('*');

        $this->db->from('ocean_export_tracking');

        $this->db->where('create_by', $this->session->userdata('user_id'));    


        }else if($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE'){

        $this->db->select('*');

        $this->db->from('sale_trucking');

        $this->db->where('create_by', $this->session->userdata('user_id'));    


        }else if($selectedStatus === 'TRUCKINGDELIVERYDATE'){
            
        $this->db->select('*');

        $this->db->from('sale_trucking');

        $this->db->where('create_by', $this->session->userdata('user_id')); 

        }


        $query = $this->db->get();

        // echo $this->db->last_query(); die();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    

    // Cron Jobs Time for Sale -7 days
    
    public function getDataForSevendaysAgo($selectedStatus)
    {   

        if($selectedStatus === 'NewSaleETD'){

            $this->db->select('*');

            $this->db->from('invoice');

            $this->db->where('sales_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'NewSaleETA'){

            $this->db->select('*');

            $this->db->from('invoice');

            $this->db->where('eta', $sevenDaysAgo);

            $this->db->where('sales_by', $this->session->userdata('user_id'));
            

        }else if($selectedStatus === 'NewSalePAYMENTDUEDATE'){

            $this->db->select('*');

            $this->db->from('invoice');

            $this->db->where('sales_by', $this->session->userdata('user_id'));
            

        }else if($selectedStatus === 'OceanexporttrackingETD'){

            $this->db->select('*');

            $this->db->from('ocean_export_tracking');

            $this->db->where('create_by', $this->session->userdata('user_id'));
            
    
        }else if($selectedStatus === 'OceanexporttrackingETA'){

            $this->db->select('*');

            $this->db->from('ocean_export_tracking');

            $this->db->where('create_by', $this->session->userdata('user_id'));


        }else if($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE'){

            $this->db->select('*');

            $this->db->from('sale_trucking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        
        }else if($selectedStatus === 'TRUCKINGDELIVERYDATE'){
            
            $this->db->select('*');

            $this->db->from('sale_trucking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }

        $query = $this->db->get();

        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }




    // Expense Alerts DAta
    
    public function getDataForExpenseToday($selectedStatus)
    {
        if($selectedStatus === 'PaymentDuedate'){

            $this->db->select('*');

            $this->db->from('product_purchase');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'Estshipmentdate'){

            $this->db->select('*');

            $this->db->from('product_purchase');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'oceanimportETA'){

            $this->db->select('*');

            $this->db->from('ocean_import_tracking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'oceanimportETD'){

            $this->db->select('*');

            $this->db->from('ocean_import_tracking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'ContainerGoodspickupdate'){

            $this->db->select('*');

            $this->db->from('expense_trucking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'DELIVERYDATE'){

            $this->db->select('*');

            $this->db->from('expense_trucking');

            $this->db->where('create_by', $this->session->userdata('user_id'));
        }

        $query = $this->db->get();

        // echo $this->db->last_query(); die();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }


    // Cron Jobs Time for Sale -1 days
    
    public function getDataForExpenseyesterday($selectedStatus)
    {
        
        if($selectedStatus === 'PaymentDuedate'){

            $this->db->select('*');

            $this->db->from('product_purchase');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'Estshipmentdate'){

            $this->db->select('*');

            $this->db->from('product_purchase');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'oceanimportETA'){

            $this->db->select('*');

            $this->db->from('ocean_import_tracking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'oceanimportETD'){

            $this->db->select('*');

            $this->db->from('ocean_import_tracking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'ContainerGoodspickupdate'){

            $this->db->select('*');

            $this->db->from('expense_trucking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'DELIVERYDATE'){

            $this->db->select('*');

            $this->db->from('expense_trucking');

            $this->db->where('create_by', $this->session->userdata('user_id'));
        }


        $query = $this->db->get();

        // echo $this->db->last_query(); die();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    // Cron Jobs Time for Sale -3 days
    
    public function getDataForExpenseThreedaysAgo($selectedStatus)
    {
        
        if($selectedStatus === 'PaymentDuedate'){

            $this->db->select('*');

            $this->db->from('product_purchase');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'Estshipmentdate'){

            $this->db->select('*');

            $this->db->from('product_purchase');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'oceanimportETA'){

            $this->db->select('*');

            $this->db->from('ocean_import_tracking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'oceanimportETD'){

            $this->db->select('*');

            $this->db->from('ocean_import_tracking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'ContainerGoodspickupdate'){

            $this->db->select('*');

            $this->db->from('expense_trucking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'DELIVERYDATE'){

            $this->db->select('*');

            $this->db->from('expense_trucking');

            $this->db->where('create_by', $this->session->userdata('user_id'));
        }


        $query = $this->db->get();

        // echo $this->db->last_query(); die();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    

    // Cron Jobs Time for Sale -7 days
    
    public function getDataForExpenseSevendaysAgo($selectedStatus)
    {   

        if($selectedStatus === 'PaymentDuedate'){

            $this->db->select('*');

            $this->db->from('product_purchase');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'Estshipmentdate'){

            $this->db->select('*');

            $this->db->from('product_purchase');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'oceanimportETA'){

            $this->db->select('*');

            $this->db->from('ocean_import_tracking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'oceanimportETD'){

            $this->db->select('*');

            $this->db->from('ocean_import_tracking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'ContainerGoodspickupdate'){

            $this->db->select('*');

            $this->db->from('expense_trucking');

            $this->db->where('create_by', $this->session->userdata('user_id'));

        }else if($selectedStatus === 'DELIVERYDATE'){

            $this->db->select('*');

            $this->db->from('expense_trucking');

            $this->db->where('create_by', $this->session->userdata('user_id'));
        }

        $query = $this->db->get();

        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }


    public function getScheduleData()
    {
        $this->db->select('*');

        $this->db->from('scheduling');

        $this->db->where('created_by', $this->session->userdata('user_id'));

        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    
    
    public function sentemailretrieve_data()
    {
        $this->db->select('*');

        $this->db->from('email_data');

        $this->db->where('is_deleted', 0);

        $this->db->where('created_by', $this->session->userdata('user_id'));

        // $this->db->order_by('id', 'desc');

        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }


    
    public function inboxretrieve_data()
   {
        $this->db->select('*');

        $this->db->from('email_inbox');
        
        $this->db->where('is_deletedinbox', 0);

        $this->db->where('created_by', $this->session->userdata('user_id'));

        $this->db->order_by('id', 'desc');

        $query = $this->db->get();
        // echo $this->db->last_query(); die();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
   }
   
   
    public function deleteemailretrieve_data()
    {
        $this->db->select('*');

        $this->db->from('email_data');

        $this->db->where('is_deleted', 1);

        $this->db->where('created_by', $this->session->userdata('user_id'));

        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    
    public function deleteInboxemailretrieve_data()
    {
        $this->db->select('*');

        $this->db->from('email_inbox');

        $this->db->where('is_deletedinbox', 1);

        $this->db->where('created_by', $this->session->userdata('user_id'));

        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
   
   
   public function getInboxmessagedata($msg_id = null)
   {
        $this->db->select('*');

        $this->db->from('email_inbox');

        $this->db->where('id', $msg_id);

        $this->db->where('created_by', $this->session->userdata('user_id'));

        $query = $this->db->get();
        
        // echo $this->db->last_query(); die();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
   }
   
  public function usersretrieve_data()
   {
        $this->db->select('*');
        $this->db->from('email_config');
        $this->db->where('created_by', $this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
   }


    public function update_invoice(){
        $this->db->select('*');
        $this->db->from('sales_invoice_settings');

        $this->db->where('invoice_template', 'sales&Profarma');

        $this->db->where('create_by',$_SESSION['user_id']);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;

    }




       

    public function ocean_remarks(){

    $this->db->select('*');
    $this->db->from('sales_invoice_settings');
    
    $this->db->where('invoice_template', 'oet');
    $this->db->where('create_by',$this->session->userdata('user_id'));

    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result();
    }
    return false;

}







public function roadtransport_remarks(){

    $this->db->select('*');
    $this->db->from('sales_invoice_settings');
    
    $this->db->where('invoice_template', 'truck');
    $this->db->where('create_by',$this->session->userdata('user_id'));

    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result();
    }
    return false;

}




    public function retrieve_companysetting_editdata() {

        $this->db->select('*');

        $this->db->from('company_information');

        $this->db->where('company_id',$this->session->userdata('user_id'));

        $query = $this->db->get();

        // echo $this->db->last_query(); die();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }
    
    
    
    public function retrieve_companyall_data()
    {
        $this->db->select('*');
        $this->db->from('company_information');
        $this->db->where('company_id', $this->session->userdata('user_id'));
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }



   public function retrieve_setting_editdata() {

        $this->db->select('*');

        $this->db->from('web_setting');

      //  $this->db->where('setting_id',1);
          $this->db->where('create_by',$this->session->userdata('user_id'));

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }
















    public function retrieve_user_data() {

        $this->db->select('*');

        $this->db->from('users');

      //  $this->db->where('setting_id',1);
          $this->db->where('create_by',$_SESSION['user_id']);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }






    public function retrieve_admin_data() {

        $this->db->select('*');

        $this->db->from('users');

      //  $this->db->where('setting_id',1);
          $this->db->where('unique_id',$_SESSION['unique_id']);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }







    // Email Invoice Setting
    public function retrieve_email_setting() {

        $uid=$_SESSION['user_id'];
        $this->db->select('*');

        $this->db->from('invoice_email');

        $this->db->where('uid',$uid);

        $query = $this->db->get();
       
        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        // return false;

    }


       public function retrieve_setting_new_sale_invoice() {

        $this->db->select('*');

        $this->db->from('sales_invoice_settings');

        $this->db->where('invoice_template', 'new_sale');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }




    //Update Categories

    public function update_setting($data) {
        $this->db->select('*' );
        $this->db->from('web_setting');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        // echo $this->db->last_query(); die();
        if ($query->num_rows() > 0) {
        $this->db->where('create_by', $this->session->userdata('user_id'));
        $this->db->update('web_setting', $data);

       }else{
          $this->db->insert('web_setting', $data);
       }

    }
    public function admin_company() {
        $this->db->select('company_name' );
         $this->db->from('company_information');
       $this->db->where('company_id',$this->session->userdata('user_id'));
       $query = $this->db->get();
        if ($query->num_rows() > 0) {
         return $query->result_array();
         }
     }
    
    public function admin_user_mail_ids($company) {
        $this->db->select('*');
        $this->db->from('company_information');
        $this->db->where('company_name',$company);
        $this->db->where('company_id',$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

    }
    public function invoice_desgn() {
        $purchase_id = date('YmdHis');
      
        $mysqltime = date ('Y-m-d H:i:s');

          
    $this->db->select("*");
    $this->db->from('invoice_design');
    $this->db->where('uid', $_POST['uid'] );
    $query = $this->db->get();
 
if ($query->num_rows() > 0 )
    {
        if($fomdata['input']=='header')
        {
            $data = array(
                'header' => $_POST['value'],
                'uid' => $_POST['id'],
               
                );
                $this->db->insert('invoice_design', $data);

        }
        if($_REQUEST['input']=='color')
        {
            $data = array(
                'color' => $_POST['value'],
                'uid' => $_POST['uid'],
               
                );
                $this->db->insert('invoice_design', $data);
           
        }
    }
    else{
        if($fomdata['input']=='header')
        {
            $data = array(
                'header' => $_POST['value']
                );
                $this->db->where('uid', $_POST['uid']);
              
                $this->db->update('invoice_design',$data);

         

        }
        if($_REQUEST['input']=='color')
        {
            $data = array(
                'color' => $_POST['value']
                );
                $this->db->where('uid', $_POST['uid']);
              
                $this->db->update('invoice_design',$data);

          

        }
    }
    return true;
    }
  
    

        





    public function update_invoice_set() {
        $purchase_id = date('YmdHis');
        $fomdata=$this->input->post();
        $mysqltime = date ('Y-m-d H:i:s');
        if($fomdata['form_type']=='sales&Profarma'   ){
    $this->db->select("*");
    $this->db->from('sales_invoice_settings');
    $this->db->where('user_id', $fomdata['uid'] );
    $this->db->where('invoice_template', $fomdata['form_type'] );
    $query = $this->db->get();
//    echo $this->db->last_query();
    if ( $query->num_rows() > 0 )
    {
      //  $row = $query->row_array();
      //  return $row;
      $data = array(
        'Time' => $mysqltime,
        'account' => $fomdata['acc'],
        'remarks'  => $fomdata['remarks'],
        'create_by'       =>  $this->session->userdata('user_id'),
        );
    //   print_r($data);
        $this->db->where('user_id', $fomdata['uid']);
        $this->db->where('invoice_template',$fomdata['form_type']);
        $this->db->update('sales_invoice_settings',$data);
    }else{
        $data = array(
            'user_id' => $fomdata['uid'],
            'invoice_template' => $fomdata['form_type'],
            'account'  =>  $fomdata['acc'],
            'remarks'  => $fomdata['remarks'],
            'Time'  => $mysqltime,
            'create_by'       =>  $this->session->userdata('user_id'),
            );
        //remarks print_r($data);
            $this->db->insert('sales_invoice_settings', $data);
    }
}else///remarks
{
    $this->db->select('*');
    $this->db->from('sales_invoice_settings');
    $this->db->where('user_id', $fomdata['uid'] );
    $this->db->where('invoice_template', $fomdata['form_type'] );
    $query = $this->db->get();
    // echo $this->db->last_query();
    if ( $query->num_rows() > 0 )
    {
        $data = array(
            'Time' => $mysqltime,
            'remarks' => $fomdata['remarks'],
            'create_by'       =>  $this->session->userdata('user_id'),
            );
            //  print_r($data);die();
            $this->db->where('user_id', $fomdata['uid']);
            $this->db->where('invoice_template',$fomdata['form_type']);
            $this->db->update('sales_invoice_settings',$data);
//////////Update
}
else
{
    $data = array(
        'user_id' => $fomdata['uid'],
        'invoice_template' => $fomdata['form_type'],
        'remarks'  => $fomdata['remarks'],
        'Time'  => $mysqltime,
        'create_by'       =>  $this->session->userdata('user_id'),

    );
        // print_r($data); die();
       $this->db->insert('sales_invoice_settings', $data);
    //    echo $this->db->last_query();die();

}
}
        return true;
    }
















    public function update_invoice_setting($data) {

        $this->db->insert('invoice_settings', $data);

        return true;

    }







    //Update user setting
    public function update_user_setting($user_id,$data) {

        $this->db->where('user_id', $user_id);

        $this->db->update('users', $data);

        // echo $this ->db ->last_query();
        return true;

    }
    
    public function update_userlogin_setting($user_id,$data) {

        $this->db->where('user_id', $user_id);

        $this->db->update('user_login', $data);

        // echo $this ->db ->last_query();
        return true;

    }

    public function get_userlogin_setting($user_id)
    {
         $this->db->where('user_id', $user_id);

        $query = $this->db->get('user_login');
        // echo $this ->db ->last_query(); 

        return $query->row_array();
    }



    public function get_user_setting($user_id)
    {
         $this->db->where('user_id', $user_id);

        $query = $this->db->get('users');
        // echo $this ->db ->last_query(); 

        return $query->row_array();
    }






    
    public function app_settingsdata(){

        return $result = $this->db->select('*')

                        ->from('app_setting')

                        ->get()

                        ->result_array();

    }



    public function languages() {

        if ($this->db->table_exists($this->table)) {



            $fields = $this->db->field_data($this->table);



            $i = 1;

            foreach ($fields as $field) {

                if ($i++ > 2)

                    $result[$field->name] = ucfirst($field->name);

            }



            if (!empty($result))

                return $result;

        } else {

            return false;

        }

    }



    // currency list

    public function currency_list(){

        $this->db->select('*');

        $this->db->from('currency_tbl');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result();

        }

        return false;

    }

    // Bank list

     public function bank_list() {

        $this->db->select('*');

        $this->db->from('bank_add');

        $this->db->where('created_by',$this->session->userdata('user_id'));

        $query = $this->db->get();

            // echo $this->db->last_query(); die();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



}

