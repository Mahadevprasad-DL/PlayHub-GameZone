<?php
    session_start();
    require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background: url('./images/hub.jpg') no-repeat center center fixed; background-size: cover; display: flex; justify-content: center; align-items: center; height: 100vh;">

    <div id="main-wrapper" style="background-color: whitesmoke; padding: 20px; width: 600px; border-radius: 10px; box-shadow: 0px 0px 10px gray; text-align: center;">
        <h2 style="color: #333; margin-bottom: 15px;">User Login</h2>

        <form class="myform" action="index.php" method="post">
            <label style="display: block; text-align: left; font-weight: bold; margin-bottom: 5px;">Username:</label>
            <input name="username" type="text" class="inputvalues" placeholder="Enter username" required 
                style="background-color: whitesmoke; padding: 8px; width: 100%; border: 1px solid #ccc; border-radius: 5px; font-size: 14px; margin-bottom: 10px;"/>

            <label style="display: block; text-align: left; font-weight: bold; margin-bottom: 5px;">Password:</label>
            <input name="password" type="password" class="inputvalues" placeholder="Enter password" required 
                style="background-color: whitesmoke; padding: 8px; width: 100%; border: 1px solid #ccc; border-radius: 5px; font-size: 14px; margin-bottom: 15px;"/>

            <input name="login" type="submit" id="login_btn" value="Login" 
                style="background-color: #f7b32d; color: white; padding: 8px; width: 100%; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; margin-bottom: 8px;"/>

            <a href="register.php">
                <input type="button" id="register_btn" value="Register" 
                    style="background-color: #555; color: white; padding: 8px; width: 100%; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;"/>
            </a>
        </form>

        <?php
        if(isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM userinformation WHERE username='$username' AND password='$password'";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0) {
                $row = mysqli_fetch_assoc($query_run);
                $_SESSION['username'] = $row['username'];
                $_SESSION['imglink'] = $row['imglink'];
                header('location:index1.html');
            } else {
                echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
            }
        }
        ?>
    </div>

</body>
</html>
