<?php
include "./includes/header.php";
?>
<script type="text/javascript">   
    $(document).ready(function() {
	   $("#appraiser_user").change(function(){
	          $('#error_msg').hide();
			  $('#success_msg').hide(); 
		  if($("#appraiser_user").val() != ''){
		    $.post("user_appraiser_db.php",$("#user_appraiser").serialize(),function(data){                    
               var res = data.split("#*@@*#");
			   if(res[0] == 'none'){
			     $('#staff_msg').show();
				 $('#staff_nm').html('<option value="">select</option>');
			   } else {
			     $('#staff_msg').hide();
				 $('#staff_nm').html(res[0]);
			   }
			   
			   $('#staff_list').html(res[1]);
               //alert(data);
			});
		  } else {
		    $('#staff_nm').html('<option value="">select</option>');
			$('#staff_list').html('');
		  }
	   });
	   
	   
	   
	  
        $('form').submit(function() {
		     $('#error_msg').hide();
			 $('#success_msg').hide();
               $.post("user_appraiser_insert_db.php",$("#user_appraiser").serialize(),function(data){    
				if(data == 'error'){
				   $('#success_msg').hide();
				   $('#error_msg').show();
				   return false; 
				} else {				
					var res = data.split("#*@@*#");
					if(res[0] == 'none'){
						 $('#staff_msg').show();
						 $('#staff_nm').html('<option value="">select</option>');
					 } else {
					     $('#staff_msg').hide();
						 $('#staff_nm').html(res[0]);
					   }
					$('#staff_list').html(res[1]);
					if(res[2] = 'success'){
					   $('#error_msg').hide();
					   $('#success_msg').show();
					} 
				}
            });
            return false; 
        });
    });
</script>


<?php
if (isset($_SESSION['uid']) or isset($_SESSION['auid'])) {
    ?>
    <style>
        .datatables_length {
            display: none;
        }
    </style>


    <table width="100%">
        <tr>
            <td colspan="2"><a href="./index.php"><img src="./images/logo.png" /></a></td>
        </tr>
        <tr>
            <td><? include "./includes/navigation.php"; ?></td>
            <td align="right"><a href="./logout.php" title="Logout"><img src="./images/logout.png" width="30" border="0" /></a></td>
        </tr>
    </table>

    <table cellpadding="0" cellspacing="0" border="0" class="display" id="table">
        <thead>
            <tr>
                <th>Assign users to an appraiser</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table align="center">  
                        <form id="user_appraiser" method="post" >
						<div id="error_msg" class="alert alert-error" style="display:none;text-align: center;">Sorry, Please Select all the fields.</div>
                            <div id="success_msg" class="alert alert-success" style="display:none;text-align: center;">Staff member added successfully.</div>
						  <tr>
						     <td>Select Appraiser User</td>
						     <td>
							    
								<select id="appraiser_user" name="appraiser_user">
								   <option value="">Select</option>
								  <?php 
								  $sql = "SELECT id,fname,lname
								          FROM staff
										  WHERE role = 'appraiser';
										 ";
								  $res = mysql_query($sql);
								  $num = mysql_num_rows($res);
								  if($num > 0){
								    while($row = mysql_fetch_assoc($res)){		 
								?>   
								   <option value="<?php echo $row['id'] ?>"><?php echo $row['fname']." ".$row['lname'] ?></option>
								<?php 
								   }
								} 
								?>
								</select>
							 </td>
						  </tr>
						  <tr>
						     <td>Select Staff Member</td>
							 <td id="staff_mem">
							    <select name="staff_nm" id="staff_nm" style="width:145px;">
                                   <option value="">select</option>
								 </select>
								 <span id="staff_msg" style="display:none;">Add New Staff Member</span>  
							 </td>
						  </tr>
						  
						  <tr>
                                <td colspan="2" align="center">
                                    <input type="hidden" name="form_sub" id="form_sub" value="1"/>
									<input type="submit" name="staff_form" id="staff_form" value="Submit"/>    
                                </td>
                            </tr>
						<tr >
						      <td id="staff_list" colspan="2">
							     	
							  </td>
						  </tr>	
						</form>
                    </table> 
                </td>
            </tr>
        </tbody>
    </table>

    </body>
    </html>
    <?
} else {
    header('Location: ./login.php');
}
?>