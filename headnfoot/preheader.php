    <div class="cont">
        <div id="logo">
            <h1><a href="/" id="logoLink">Camagru_ </a></h1>
        </div>
        <ul class="navi">
            <?php if ($_SERVER['REQUEST_URI'] == '/camagru/index.php') {?>
                <li><a href="#/home.html">Register</a></li>
            <?php } else if ($_SERVER['REQUEST_URI'] == '/camagru/login.php') { ?>
                <li><a href="#/home.html">Login</a></li>
            <?php } else if ($_SERVER['REQUEST_URI'] == '/camagru/forgot.php') { ?>
            <li><a href="#/home.html">Recover</a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="divider">
        <!--separates -->
    </div>