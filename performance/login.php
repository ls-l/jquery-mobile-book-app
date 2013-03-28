<?php
include "./includes/header.php";
?>
<script>
    function login() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
		
        $.post("./includes/login.php", {						
            username:username,
            password:password	          		
        }, function(data){
            if(data){
                if(data == "success") {
                    window.location = "./index.php";
                }
                else if(data == "asuccess") {
                    window.location = "./admin.php";
                }
                else if(data == "msuccess") {
                    window.location = "./appraiser.php";
                }
                else {
                    $('#main_login').css({ display: "block" });
                    $("#main_login").html(data);
                }
                                
            }
        });
    }

</script>

<table width="100%">
    <tr>
        <td><a href="./index.php"><img src="./images/logo.png" /></a></td>
    </tr>
</table>
<div style="text-align: center;">
    <p><strong>Login Page</strong></p>
    <p>Please login using the form below.</p>
    <table border="0" width="100%">
        <tr>
            <?php
            if (!isset($_SESSION['uid'])) {
                ?>            
                <td valign="top" align="center"><div id="login">
                        <form id="loginform" name="loginform" method="post" action="./includes/login.php">          
                            Username:
                            <input type="text" name="username" id="username" onKeydown="Javascript: if (event.keyCode==13) login();"/><br />       
                            Password:
                            <input type="password" name="password" id="password" onKeydown="Javascript: if (event.keyCode==13) login();"/><br />         
                            <button type="button" name="loginbut" id="loginbut" onClick="login()">Login</button>
            <!--                <input type="submit" name="loginbut" id="loginbut" value="Login" />-->
                        </form><br />
                        <div id="main_login" class="alert alert-error" style="display:none;"></div>
                    </div></td>      
                <?php
            } else {
                echo "<p>You are currently logged in.</p>";
            }
            ?>

        </tr>      
    </table>
</div>
</body>
</html>
