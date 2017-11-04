<?php
// Our database class
if(!class_exists('cm_db')){
	class cm_db {
	
		/**
		 * Connects to the database server and selects a database
		 *
		 * PHP4 compatibility layer for calling the PHP5 constructor.
		 *
		 * @uses cm_db::__construct()
		 *
		 */	
		function cm_db() {
			return $this->__construct();
		}
		
		/**
		 * Connects to the database server and selects a database
		 *
		 * PHP5 style constructor for compatibility with PHP5. Does
		 * the actual setting up of the connection to the database.
		 *
		 */
		function __construct() {
			$this->connect();
		}
	
		/**
		 * Connect to and select database
		 *
		 * @uses the constants defined in config.php
		 */	
		function connect() {
			$servername = "localhost";
			try {
				$link = new PDO("mysql:host=$servername", DB_USER, DB_PASS);
				$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "CREATE DATABASE IF NOT EXISTS db_cam";
				$link->exec($sql);
				$sql = "use db_cam";
				$link->exec($sql);
				$sql = "CREATE TABLE IF NOT EXISTS cm_users (user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
							user_name VARCHAR(255) NOT NULL, user_login VARCHAR(255) NOT NULL, user_email VARCHAR(255) NOT NULL,
							user_pass VARCHAR(255) NOT NULL, user_registered INT NOT NULL, user_confirm INT DEFAULT 0 NOT NULL)";
				$link->exec($sql);
			}
			catch(PDOException $e)
			{
				echo "Error: " . $sql . "<br>" . $e->getMessage();
			}
		}
		
		/**
		 * Clean the array using mysql_real_escape_string
		 *
		 * Cleans an array by array mapping mysql_real_escape_string
		 * onto every item in the array.
		 *
		 * @param array $array The array to be cleaned
		 * @return array $array The cleaned array
		 */
		function clean($array) {
			
			return array_map('mysql_real_escape_string', $array);
		}
		
		/**
		 * Create a secure hash
		 *
		 * Creates a secure copy of the user password for storage
		 * in the database.
		 *
		 * @param string $password The user's created password
		 * @param string $nonce A user-specific NONCE
		 * @return string $secureHash The hashed password
		 */
		function hash_password($password, $nonce) {
		  $secureHash = hash_hmac('sha512', $password . $nonce, SITE_KEY);
		  
		  return $secureHash;
		}
		
		/**
		 * Insert data into the database
		 *
		 * Does the actual insertion of data into the database.
		 *
		 * @param resource $link The MySQL Resource link
		 * @param string $table The name of the table to insert data into
		 * @param array $fields An array of the fields to insert data into
		 * @param array $values An array of the values to be inserted
		 */
		function insert($link, $table, $fields, $values) {
			$fields = implode(", ", $fields);
			$values = implode("', '", $values);

			try {
				$conn = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
				// set the PDO error mode to exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO $table (user_id, $fields, user_confirm) VALUES ('', '$values', '')";
				// use exec() because no results are returned
				$conn->exec($sql);
				return TRUE;
				//echo "New record created successfully";
			}
			catch(PDOException $e)
			{
				echo $sql . "<br>" . $e->getMessage();
			}
		}
		
		/**
		 * Select data from the database
		 *
		 * Grabs the requested data from the database.
		 *
		 * @param string $table The name of the table to select data from
		 * @param string $columns The columns to return
		 * @param array $where The field(s) to search a specific value for
		 * @param array $equals The value being searched for
		 */
		function select($sql) {
			$link = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
			$sth = $link->prepare( $sql );
			$sth->execute();
			$results = $sth->fetchAll( PDO::FETCH_ASSOC );

			return $resutls[0];
		}
	}
}

//Instantiate our database class
$c_db = new cm_db;
?>
