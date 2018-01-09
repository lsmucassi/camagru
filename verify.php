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
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
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

    <h2 style="color: #000000; padding-left: 20px;">Message</h2>

    <div class="alert">
        <span class="closebtn" ><a href="login.php">&rarr;</a></span>
        <strong>Congradulation!</strong> Your acount have been activated          click the arrow to continue and login.
    </div>
</body>
</html>
