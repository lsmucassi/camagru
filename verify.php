<?php
    require_once( 'load.php' );

    try {
        $conn = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $userlogin = $_GET['user'];
    
        $sql = "UPDATE cm_users SET user_confirm='1' WHERE user_login='$userlogin'";
    
        // Prepare statement
        $stmt = $conn->prepare($sql);
    
        // execute the query
        $stmt->execute();
    
        header("http://localhost:8080/wtc-camagru/l/login.php");
        exit;
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
?>