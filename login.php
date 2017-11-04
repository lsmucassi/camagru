<?php
	require_once('load.php');

	if ( $_GET['action'] == 'logout' ) {
		$loggedout = $c->logout();
	}

	$sql = "SELECT * FROM cm_users WHERE user_login = '" . $_POST['username'] . "'";
	$link = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
	$sth = $link->prepare( $sql );
	$sth->execute();
	$res = $sth->fetchAll( PDO::FETCH_ASSOC );
	$err = 0;

	if ( isset($_POST['log_user']) ){
			$c->login('blog.php');
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
		<div class="cont">
			<div id="logo">
				<h1><a href="/" id="logoLink">Logo | Camagru_ </a></h1>
			</div>
			<ul class="navi">
				<li><a href="#/home.html">Login</a></li>
			</ul>
		</div>
		<div class="divider">
			<!--separates -->
		</div>

		<div class="card">
			<form action="" method="post" autocomplete="on">
				<button class="head" type="" name="log_user">Sign In</button>

				<div class="imgcontainer">
					<img src="img/sidepic.gif" alt="Avatar" class="avatar">
				</div>

				<div class="container">
					<label><b>Username</b></label>
					<input class="balloon" type="text" placeholder="Enter Username" name="username" required>

					<label><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="password" required>

					
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
	<footer class="footer">This footer will always be positioned at the bottom of the page, but <strong>not fixed</strong>.</footer>
	</body>
</html>

