<?php
class Payment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function update_status($orderID,$status){
        $update = array(
            'status' => $status,
           
           
            );
           $this->db->set($update);
           $this->db->where('order_id', $orderID);
           $this->db->update('payment');
       
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
}
?>