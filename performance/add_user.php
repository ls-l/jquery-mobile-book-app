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
            $.post("add_user_db.php",$("#personal_data").serialize(),function(data){                      
                if(data == 'error'){
                    $("#success_msg").hide();
                    $("#error_msg").show();   
                    $("#error_msg").html('Sorry, Please Fill up all the fields.');
                } else if(data == 'success'){
				
				    $("#user_type").val('');
					$("#username").val('');
					$("#password").val('');
					$("#conf_password").val('');
					$("#first_name").val('');
					$("#last_name").val('');
					$("#class_val").val('');
					$("#room").val('');
					$("#responsible").val('');
					$("#current_step").val('');
					$("#salary_date").val('');
					$("#trb").val('');
					
					

                    $("#error_msg").hide();
                    $("#success_msg").show();  
                }else if(data == 'password'){
                    $("#success_msg").hide();
                    $("#error_msg").show();
                    $("#error_msg").html('Password And Confirm Password Not Match');
                }else if(data == 'usertype'){
                    $("#success_msg").hide();
                    $("#error_msg").show();
                    $("#error_msg").html('Please Select User Type');
                }else if(data == 'username'){
                    $("#success_msg").hide();
                    $("#error_msg").show();
                    $("#error_msg").html('This Username Already exists Please Enter Another Username');
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
                <th>Add User</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table>  
                        <form method="post" id="personal_data" action="" >

                            <div id="error_msg" class="alert alert-error" style="display:none;text-align: center;">Sorry, Please Fill up all the fields.</div>
                            <div id="success_msg" class="alert alert-success" style="display:none;text-align: center;">User detail added successfully.</div>
                            <a href="./admin.php">Back</a>
                            <?php 
                              if(isset($_REQUEST['username']) and trim($_REQUEST['username'] != '')){
                                  $username = trim($_REQUEST['username']);
                              } else {
                                  $username = '';
                              }
                              
                              if(isset($_REQUEST['first_name']) and trim($_REQUEST['first_name'] != '')){
                                  $first_name = trim($_REQUEST['first_name']);
                              } else {
                                  $first_name = '';
                              }
                              
                              if(isset($_REQUEST['last_name']) and trim($_REQUEST['last_name'] != '')){
                                  $last_name = trim($_REQUEST['last_name']);
                              } else {
                                  $last_name = '';
                              }
                              
                              if(isset($_REQUEST['class_val']) and trim($_REQUEST['class_val'] != '')){
                                  $class_val = trim($_REQUEST['class_val']);
                              } else {
                                  $class_val = '';
                              }
                              
                              if(isset($_REQUEST['room']) and trim($_REQUEST['room'] != '')){
                                  $room = trim($_REQUEST['room']);
                              } else {
                                  $room = '';
                              }
                              
                              if(isset($_REQUEST['responsible']) and trim($_REQUEST['responsible'] != '')){
                                  $responsible = trim($_REQUEST['responsible']);
                              } else {
                                  $responsible = '';
                              }
                              
                              if(isset($_REQUEST['current_step']) and trim($_REQUEST['current_step'] != '')){
                                  $current_step = trim($_REQUEST['current_step']);
                              } else {
                                  $current_step = '';
                              }
                              
                              if(isset($_REQUEST['salary_date']) and trim($_REQUEST['salary_date'] != '')){
                                  $salary_date = trim($_REQUEST['salary_date']);
                              } else {
                                  $salary_date = '';
                              }
                              
                              if(isset($_REQUEST['trb']) and trim($_REQUEST['trb'] != '')){
                                  $trb = trim($_REQUEST['trb']);
                              } else {
                                  $trb = '';
                              }
                              
                              if(isset($_REQUEST['role']) and trim($_REQUEST['role'] != '')){
                                  $role = trim($_REQUEST['role']);
                              } else {
                                  $role = '';
                              }
                              
                              if(isset($_REQUEST['password']) and trim($_REQUEST['password'] != '')){
                                  $password = trim($_REQUEST['password']);
                              } else {
                                  $password = '';
                              }
                              
                              if(isset($_REQUEST['conf_password']) and trim($_REQUEST['conf_password'] != '')){
                                  $conf_password = trim($_REQUEST['conf_password']);
                              } else {
                                  $conf_password = '';
                              }
                              
                              
                            ?>
                            
                            <tr>
                                <td>User Type</td>
                                <td>
                                    <select id="user_type" name="user_type" style="padding:2px;width: 143px;">
                                        <option value="">Select Type</option>
                                        <option value="appraiser">Appraiser User</option>
                                        <option value="user">Staff Member</option>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>User Name</td>
                                <td><input type="text" name="username" id="username" value="<?php echo $username; ?>" /></td>
                            </tr>
                            
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="password" id="password" value="<?php echo $password; ?>" /></td>
                            </tr>
                            <tr>
                                <td>Confirm Password</td>
                                <td><input type="password" name="conf_password" id="conf_password" value="<?php echo $conf_password; ?>" /></td>
                            </tr>
                           
                            <tr>
                                <td>First Name</td>
                                <td><input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>"/></td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td><input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>"/></td>
                            </tr>
                            <tr>
                                <td>Class</td>
                                <td><input type="text" name="class_val" id="class_val" value="<?php echo $class_val; ?>"/></td>
                            </tr>
                            <tr>
                                <td>Room</td>
                                <td><input type="text" name="room" id="room" value="<?php echo $room; ?>"/></td>
                            </tr>
                            <tr>
                                <td>Responsible</td>
                                <td><input type="text" name="responsible" id="responsible" value="<?php echo $responsible; ?>"/></td>
                            </tr>
                            
                            <tr>
                                <td>Current Step</td>
                                <td><input type="text" name="current_step" id="current_step" value="<?php echo $current_step; ?>"/></td>
                            </tr>
                            <tr>
                                <td>Salary Date</td>
                                <td><input type="text" name="salary_date" id="salary_date" value="<?php echo $salary_date; ?>"/></td>
                            </tr>
                            <tr>
                                <td>TRB</td>
                                <td><input type="text" name="trb" id="trb" value="<?php echo $trb; ?>"/></td>
                            </tr>
                            
                            <tr>
                                <td colspan=2"">
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