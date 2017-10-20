
<DOCTYPE html>
<html>
    <header>
    <link rel="stylesheet" type="text/css" href="wbstyles/mystyles.css">
    <meta charset="UTF-8">
    <title> LOGIN </title>
    </header>
<body class="body">

    <div class="login-nav">
        <label style="float: right; padding-right: 20px;"><b>login</b></label>
    </div>

    <div class="card">
    <form action="/action_page.php">
        <button class="head" type="submit">Login</button>

        <div class="imgcontainer">
        <img src="img/sidepic.gif" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label><b>Username or Email</b></label>
        <input type="text" placeholder="Enter Username or Email address" name="uname" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button class="button" type="submit">Login</button>

        <input type="checkbox" checked="checked"> Remember me

        <span class="psw">Forgot <a href="#">password?</a></span>
    </div>

    <div class="container" style="background-color:#E0E0E0">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="sign">Don't have an accout? - <a href="signup.php">Sign Up</a></span>
    </div>
    </form>
    </div>
</body>
</html>
