<?php
include 'config.php';
session_start();





 if(!isset($_FILES['image'])){
		
  $query='SELECT * from invoice_design where uid='.$_REQUEST['id'];
$sql=mysqli_query($con,$query);
$count= mysqli_num_rows($sql);


if($count<1)
{
	if($_REQUEST['input']=='header')
	{
		$query='insert  into invoice_design(header,uid) VALUES("'.$_REQUEST['value'].'","'.$_REQUEST['id'].'") ';


	}
	if($_REQUEST['input']=='color')
	{
		echo 	$query='insert  into invoice_design(color,uid) VALUES("'.$_REQUEST['value'].'","'.$_REQUEST['id'].'") ';
	}
}
else
{
	
	if($_REQUEST['input']=='header')
	{
		 $query='update invoice_design set header="'.$_REQUEST['value'].'" where uid='.$_REQUEST['id'];


	}
	if($_REQUEST['input']=='color')
	{
		 		 $query='update invoice_design set color="'.$_REQUEST['value'].'" where uid='.$_REQUEST['id'];
	}
}

$sql=mysqli_query($con,$query);
if($sql)
{
	echo 'Updated';
}

}
   if(isset($_FILES['image'])){
      $errors= array();
       $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
     
      $tmp = explode('.', $file_name);
$file_ext = end($tmp);
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/logo/".$file_name);
         $query='update invoice_design set logo="images/logo/'.$file_name.'" where uid='.$_REQUEST['id'];
       	$sql=mysqli_query($con,$query);
       	if($sql)
       	{
       		header("Location:http:/stockie/Cweb_setting/invoice_design"); 
       		echo 2;
       	}
      }else{
         print_r($errors);
      }
   }
   	
?>

