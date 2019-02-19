<!DOCTYPE html>
<?php
session_start();
include("sidebar.php");
if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>

<head>
    <?php
		$user = $_SESSION['user_email'];
		$get_user = "select * from users where user_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);
		$user_name = $row['user_name'];
	?>
    <title>
        <?php echo $first_name . " " . " " . $last_name ?> | PHOTO SHARE COMMUNITY</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
    <link href="assets/plugins/animate/animate.min.css" rel="stylesheet" />
    <link href="assets/css/default/style.min.css" rel="stylesheet" />
    <link href="assets/css/default/style-responsive.min.css" rel="stylesheet" />
    <link href="assets/css/default/theme/blue.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
    <link href="assets/plugins/superbox/css/superbox.min.css" rel="stylesheet" />
    <link href="assets/plugins/lity/dist/lity.min.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->
    <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
    <link href="../assets/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet" />
    <link href="../assets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" />
    <link href="../assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->
    <link href="assets/plugins/isotope/isotope.css" rel="stylesheet" />
    <link href="assets/plugins/lightbox/css/lightbox.css" rel="stylesheet" />
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>

<body>
    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <!-- begin #header -->
        <div id="header" class="header navbar-default">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <a href="home.php" class="navbar-brand"><span class="navbar-logo"></span> <b>Photo Share</b> Community</a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end navbar-header -->

            <!-- begin header-nav -->
            <ul class="navbar-nav navbar-right">
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="users/<?php echo $user_image ?>" class='img-circle' width='100px' height='100px' alt="" />
                        <span class="d-none d-md-inline">
                            <?php echo $first_name . " " . " " . $last_name ?></span> <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href='profile.php?<?php echo "u_id=$user_id" ?>' class="dropdown-item">Edit Pofile</a>
                        <a href="logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end #header -->

        <!-- begin #content -->
        <div id="content" class="content content-full-width">
            <!-- begin profile -->
            <div class="profile">
                <div class="profile-header">
                    <!-- BEGIN profile-header-cover -->
                    <div class="profile-header-cover"></div>
                    <!-- END profile-header-cover -->
                    <!-- BEGIN profile-header-content -->
                    <div class="profile-header-content">
                        <!-- BEGIN profile-header-img -->
                        <div class="profile-header-img">
                            <img src="users/<?php echo $user_image ?>" class='img-square' width='200px' height='150' alt="">
                        </div>
                        <!-- END profile-header-img -->
                        <!-- BEGIN profile-header-info -->
                        <div class="profile-header-info">
                            <h4 class="m-t-10 m-b-5">
                                <?php echo $first_name . " " . " " . $last_name ?>
                            </h4>
                            <p class="m-b-10">
                                <?php echo $user_country ?>
                            </p>
                            <form action="profile.php?u_id='$user_id" method='post' enctype='multipart/form-data'>
                                <div class="row fileupload-buttonbar">
                                    <div class="col-md-7">
                                        <span class="btn btn btn-xs btn-success fileinput-button m-r-3">
                                            <i class="fa fa-plus"></i>
                                            <span>Select Profile</span>
                                            <input type="file" name="u_image" size="60" multiple>
                                        </span>
                                        <button id='button_profile' name='update' class="btn btn-xs btn-yellow">Update Profile</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- END profile-header-info -->
                        <!-- begin profile-content -->
                    </div>
                    <!-- END profile-header-content -->
                    <!-- BEGIN profile-header-tab -->
                    <ul class="profile-header-tab nav nav-tabs">
                        <li class="nav-item"><a href="#profile-post" class="nav-link active" data-toggle="tab">POSTS</a></li>
                        <li class="nav-item"><a href="#profile-about" class="nav-link" data-toggle="tab">ABOUT</a></li>
                    </ul>
                    <!-- END profile-header-tab -->
                </div>
            </div>
            <!-- end profile -->
        </div>
        <div class="profile-content">
            <!-- begin tab-content -->
            <div class="tab-content p-0">
                <!-- begin #profile-about tab -->
                <div class="tab-pane fade in" id="profile-about" style="margin-left:500px">
                    <!-- begin table -->
                    <div class="table-responsive">
                        <table class="table table-profile">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        <h4>
                                            <?php echo $first_name . " " . " " . $last_name ?> <small>
                                                <?php echo $describe_user ?></small></h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="field">Relationship Status: </td>
                                    <td>
                                        <h6>
                                            <?php echo $Relationship_status ?>
                                        </h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Lives In: </td>
                                    <td>
                                        <h6>
                                            <?php echo $user_country ?>
                                        </h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Member Since: </td>
                                    <td>
                                        <h6>
                                            <?php echo $register_date ?>
                                        </h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Gender: </td>
                                    <td>
                                        <h6>
                                            <?php echo $user_gender ?>
                                        </h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Date of Birth: </td>
                                    <td>
                                        <h6>
                                            <?php echo  $user_birthday ?>
                                        </h6>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table -->
                </div>
                <!-- end #profile-about tab -->
                <?php
        global $con;
        
        if (isset($_GET['u_id'])){
            $u_id = $_GET['u_id'];
        }
        
        $get_posts = "select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";
        
        $run_posts = mysqli_query($con, $get_posts);
     
        
        while ($row_posts = mysqli_fetch_array($run_posts)) {
            
            $post_id = $row_posts['post_id'];
            $user_id = $row_posts['user_id'];
            $content = $row_posts['post_content'];
            $upload_image = $row_posts['upload_image'];
            $post_date = $row_posts['post_date'];
            
            $user = "select * from users where user_id='$user_id' AND posts='yes'";
              
            $run_user = mysqli_query($con, $user);
            $row_user = mysqli_fetch_array($run_user);
            
            $user_name = $row_user['user_name'];
            $user_image = $row_user['user_image'];
            
            
            if($content == "No" && strlen($upload_image) >= 1){
               ?>
                <!-- begin #profile-post tab -->
                <div class="tab-pane fade show active" id="profile-post">
                    <!-- begin timeline -->
                    <ul class="timeline" style="margin-left:200px">
                        <li>
                            <!-- begin timeline-time -->
                            <div class="timeline-time">
                                <span class="time">
                                    <?php echo $post_date ?></span>
                            </div>
                            <!-- end timeline-time -->
                            <!-- begin timeline-icon -->
                            <div class="timeline-icon">
                                <a href="javascript:;">&nbsp;</a>
                            </div>
                            <!-- end timeline-icon -->
                            <!-- begin timeline-body -->
                            <div class="timeline-body">
                                <div class="timeline-header">
                                    <span class="userimage"><img src="users/<?php echo $user_image ?>" class='img-circle' width='50px' height='40px' /></span>
                                    <span class="username"><a href="javascript:;">
                                            <?php echo $first_name . " " . " " . $last_name?></a> <small></small></span>
                                    <span class="pull-right text-muted">PHOTO SHARE COMMUNITY</span>
                                </div>
                                <div class="timeline-content">
                                    <center>
                                        <div id="gallery" class="gallery">
                                            <!-- begin image -->
                                            <div class="image gallery-group-1">
                                                <div class="image-inner">
                                                    <a href="imagepost/<?php echo $upload_image ?>" data-lightbox="gallery-group-1">
                                                        <img src="imagepost/<?php echo $upload_image ?>" alt="" />
                                                    </a>
                                                    <br>
                                                </div>
                                            </div>
                                            <!-- end image -->
                                        </div>
                                    </center>
                                </div>
                                <div class="timeline-comment-box">
                                    <div class="user"><img src="users/<?php echo $user_image ?>" class='img-circle' width='100px' height='100px' />
                                    </div>
                                    <div class="input">
                                        <form action="">
                                            <div class="input-group">
                                                <input type="text" class="form-control rounded-corner" placeholder="Write a comment..." />
                                                <span class="input-group-btn p-l-10">

                                                    <a href="functions/delete_post.php?post_id=$post_id" style="float:right;">
                                                        <button class="btn btn-danger f-s-12 rounded-corner" type="button">Delete</button></a>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end timeline-body -->
                        </li>
                    </ul>
                </div>
                <?php
            }

           else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
               ?>

                <!-- begin #profile-post tab -->
                <div class="tab-pane fade show active" id="profile-post">
                    <!-- begin timeline -->
                    <ul class="timeline" style="margin-left:200px">
                        <li>
                            <!-- begin timeline-time -->
                            <div class="timeline-time">
                                <span class="time">
                                    <?php echo $post_date ?></span>
                            </div>
                            <!-- end timeline-time -->
                            <!-- begin timeline-icon -->
                            <div class="timeline-icon">
                                <a href="javascript:;">&nbsp;</a>
                            </div>
                            <!-- end timeline-icon -->
                            <!-- begin timeline-body -->
                            <div class="timeline-body">
                                <div class="timeline-header">
                                    <span class="userimage"><img src="users/<?php echo $user_image ?>" class='img-circle' width='50px' height='40px' /></span>
                                    <span class="username"><a href="javascript:;">
                                            <?php echo $first_name . " " . " " . $last_name?></a> <small></small></span>
                                    <span class="pull-right text-muted">PHOTO SHARE COMMUNITY</span>
                                </div>
                                <div class="timeline-content">
                                    <center>
                                        <div id="gallery" class="gallery">
                                            <!-- begin image -->
                                            <div class="image gallery-group-1">
                                                <div class="image-inner">
                                                    <a href="imagepost/<?php echo $upload_image ?>" data-lightbox="gallery-group-1">
                                                        <img src="imagepost/<?php echo $upload_image ?>" alt="" />
                                                    </a>
                                                    <br>
                                                </div>
                                            </div>
                                            <!-- end image -->
                                        </div>
                                        <p>
                                            <?php echo $content ?>
                                        </p>
                                    </center>
                                </div>
                                <div class="timeline-comment-box">
                                    <div class="user"><img src="users/<?php echo $user_image ?>" class='img-circle' width='100px' height='100px' />
                                    </div>
                                    <div class="input">
                                        <form action="">
                                            <div class="input-group">
                                                <input type="text" class="form-control rounded-corner" placeholder="Write a comment..." />
                                                <span class="input-group-btn p-l-10">
                                                    <a href="functions/delete_post.php?post_id=$post_id" style="float:right;">
                                                        <button class="btn btn-danger f-s-12 rounded-corner" type="button">Delete</button></a>

                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end timeline-body -->
                        </li>
                    </ul>
                </div>
                <?php
            }
            
            
            else{
           
                
                global $con;
                
                
                if(isset($_GET['u_id'])){
                    $u_id = $_GET['u_id'];
                }
                
                $get_posts = "select user_email from users where user_id='$u_id'";
                $run_user = mysqli_query($con, $get_posts);
                $row = mysqli_fetch_array($run_user);
                
                $user_email = $row['user_email'];
                
                $user = $_SESSION['user_email'];
                $get_user = "select * from users where user_email='$user'";
                $run_user = mysqli_query($con, $get_user);
                $row = mysqli_fetch_array($run_user);
                
                $user_id = $row['user_id'];
                $u_email = $row['user_email'];
                if($u_email != $user_email){
                    echo "<script>window.open('profile.php?u_id=user_id', '_self')</script>";
                }else{
                   ?>
                <!-- begin #profile-post tab -->
                <div class="tab-pane fade show active" id="profile-post">
                    <!-- begin timeline -->
                    <ul class="timeline" style="margin-left:200px">
                        <li>
                            <!-- begin timeline-time -->
                            <div class="timeline-time">
                                <span class="time">
                                    <?php echo $post_date ?></span>
                            </div>
                            <!-- end timeline-time -->
                            <!-- begin timeline-icon -->
                            <div class="timeline-icon">
                                <a href="javascript:;">&nbsp;</a>
                            </div>
                            <!-- end timeline-icon -->
                            <!-- begin timeline-body -->
                            <div class="timeline-body">
                                <div class="timeline-header">
                                    <span class="userimage"><img src="users/<?php echo $user_image ?>" class='img-circle' width='50px' height='40px' /></span>
                                    <span class="username"><a href="javascript:;">
                                            <?php echo $first_name . " " . " " . $last_name?></a> <small></small></span>
                                    <span class="pull-right text-muted">PHOTO SHARE COMMUNITY</span>
                                </div>
                                <div class="timeline-content">
                                    <center>
                                        <p>
                                            <?php echo $content ?>
                                        </p>
                                    </center>
                                </div>
                                <div class="timeline-comment-box">
                                    <div class="user"><img src="users/<?php echo $user_image ?>" class='img-circle' width='100px' height='100px' />
                                    </div>
                                    <div class="input">
                                        <form action="">
                                            <div class="input-group">
                                                <input type="text" class="form-control rounded-corner" placeholder="Write a comment..." />
                                                <span class="input-group-btn p-l-10">

                                                    <a href="functions/delete_post.php?post_id=$post_id" style="float:right;">
                                                        <button class="btn btn-danger f-s-12 rounded-corner" type="button">Delete</button></a>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end timeline-body -->
                        </li>
                    </ul>
                </div>
                <?php
                }
            }
            include("functions/delete_post.php");
        }
        
        ?>
            </div>
        </div>
        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <?php
		if(isset($_POST['update'])){
				$u_image = $_FILES['u_image']['name'];
				$image_tmp = $_FILES['u_image']['tmp_name'];
				if($u_image==''){
					echo "<script>alert('Please Select Profile Image on clicking on your profile image')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					exit();
				}else{
					move_uploaded_file($image_tmp, "users/$u_image");
					$update = "update users set user_image='$u_image' where user_id='$user_id'";
					$run = mysqli_query($con, $update);
					if($run){
					echo "<script>alert('Your Profile Updated')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					}
				}
			}
	?>
</body>

</html>
<!--==================BEGIN BASE JS==================-->
<script src="assets/plugins/jquery/jquery-3.2.1.min.js"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/plugins/js-cookie/js.cookie.js"></script>
<script src="assets/js/theme/default.min.js"></script>
<script src="assets/js/apps.min.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script src="assets/plugins/superbox/js/jquery.superbox.min.js"></script>
<script src="assets/plugins/lity/dist/lity.min.js"></script>
<script src="assets/js/demo/profile.demo.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="../assets/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="../assets/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>
<script src="../assets/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>
<script src="../assets/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
<script src="../assets/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js"></script>
<script src="../assets/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<script src="../assets/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<script src="../assets/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
<script src="../assets/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
<script src="../assets/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
<script src="../assets/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
<script src="../assets/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
<script src="../assets/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
<script src="assets/plugins/isotope/jquery.isotope.min.js"></script>
<script src="assets/plugins/lightbox/js/lightbox.min.js"></script>
<!--[if (gte IE 8)&(lt IE 10)]>
        <script src="../assets/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
    <![endif]-->
<script src="../assets/js/demo/form-multiple-upload.demo.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        Profile.init();
        FormMultipleUpload.init();
        Gallery.init();

    });
</script>
<script>
    window.onload = () => {
        let el = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
        el.parentNode.removeChild(el);
    }
</script>