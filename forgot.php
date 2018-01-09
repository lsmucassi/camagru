<?php
    require_once( 'load.php' );

    $sql = "SELECT * FROM cm_users WHERE user_email = '" . $_POST['email'] . "'";
	$link = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
	$sth = $link->prepare( $sql );
	$sth->execute();
	$res = $sth->fetchAll( PDO::FETCH_ASSOC );
    
    if (isset($_POST['butt'])){
        if ( $res[0]['user_email'] == $_POST['email'] ) {
            $c->email( $_POST['email'] );
            echo "<script type='text/javascript'>alert('Check " . $_POST['email'] . " to reset your password. :)')</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Invalid email')</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="wbstyles/style.css">
    <meta charset="UTF-8">
    <title>Camagru | Recover Account_ </title>
</head>
<body>
<div id="page">
    <!-- Header -->
    <?php include('headnfoot/preheader.php') ?>

    <div class="card">
        <form method="post" action="" autocomplete="on">
            <button class="head" type="submit">Reset Password</button>

            <div class="imgcontainer">
                <img src="img/recover.png" alt="Avatar" class="avatar">
            </div>

            <div class="container " style="margin-bottom: 30px; ">
                <label>Email: </label>
                <input  id="mail" name="email" placeholder="Email" type="text" required>
                <button class="rec-psw" type="submit" name="butt">Send</button>
            </div>

            <div class="container" style="margin-top: 10px; background-color:#E0E0E0;">
                <button  type="button" class="cancelbtn" name="cancel"</button><a href="login.php">Cancel</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
