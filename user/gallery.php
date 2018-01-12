<?php
    require_once('../load.php');

    if (empty($_COOKIE['camlogauth'])){
        $c->checkLogin();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../wbstyles/blogstyle.css">
    <link rel="stylesheet" type="text/css" href="../wbstyles/camstyle.css">
    <meta charset="UTF-8">
    <title>Camagru | Home_ </title>
    <script src="../wbscripts/blogscript.js"></script>
</head>
<body>
    
      <!-- The navigation bar -->
      <?php include('../headnfoot/header.php') ?>
    
     <!-- the posts -->
     <div class="posts card">
            <!-- the posts aside with calls="sidebar" ->
            <div class="">
                <!- blog -->
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
                            <div>
                                <textarea rows="10" name="comment" id="comment" placeholder="Comment"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="blog-footer">
                        <ul>
                            <li class="published-date">2 days ago</li>
                            <li class="comments"><a href="#"><svg class="icon-bubble"><use xlink:href="#icon-bubble"></use></svg><span class="numero">4</span></a></li>
                      </ul>
                    </div>
                </div>
                <!-- some blog -->
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
                            <div>
                                <textarea rows="10" name="comment" id="comment" placeholder="Comment"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="blog-footer">
                        <ul>
                            <li class="published-date">2 days ago</li>
                            <li class="comments"><a href="#"><svg class="icon-bubble"><use xlink:href="#icon-bubble"></use></svg><span class="numero">4</span></a></li>
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
                             <div>
                                <textarea rows="10" name="comment" id="comment" placeholder="Comment"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="blog-footer">
                        <ul>
                            <li class="published-date">2 days ago</li>
                            <li class="comments"><a href="#"><svg class="icon-bubble"><use xlink:href="#icon-bubble"></use></svg><span class="numero">4</span></a></li>
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
                             <div>
                                <textarea rows="10" name="comment" id="comment" placeholder="Comment"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="blog-footer">
                        <ul>
                            <li class="published-date">2 days ago</li>
                            <li class="comments"><a href="#"><svg class="icon-bubble"><use xlink:href="#icon-bubble"></use></svg><span class="numero">4</span></a></li>
                        </ul>
                    </div>
                </div> 
            <!-- </div> -->
        </div>