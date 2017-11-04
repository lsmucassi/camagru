<?php
// Our main class
if(!class_exists('Cam')){
	class Cam {
		
		function register($redirect) {
			global $c_db;
		
			//Check to make sure the form submission is coming from our script
			//The full URL of our registration page
			$current = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

			//The full URL of the page the form was submitted from
			$referrer = $_SERVER['HTTP_REFERER'];

			/*
			 * Check to see if the $_POST array has date (i.e. our form was submitted) and if so,
			 * process the form data.
			 */
			if ( !empty ( $_POST ) ) {

				/* 
				 * Here we actually run the check to see if the form was submitted from our
				 * site. Since our registration from submits to itself, this is pretty easy. If
				 * the form submission didn't come from the register.php page on our server,
				 * we don't allow the data through.
				 */
				if ( $referrer == $current ) {
				
					//Require our database class
					require_once('db.php');
						
					//Set up the variables we'll need to pass to our insert method
					//This is the name of the table we want to insert data into
					$table = 'cm_users';
					
					//These are the fields in that table that we want to insert data into
					$fields = array('user_name', 'user_login', 'user_email', 'user_pass', 'user_registered');
					
					//These are the values from our registration form... cleaned using our clean method
					$values = $c_db->clean($_POST);
					
					//Now, we're breaking apart our $_POST array, so we can storely our password securely
					$username = $_POST['name'];
					$userlogin = $_POST['username'];
					$userpass = $_POST['password_1'];
					$useremail = $_POST['email'];
					$userreg = $_POST['date'];
					
					//We create a NONCE using the action, username, timestamp, and the NONCE SALT
					$nonce = md5('registration-' . $userlogin . $userreg . NONCE_SALT);
					
					//We hash our password
					$userpass = $c_db->hash_password($userpass, $nonce);
					
					//Recompile our $value array to insert into the database
					$values = array(
								'name' => $username,
								'username' => $userlogin,
								'email' => $useremail,
								'password' => $userpass,
								'date' => $userreg
							);
					
					//And, we insert our data
					$insert = $c_db->insert($link, $table, $fields, $values);
					
					if ( $insert == TRUE ) {
						$subject = "Activate Camgru Account";
						$message = "
						Thank you for registering Camagru with us.
						<br>
						<br>
						Please verify your account by clicking the link below <br>

						<button><a href='http://127.0.0.1:8080/wtc-camagru/wtc-camagru/verify.php?user=$userlogin&hash=$userpass'> Click Here! </a></button>
						<br>
						<br>
						Kind regards<br>
						Camagru Team
						";

						$head = 'Content-type: text/html; charset=UTF-8' . "\r\n";

						mail($useremail, $subject, $message, $head);
						echo "<script type='text/javascript'>alert('Check your mail to confirm your account :)')</script>";
						$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
						$aredirect = str_replace('index.php', $redirect, $url);
						header("Location: $redirect?reg=true");
						exit;
					}
					else {
						die( "DID NOT INSERT" );
					}
				} else {
					die('Your form submission did not come from the correct page. Please check with the site administrator.');
				}
			}
		}
		/*
		$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'] . ":8080" . $_SERVER['REQUEST_URI'];
            $aredirect = str_replace('forgot.php', 'reset.php', $url);
            header("Location: $aredirect");
            exit;
		*/
		function login($redirect) {
			global $c_db;
			$link = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
		
			if ( !empty ( $_POST ) ) {
				
				//Clean our form data
				//$values = $c_db->clean($_POST);

				//The username and password submitted by the user
				$subname = $_POST['username'];
				$subpass = $_POST['password'];


				//The name of the table we want to select data from
				$table = 'cm_users';

				/*
				 * Run our query to get all data from the users table where the user 
				 * login matches the submitted login.
				 */
				$sql = "SELECT * FROM $table WHERE user_login = '" . $subname . "'";
				$link = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
				$sth = $link->prepare( $sql );
				$sth->execute();
				$results = $sth->fetchAll( PDO::FETCH_ASSOC );

				//Kill the script if the submitted username doesn't exit
				if ( empty($results[0]) ) {
					die('Sorry, that username does not exist!');
				}
				
				//The registration date of the stored matching user
				$storeg = $results[0]['user_registered'];

				//The hashed password of the stored matching user
				$stopass = $results[0]['user_pass'];

				//Recreate our NONCE used at registration
				$nonce = md5('registration-' . $subname . $storeg . NONCE_SALT);

				//Rehash the submitted password to see if it matches the stored hash
				$subpass = $c_db->hash_password($subpass, $nonce);

				//Check to see if the submitted password matches the stored password
				if ( $subpass == $stopass && $results[0]['user_confirm'] == 1 ) {
					//If there's a match, we rehash password to store in a cookie
					$authnonce = md5('cookie-' . $subname . $storeg . AUTH_SALT);
					$authID = $c_db->hash_password($subpass, $authnonce);
					
					//Set our authorization cookie
					setcookie('camlogauth[user]', $subname, 0, '', '', '', true);
					setcookie('camlogauth[authID]', $authID, 0, '', '', '', true);
					
					//Build our redirect
					$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
					$aredirect = str_replace('login.php?reg=true', $redirect, $url);
					
					header("Location: $redirect");
					exit;	
				}
				else {
					if ($results[0]['user_confirm'] == 0) {
						echo "<script type='text/javascript'>alert('Check your mail to confirm your account :)')</script>";
					}
					else {
						echo "<script type='text/javascript'>alert('Username or password you entered is incorrect :(')</script>";
					}
				}
			} else {
				die ("EMPTY");
			}
		}
		
		function logout() {
			//Expire our auth coookie to log the user out
			$idout = setcookie('camlogauth[authID]', '', -3600, '', '', '', true);
			$userout = setcookie('camlogauth[user]', '', -3600, '', '', '', true);
			
			if ( $idout == true && $userout == true ) {
				return true;
			} else {
				return false;
			}
		}
		
		function checkLogin() {
			global $c_db;
			$link = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
		
			//Grab our authorization cookie array
			$cookie = $_COOKIE['camlogauth'];
			
			//Set our user and authID variables
			$user = $cookie['user'];
			$authID = $cookie['authID'];
			
			/*
			 * If the cookie values are empty, we redirect to login right away;
			 * otherwise, we run the login check.
			 */
			if ( !empty ( $cookie ) ) {
				
				//Query the database for the selected user
				$table = 'cm_users';
				$sql = "SELECT * FROM $table WHERE user_login = '" . $user . "'";
				$results = $c_db->select($sql);

				//Kill the script if the submitted username doesn't exit
				if (!$results) {
					die('Sorry, that username does not exist!');
				}

				//Fetch our results into an associative array
				$results = $results->fetchAll(PDO::FETCH_ASSOC);
		
				//The registration date of the stored matching user
				$storeg = $results['user_registered'];

				//The hashed password of the stored matching user
				$stopass = $results['user_pass'];

				//Rehash password to see if it matches the value stored in the cookie
				$authnonce = md5('cookie-' . $user . $storeg . AUTH_SALT);
				$stopass = $c_db->hash_password($stopass, $authnonce);
				
				if ( $stopass == $authID ) {
					$results = true;
				} else {
					$results = false;
				}
			} else {
				//Build our redirect
				$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
				$redirect = str_replace('index.php', 'login.php', $url);
				
				//Redirect to the home page
				header("Location: $redirect?msg=login");
				exit;
			}
			
			return $results;
		}

		function email( $email ) {
			global $c_db;			

			$sql = "SELECT * FROM cm_users WHERE user_email = '" . $email . "'";
			$link = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
			$sth = $link->prepare( $sql );
			$sth->execute();
			$res = $sth->fetchAll( PDO::FETCH_ASSOC );

				$subject = "Reset Password";
				$username = $res[0]['user_login'];
				$hash = $res[0]['user_registered'];
				$message = "
				<br>
				<br>
				Click the following link to reset your password
				
				<br>
				<br>

				<button><a href='http://localhost:8080/camagru/reset.php?login=$username&hash=$hash'> Click Here! </a></button>

				<br>
				<br>
				Kind regards
				<br>
				Camagru Team
				";
	
				$head = 'Content-type: text/html; charset=UTF-8' . "\r\n";
	
				mail($email, $subject, $message, $head);
		}
	}
}

//Instantiate our database class
$c = new Cam;
$errors = array();
?>
