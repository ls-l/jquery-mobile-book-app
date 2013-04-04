<?php
include "./includes/header.php";
?>
<script type="text/javascript">
    //    function FormSubmit(){
    //        $.post('details_db.php',$(this).serialize(),function(msg){
    //            alert(msg);
    //        // form inputs consist of 5 values total: name, email, website, text, and a hidden input that has the value of an integer
    //        });
    //    }      
    $(document).ready(function() {
        $('form').submit(function(msg) {
            $.post("details_db.php",$("#personal_data").serialize(),function(data){                      
                if(data == 'error'){
                    $("#success_msg").hide();
                    $("#error_msg").show();   
                } else if(data == 'success'){
                    $("#error_msg").hide();
                    $("#success_msg").show();  
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
                <th>Edit Personal Detail</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table>
                        <?php
                        if (isset($_SESSION['uid']) and $_SESSION['uid'] != '') {
                            $userid = $_SESSION['uid'];
                            $admin_edit = 0;
                        }
                        if (isset($_SESSION['auid']) and $_SESSION['auid'] != '') {
                            $userid = $_REQUEST['user_id'];
                            $admin_edit = 1;
                        }
                        $query = "SELECT * FROM staff WHERE id = " . $userid;
                        $res = mysql_query($query);
                        $row = mysql_fetch_assoc($res);
                        
						$select_app = "SELECT fname,lname FROM staff WHERE id = ".$row['appraiser'];
						$res_app = mysql_query($select_app);
						$num_app = mysql_num_rows($res_app);
						$row_app = mysql_fetch_assoc($res_app);
						if($num_app > 0){
						   $app_name = $row_app['fname']." ".$row_app['lname']; 
						} else {
						   $app_name = 'Not Available';
						}
						
						?>
                         
                        <form method="post" id="personal_data" action="" >

                            <div id="error_msg" class="alert alert-error" style="display:none;text-align: center;">Sorry, Please Fill up all the fields.</div>
                            <div id="success_msg" class="alert alert-success" style="display:none;text-align: center;">Your personal detail updated successfully.</div>
                            
                            <?php if(isset($_SESSION['auid']) and $_SESSION['auid'] != '') { ?> 
                               <a href="./admin.php">Back</a>
                            <?php } ?>
                            
                            <tr>
                                <td>User Name</td>
                                <td><input type="text" name="username" id="username" value="<?php echo $row['username']; ?>" readonly=""/></td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td><input type="text" name="first_name" id="first_name" value="<?php echo $row['fname']; ?>"/></td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td><input type="text" name="last_name" id="last_name" value="<?php echo $row['lname']; ?>"/></td>
                            </tr>
                            <tr>
                                <td>Class</td>
                                <td><input type="text" name="class_val" id="class_val" value="<?php echo $row['class']; ?>"/></td>
                            </tr>
                            <tr>
                                <td>Room</td>
                                <td><input type="text" name="room" id="room" value="<?php echo $row['room']; ?>"/></td>
                            </tr>
                            <tr>
                                <td>Responsible</td>
                                <td><input type="text" name="responsible" id="responsible" value="<?php echo $row['responsible']; ?>"/></td>
                            </tr>
							<?php if($row['role'] == 'user') { ?>
                            <tr>
                                <td>
								  Appraiser
								</td>
                                <td>
								<?php echo $app_name; ?>
								<?php /*?><input type="text" name="appraiser" id="appraiser" value="<?php echo $row['appraiser']; ?>"/><?php */?>
								<input type="hidden" name="appraiser" id="appraiser" value="<?php echo $row['appraiser']; ?>"/>
								</td>
                            </tr>
							<?php } else { ?>
							   <input type="hidden" name="appraiser" id="appraiser" value="0"/>
							<?php } ?>
                            <tr>
                                <td>Current Step</td>
                                <td><input type="text" name="current_step" id="current_step" value="<?php echo $row['current_step']; ?>"/></td>
                            </tr>
                            <tr>
                                <td>Salary Date</td>
                                <td><input type="text" name="salary_date" id="salary_date" value="<?php echo $row['salary_date']; ?>"/></td>
                            </tr>
                            <tr>
                                <td>TRB</td>
                                <td><input type="text" name="trb" id="trb" value="<?php echo $row['trb_num']; ?>"/></td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td><input type="text" readonly="" name="role" id="role" value="<?php echo $row['role']; ?>"/></td>
                            </tr>
                            <tr>
                                <td colspan=2"">
                                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $userid; ?>" />
                                    <input type="hidden" name="admin_edit" id="admin_edit" value="<?php echo $admin_edit; ?>" />
                                    <input type="submit" name="personal_form" id="personal_form" value="Submit"/>    
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