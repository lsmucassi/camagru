<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <header>
    <link rel="stylesheet" type="text/css" href="wbstyles/mystyles.css">
    <meta charset="UTF-8">
    <title> SIGNUP </title>
    </header>
<body class="body">
    <?php include('fragment/header.php') ?>
    <?php include('fragment/footer.php') ?>

    <div class="login-nav">
        <label style="float: right; padding-right: 20px;"><b>Sign Up</b></label>
    </div>

    <div class="card">
        <form method="post" style="position: relative:" action="forms/signin.php"">
        <button class="head" type="submit">Sign Up</button>

            <div class="imgcontainer">
                <img src="img/sidepic.gif" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label><b>First Name</b></label>
                <input type="text" placeholder="Enter First Name" name="name" required>

                <label><b>Last Name</b></label>
                <input type="text" placeholder="Enter Last Name" name="sname" required>

                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="mail" required>

                <label><b>Choose Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button class="button" type="submit">Login</button>

                <input type="checkbox" checked="checked"> Remember me
                <span class="psw">Forgot <a href="404.php">password?</a></span>
            </div>

            <div class="container" style="background-color:#E0E0E0">
                <button  type="button" class="cancelbtn">Cancel</button>
                <span class="sign">Already have an accout? - <a href="index.php">Login</a></span>
            </div>
        </form>
    </div>

    <?php
        echo $_SESSION['error'];
        $_SESSION['error'] = null;
        if (isset($_SESSION['signup_success'])) {
            echo "An link was sent to your email account, check your eamil to continue...";
            $_SESSION['signup_success'];
        }
    ?>

</body>
</html>