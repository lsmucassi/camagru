    <?php
    require_once('load.php');

    if (isset($_POST['reset_butt'])){
        if ($_POST['password_1'] == $_POST['password_2']){
            try {
                $storeg = $_GET['user_registered'];

                //Recreate our NONCE used at registration
                $nonce = md5('registration-' . $_GET['login'] . $storeg . NONCE_SALT);
                
                //Rehash the submitted password to see if it matches the stored hash
                $userpass = $c_db->hash_password($_POST['password_1'], $nonce);
                $sql = "UPDATE cm_users SET user_pass='$userpass' WHERE user_registered='" . $storeg . "'";
    			$link = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
				$sth = $link->prepare( $sql );
                $sth->execute();
                $redirect = "login.php";
                
                $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                $aredirect = str_replace('login.php?reg=true', $redirect, $url);
                
                header("Location: $redirect");
                exit;	
            }
            catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
        }
        else {
            echo "<script type='text/javascript'>alert('The two passwords do not match :(')</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="wbstyles/style.css">
    <meta charset="UTF-8">
    <title>Camagru | Reset Password_ </title>
</head>
<body>
<div id="page">
    <div class="cont">
        <div id="logo">
            <h1><a href="/" id="logoLink">Logo | Camagru_ </a></h1>
        </div>
        <ul class="navi">
            <li><a href="#/home.html">Reset</a></li>
        </ul>
    </div>
    <div class="divider">
        <!--separates -->
    </div>

<div class="card">
    <form action="" method="post" autocomplete="on">
        <button class="head" type="submit">Reset</button>

        <div class="imgcontainer">
            <img src="img/sidepic.gif" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label><b>New Password</b></label>
            <input class="balloon" type="password" name="password_1" required>

            <label><b>Confirm Password</b></label>
            <input class="balloon" type="password" name="password_2" required>

            <button class="button" type="submit" name="reset_butt">Reset</button>

            <input type="checkbox" checked="checked"> Remember me

        </div>

        <div class="container" style="background-color:#E0E0E0 padding-top: 15px;">
            <button type="button" class="cancelbtn"><a href="http://localhost:8080/camagru/login.php">Cancel</a></button>
        </div>
    </form>
</div>
</div>
</body>
</html>
