<?php
    require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background: url('./images/hub.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            margin: 0;
            padding-top: 100px; /* Increased gap between header and container */
        }
        .marquee-container {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: black;
            padding: 20px 0; /* Increased padding for a bigger header */
            color: white;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            z-index: 1000;
        }
        marquee {
            width: 100%;
        }
        #main-wrapper {
            background-color: whitesmoke;
            padding: 30px;
            width: 500px; /* Increased container width */
            border-radius: 10px;
            box-shadow: 0px 0px 15px gray;
            text-align: center;
        }
        .inputvalues {
            width: 95%; /* Adjusted input width */
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid gray;
            font-size: 16px;
        }
        #signup_btn, #back_btn {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }
        #signup_btn {
            background-color: #28a745;
            color: white;
        }
        #back_btn {
            background-color: #dc3545;
            color: white;
        }
        #signup_btn:hover {
            background-color: #218838;
        }
        #back_btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="marquee-container">
        <marquee>Welcome to PlayHub Game</marquee>
    </div>

    <div id="main-wrapper">
        <center>
            <h2>User Registration</h2>
        </center>

        <form class="myform" action="register.php" method="post">
            <label><b>Full Name:</b></label>
            <input name="fullname" type="text" class="inputvalues" placeholder="Enter your full name" required>

            <label><b>Username:</b></label>
            <input name="username" type="text" class="inputvalues" placeholder="Enter your username" required>

            <label><b>Email:</b></label>
            <input name="email" type="email" class="inputvalues" placeholder="Enter your email" required>

            <label><b>Password:</b></label>
            <input name="password" type="password" class="inputvalues" placeholder="Enter your password" required>

            <label><b>Confirm Password:</b></label>
            <input name="cpassword" type="password" class="inputvalues" placeholder="Confirm your password" required>

            <input name="submit_btn" type="submit" id="signup_btn" value="Sign Up">
            <a href="index.php"><input type="button" id="back_btn" value="Back To Login"></a>
        </form>

        <?php
            if(isset($_POST['submit_btn'])) {
                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];

                if($password == $cpassword) {
                    $query = "SELECT * FROM userinformation WHERE username='$username'";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0) {
                        echo '<script>alert("User already exists. Try another username.")</script>';
                    } else {
                        $query = "INSERT INTO userinformation (username, password, fullname, email) VALUES ('$username', '$password', '$fullname', '$email')";
                        $query_run = mysqli_query($con, $query);

                        if($query_run) {
                            echo '<script>alert("User Registered Successfully. Go to login page.")</script>';
                        } else {
                            echo '<script>alert("Error occurred while registering!")</script>';
                        }
                    }
                } else {
                    echo '<script>alert("Passwords do not match!")</script>';
                }
            }
        ?>
    </div>
</body>
</html>
