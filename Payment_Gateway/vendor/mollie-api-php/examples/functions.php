<?php

namespace _PhpScoper5f636c07d0f55;



function database_write($orderId,$status)
{
    $orderId = \intval($orderId);
    $database = FCPATH . "assets\order-{$orderId}.txt";
 //  $wrt=$description." ".$total_price." ".$status;
   \file_put_contents($database, $status);
    
       // $this->db->where('id', '$id');
      //  $this->db->update('payment', 'status');
  //    UPDATE payment SET status = 'Paid' where order_id=1663766338/Paid
    
    //  $result=mysqli_query($con,$sql);
}

function database_read($orderId)
{
    $orderId = \intval($orderId);
    $database = FCPATH . "assets\order-{$orderId}.txt";
    $status = @\file_get_contents($database);
    return $status ? $status : "unk order";
}