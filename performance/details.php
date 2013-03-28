
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
if (isset($_SESSION['uid'])) {
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
                        $query = "SELECT * FROM staff WHERE id = " . $_SESSION['uid'];
                        $res = mysql_query($query);
                        $row = mysql_fetch_assoc($res);
                        ?>
                        <form method="post" id="personal_data" action="" >
                          
                            <div id="error_msg" class="alert alert-error" style="display:none;text-align: center;">Sorry, Please Fill up all the fields.</div>
                            <div id="success_msg" class="alert alert-success" style="display:none;text-align: center;">Your personal detail updated successfully.</div>
                            
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
                            <tr>
                                <td>Appraiser</td>
                                <td><input type="text" name="appraiser" id="appraiser" value="<?php echo $row['appraiser']; ?>"/></td>
                            </tr>
                            <tr>
                                <td>Current Step</td>
                                <td><input type="text" name="current_step" id="current_step" value="<?php echo $row['current_step']; ?>"/></td>
                            </tr>
                            <tr>
                                <td>TRB</td>
                                <td><input type="text" name="trb" id="trb" value="<?php echo $row['trb_num']; ?>"/></td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td><input type="text" name="role" id="role" value="<?php echo $row['role']; ?>"/></td>
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