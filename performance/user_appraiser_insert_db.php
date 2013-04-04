<?php
include "./includes/config.php";
/*echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
exit;*/

$msg = 0;

if(isset($_REQUEST['form_sub']) and $_REQUEST['form_sub']  == 1){
	if(isset($_REQUEST['appraiser_user']) and $_REQUEST['appraiser_user']  != ''){
		  if(isset($_REQUEST['staff_nm']) and $_REQUEST['staff_nm']  != ''){
			 $update = "UPDATE staff SET appraiser = '".$_REQUEST['appraiser_user']."' WHERE id = ".$_REQUEST['staff_nm'];
			 $res = mysql_query($update);
			 $msg = 1;      
		  } else {
			 echo 'error';
			 exit;
		  } 
	} else {
		echo 'error';
	    exit;
	}
}

$data_last = '';
$data = '';
$sql = "SELECT id,fname,lname 
          FROM staff 
		 WHERE role = 'user' AND appraiser = 0";
$res = mysql_query($sql);
$num = mysql_num_rows($res);
if($num > 0){
     $data.= '<option value="">select</option>';
     while($row = mysql_fetch_assoc($res)){
	   $data.= '<option value="'.$row['id'].'">'.$row['fname']." ".$row['lname'].'</option>'; 
	 }
} else {
  //$data.= "Staff Member is not available";
  $data.= 'none';
}
$data_last.=$data."#*@@*#";
$data='';	 

$sql = "SELECT id,fname,lname 
          FROM staff 
		 WHERE role = 'user' AND appraiser = ".$_REQUEST['appraiser_user'];
$res = mysql_query($sql);
$num = mysql_num_rows($res);
$data.='<table id="staff_n_list" border="2" align="center" cellpadding="0" cellspacing="0" style="width:330px;text-align: center;"><tr><td><b>Selected Staff Member</b></td></tr>';
if($num > 0){
    while($row = mysql_fetch_assoc($res)){
	   $data.='<tr><td>'.$row['fname']." ".$row['lname'].'</td></tr>';
	}
} else {
   $data.='<tr><td>Staff Member Not Available</td></tr>';
}
$data.='</table>';

$data_last.=$data."#*@@*#";
$data='';	

if($success_msg == 1){
  $data = 'success';  
}else if($success_msg == 2){
  $data = 'error';
}  
else {
  $data = 'none';
}
$data_last.=$data."#*@@*#";
$data='';	
 
echo $data_last; 
exit;
?>