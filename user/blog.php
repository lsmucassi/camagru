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

<div id="page">
    <!-- The navigation bar -->
    <?php include('../headnfoot/header.php') ?>
    

    <!-- the whole page -->
    <div class="content">
        <!-- cam and post headers -->
        <div class="cam-head card">
            <h2>Camagru Cam</h2>
        </div>
        <div class="post-head card">
            <h2>Your posts </h2>
        </div>

        <!-- cam here -->
        <div class="cam card">
            <div class="camera">
                <video id="video"></video> 
                <!--<video id="img"></video>--> <!-- img -->
                <canvas id="canvas"></canvas> <!--canvas -->
               
            </div> 
         </div>

        <!-- captured pic -->
         <div class="captured card">
            <div class="inner">
                <canvas id="canvas_top_img" class="capture_canvas"></canvas>
                <canvas id="canvas_captured" class="capture_canvas"></canvas>
            </div>
        </div>
         
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
        
        <!-- the controls -->
        <div class="controls card">
            <a href="#" id="capture" title="Take Photo"><i class="material-icons">all_out</i></a>                
        </div>

         <!-- the controls2 -->
        <div class="controls2 card">
            <a href="#" id="delete-photo" title="Delete Photo" class="disabled"><i class="material-icons">delete</i></a>
            <a href="#" id="download-photo" download="selfie.png" title="Save Photo" class="disabled"><i class="material-icons">file_upload</i></a>                    
        </div>

        <!-- the merging pics -->
        <div class="merger card">
            <div class="card">
                 <img class="merges" id="filter_alien" src="../mergers/alien.png">
            </div>
            <div class="card">
                <img class="merges" id="filter_america_flg" src="../mergers/america_flg.png">
            </div>
            <div class="card">
                <img class="merges" onclick="do_merge}(this.src)" src="../mergers/boucles_mus.png">
            </div>
            <div class="card">
                <img class="merges" src="../mergers/fire_emoj.png">
            </div>
            <div class="card">
                <img class="merges" src="../mergers/heart_digi.png">
            </div>
            <div class="card">
                <img class="merges" src="../mergers/heart_one.png">
            </div>
            <div class="card">
                <img class="merges" src="../mergers/laugh.png">
            </div>
            <div class="card">
                <img class="merges" src="../mergers/nerd_glasses.png">
            </div>
        </div>
           <!-- the footer -->
    <?php include('../headnfoot/footer.php') ?> 
    </div>
  
   <script src="../wbscripts/capture.js"></script>
</div>
</body>
</html>