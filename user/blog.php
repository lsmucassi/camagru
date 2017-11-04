<?php
/**
 * Created by PhpStorm.
 * User: lmucassi
 * Date: 2017/11/02
 * Time: 8:52 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="wbstyles/blogstyle.css">
    <link rel="stylesheet" type="text/css" href="wbstyles/camstyle.css">
    <meta charset="UTF-8">
    <title>Camagru | Home_ </title>
    <script src="wbscripts/blogscript.js"></script>
</head>
<body>

<div id="page">
<<<<<<< HEAD:wtc-camagru/user/blog.php
    <!-- The navigation bar -->
=======
    <div class="cont">
        <div id="logo">
            <h1><a href="home.php" id="logoLink">Camagru_ </a></h1>
        </div>
        <ul class="navi">
            <li><a href="user/profile.php">Profile</a></li>
            <li><a href="#/about.html">Notifications</a></li>
            <li><a href="#/contact.html">Insights</a></li>
            <li><a href="#/contact.html">Messages</a></li>
            <li><a href="#/contact.html">Find</a></li>
            <li><a href="#/contact.html">Logout</a></li>
        </ul>
    </div>
    <!-- grey separator -->
    <div class="divider">
        <!--separates -->
    </div>
>>>>>>> fcfdebbafba9ea36d31dd8bdab7d0e0c8cdd8026:wtc-camagru/blog.php
     <!-- the while page -->
    <div class="main-page">
        <!-- camera first -->
        <div class="cam-colum cam-html">
            <h3 class="cam-h3">Demo: Take a Selfie With JavaScript</h3>
            <!-- camera -->
            <div class="container">
                <div class="app">
                    <a href="#" id="start-camera" class="visible">Touch here to start the app.</a>
                    <video id="camera-stream"></video>
                    <img id="snap">
                    <p id="error-message"></p>
                    <div class="controls">
                        <a href="#" id="delete-photo" title="Delete Photo" class="disabled"><i class="material-icons">delete</i></a>
                        <a href="#" id="take-photo" title="Take Photo"><i class="material-icons">camera_alt</i></a>
                        <a href="#" id="download-photo" download="selfie.png" title="Save Photo" class="disabled"><i class="material-icons">file_download</i></a>
                    </div>
                    <!-- Hidden canvas element. Used for taking snapshot of video. -->
                    <canvas></canvas>
                </div>

            </div>
        </div>
        <!-- the posts aside -->
        <div class="sidebar">
            <!-- blog -->
            <div class="blog-container">
                <div class="blog-header">
                    <div class="blog-cover">
                        <div class="blog-author">
                            <h3>Russ Beye</h3>
                        </div>
                    </div>
                </div>

                <div class="blog-body">
                    <div class="blog-title">
                        <h1><a href="#">I Like To Make Cool Things</a></h1>
                    </div>
                    <div class="blog-summary">
                        <p>I love working on fresh designs that
                            <a href="https://www.youtube.com/watch?v=hANtM1vJvOo">breathe</a>.
                            To that end, I need to freshen up my portfolio here because
                            it does exactly the opposite. For the next month I will be working
                            almost exclusively on my portfolio. Sounds like a lot of fun!</p>
                    </div>
                    <div class="blog-tags">
                        <ul>
                            <li><a href="#">css</a></li>
                            <li><a href="#">web design</a></li>
                            <li><a href="#">codepen</a></li>
                            <li><a href="https://twitter.com/russbeye">twitter</a></li>
                        </ul>
                    </div>
                </div>

                <div class="blog-footer">
                    <ul>
                        <li class="published-date">2 days ago</li>
                        <li class="comments"><a href="#"><svg class="icon-bubble"><use xlink:href="#icon-bubble"></use></svg><span class="numero">4</span></a></li>
                        <li class="shares"><a href="#"><svg class="icon-star"><use xlink:href="#icon-star"></use></svg><span class="numero">1</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- blog end -->
            <div class="blog-container">
                <div class="blog-header">
                    <div class="blog-cover">
                        <div class="blog-author">
                            <h3>Russ Beye</h3>
                        </div>
                    </div>
                </div>

                <div class="blog-body">
                    <div class="blog-title">
                        <h1><a href="#">I Like To Make Cool Things</a></h1>
                    </div>
                    <div class="blog-summary">
                        <p>I love working on fresh designs that
                            <a href="https://www.youtube.com/watch?v=hANtM1vJvOo">breathe</a>.
                            To that end, I need to freshen up my portfolio here because
                            it does exactly the opposite. For the next month I will be working
                            almost exclusively on my portfolio. Sounds like a lot of fun!</p>
                    </div>
                    <div class="blog-tags">
                        <ul>
                            <li><a href="#">css</a></li>
                            <li><a href="#">web design</a></li>
                            <li><a href="#">codepen</a></li>
                            <li><a href="https://twitter.com/russbeye">twitter</a></li>
                        </ul>
                    </div>
                </div>

                <div class="blog-footer">
                    <ul>
                        <li class="published-date">2 days ago</li>
                        <li class="comments"><a href="#"><svg class="icon-bubble"><use xlink:href="#icon-bubble"></use></svg><span class="numero">4</span></a></li>
                        <li class="shares"><a href="#"><svg class="icon-star"><use xlink:href="#icon-star"></use></svg><span class="numero">1</span></a></li>
                    </ul>
                </div>
            </div>

            <!-- another blog -->
            <div class="blog-container">
                <div class="blog-header">
                    <div class="blog-cover">
                        <div class="blog-author">
                            <h3>Russ Beye</h3>
                        </div>
                    </div>
                </div>

                <div class="blog-body">
                    <div class="blog-title">
                        <h1><a href="#">I Like To Make Cool Things</a></h1>
                    </div>
                    <div class="blog-summary">
                        <p>I love working on fresh designs that
                            <a href="https://www.youtube.com/watch?v=hANtM1vJvOo">breathe</a>.
                            To that end, I need to freshen up my portfolio here because
                            it does exactly the opposite. For the next month I will be working
                            almost exclusively on my portfolio. Sounds like a lot of fun!</p>
                    </div>
                    <div class="blog-tags">
                        <ul>
                            <li><a href="#">css</a></li>
                            <li><a href="#">web design</a></li>
                            <li><a href="#">codepen</a></li>
                            <li><a href="https://twitter.com/russbeye">twitter</a></li>
                        </ul>
                    </div>
                </div>

                <div class="blog-footer">
                    <ul>
                        <li class="published-date">2 days ago</li>
                        <li class="comments"><a href="#"><svg class="icon-bubble"><use xlink:href="#icon-bubble"></use></svg><span class="numero">4</span></a></li>
                        <li class="shares"><a href="#"><svg class="icon-star"><use xlink:href="#icon-star"></use></svg><span class="numero">1</span></a></li>
                    </ul>
                </div>
            </div>

            <!-- blog -->
            <div class="blog-container">
                <div class="blog-header">
                    <div class="blog-cover">
                        <div class="blog-author">
                            <h3>Russ Beye</h3>
                        </div>
                    </div>
                </div>

                <div class="blog-body">
                    <div class="blog-title">
                        <h1><a href="#">I Like To Make Cool Things</a></h1>
                    </div>
                    <div class="blog-summary">
                        <p>I love working on fresh designs that
                            <a href="https://www.youtube.com/watch?v=hANtM1vJvOo">breathe</a>.
                            To that end, I need to freshen up my portfolio here because
                            it does exactly the opposite. For the next month I will be working
                            almost exclusively on my portfolio. Sounds like a lot of fun!</p>
                    </div>
                    <div class="blog-tags">
                        <ul>
                            <li><a href="#">css</a></li>
                            <li><a href="#">web design</a></li>
                            <li><a href="#">codepen</a></li>
                            <li><a href="https://twitter.com/russbeye">twitter</a></li>
                        </ul>
                    </div>
                </div>

                <div class="blog-footer">
                    <ul>
                        <li class="published-date">2 days ago</li>
                        <li class="comments"><a href="#"><svg class="icon-bubble"><use xlink:href="#icon-bubble"></use></svg><span class="numero">4</span></a></li>
                        <li class="shares"><a href="#"><svg class="icon-star"><use xlink:href="#icon-star"></use></svg><span class="numero">1</span></a></li>
                    </ul>
                </div>
            </div>


            <footer class="footer">This footer will always be positioned at the bottom of the page, but <strong>not fixed</strong>
    </footer>
</div>
</body>
</html>