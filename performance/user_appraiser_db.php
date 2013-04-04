<?php
include "./includes/config.php";
/*echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
exit;*/

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
  $data.= "none";
  
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

	
echo $data_last; 
exit;
?>