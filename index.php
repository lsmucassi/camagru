<?php
	require_once('load.php');
	$err = 0;
	$sql = "SELECT * FROM cm_users WHERE user_login = '" . $_POST["username"] . "'";
	$link = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
	$sth = $link->prepare( $sql );
	$sth->execute();
	$results = $sth->fetchAll( PDO::FETCH_ASSOC );
	
	if ( isset($_POST['reg_user']) ){
		if ( $_POST['password_1'] != $_POST['password_2'] ) { 
			echo "<script type='text/javascript'>alert('The two passwords do not match :(')</script>";
			$err++;
		}
		if ( $_POST['email'] == $results[0]['email'] ) {
			echo "<script type='text/javascript'>alert('Email entered is already in use :(')</script>"; 
			$err++;
		}
		if ( $_POST['username'] == $results[0]['username'] )  {
			echo "<script type='text/javascript'>alert('Username is not available :)')</script>";
			$err++;
		}
		if ($err == 0){
			$c->register('login.php');
		}
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="wbstyles/style.css">
		<meta charset="UTF-8">
		<title>Camagru | Register_ </title>
	</head>
	<body>
		<div id="page">
		<!-- Header -->
            <?php include('headnfoot/preheader.php') ?>
		<div class="card">
			<form method="post" action="index.php">
				<button class="head" >Sign Up</button>

				<div class="imgcontainer">
					<img src="img/sidepic.gif" alt="Avatar" class="avatar">
				</div>

				<div class="container">
					<label><b>Full Name</b></label>
					<input type="text" placeholder="Enter full name" name="name" required>

					<label><b>Username</b></label>
					<input type="text" placeholder="Enter Username" name="username" required>

					<label><b>Email</b></label>
					<input type="text" placeholder="Enter Email" name="email" required>

					<label><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="password_1" required>

					<label><b>Confirm Password</b></label>
					<input type="password" placeholder="Confirm password" name="password_2" required>
					<input type="hidden" name="date" value="<?php echo time(); ?>">
					<button class="button" type="submit" name="reg_user">Sign Me Up</button>
					<input type="checkbox" checked="checked"> Remember me
				</div>

				<div class="container" style="background-color: #E0E0E0">
					<button  type="submit" class="cancelbtn">Cancel</button>
					<span class="sign">Already have an accout? - <a href="login.php">Login</a></span>
				</div>
			</form>
		</div>
		</div>
			<!-- footer -->
        <?php include('../headnfoot/footer.php') ?>
	</body>
</html>