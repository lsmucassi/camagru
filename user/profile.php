<?php
/**
 * Created by PhpStorm.
 * User: lmucassi
 * Date: 2017/10/26
 * Time: 5:01 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="wbstyles/profile.css">
    <script src="wbscripts/profile.js"></script>
    <meta charset="UTF-8">
    <title>Camagru | Home_ </title>
</head>
<body>

<div id="page">

  <!-- The navigation bar -->
  <?php include('../headnfoot/header.php') ?>
    <div class="main-blog">

        <div class="content">
            <div class="card">
                <div class="firstinfo"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/mrvanz/128.jpg"/>
                    <div class="profileinfo">
                        <h1>Francesco Moustache</h1>
                        <h3>Python Ninja</h3>
                        <p class="bio">Lived all my life on the top of mount Fuji, learning the way to be a Ninja Dev.</p>
                    </div>
                </div>
            </div>
            <div class="badgescard"> <span class="devicons devicons-django"></span><span class="devicons devicons-python"> </span><span class="devicons devicons-codepen"></span><span class="devicons devicons-javascript_badge"></span><span class="devicons devicons-gulp"></span><span class="devicons devicons-angular"></span><span class="devicons devicons-sass"> </span></div>
        </div>

    </div>

</div>
<footer class="footer">This footer will always be positioned at the bottom of the page, but <strong>not fixed</strong>.</footer>
</body>
</html>
