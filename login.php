<?php
	require_once('load.php');

	$sql = "SELECT * FROM cm_users WHERE user_login = '" . $_POST['username'] . "'";
	$link = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
	$sth = $link->prepare( $sql );
	$sth->execute();
	$res = $sth->fetchAll( PDO::FETCH_ASSOC );
	$err = 0;

	if ( isset($_POST['log_user']) ){
			$c->login('user/blog.php');
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="wbstyles/style.css">
		<meta charset="UTF-8">
		<title>Camagru | Login_ </title>
	</head>

	<body>
		<div id="page">
            <!-- header -->
            <?php include('headnfoot/preheader.php') ?>

		<div class="card">
			<form action="" method="post" autocomplete="on">
				<button class="head" type="" name="log_user">Sign In</button>

				<div class="imgcontainer">
					<img src="img/sidepic.gif" alt="Avatar" class="avatar">
				</div>

				<div class="container">
					<label><b>Username</b></label>
					<input class="balloon" type="text" name="username" value="<?php if (!empty($_COOKIE['camlogauth[user]'])) echo $_COOKIE['camlogauth[user]']; else echo "";?>" required>

					<label><b>Password</b></label>
					<input type="password" name="password" value="<?php if (!empty($_COOKIE['camlogauth[authID]'])) echo $_COOKIE['camlogauth[authID]']; else echo "";?>" required>
					
					<button class="button" type="submit" name="log_user">Sign In</button>
					
					<input type="checkbox" checked="checked"> Remember me

					<span class="psw">Forgot <a href="forgot.php">password?</a></span>
				</div>

				<div class="container" style="background-color:#E0E0E0">
					<button type="button" class="cancelbtn">Cancel</button>
					<span class="sign">Don't have an accout? - <a href="index.php">Sign Up</a></span>
				</div>
			</form>
		</div>
	</div>
    <!-- footer -->
        <?php include('headnfoot/footer.php') ?>
    </body>
</html>

