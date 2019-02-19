<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>PHOTO SHARE COMMUNITY</title>
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

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>

<body class="pace-top bg-white">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url(assets/img/login-bg/login-bg-11.jpg)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>Photo Share</b> Community</h4>
                    <p>
                        The Online Photography Gallery
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <center><b>Photo Share</b> Community</center>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <form action="" method="post">
                        <div class="form-group m-b-15">
                            <span id="username-status"></span>
                            <input type="email" class="form-control form-control-lg" placeholder="Email Address" name="email" id="chk_uname" autofocus required />
                        </div>
                        <div class="form-group m-b-15">
                            <input type="password" class="form-control form-control-lg" placeholder="Password" name="pass" required />
                        </div>
                        <div class="login-buttons">
                            <button id="signin" name="login" type="submit" class="btn btn-primary btn-block btn-lg">Sign in</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            Not a member yet? Click <a href="signup.php" class="text-success">here</a> to register.
                        </div>
                        <hr />
                        <p class="text-center text-grey-darker">
                            &copy; BRUHXIX All Right Reserved 2019
                        </p>
                        <?php include("login.php"); ?>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->

    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
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

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#chk_uname').on('keyup', function() {
                $uname = $('#chk_uname').val();
                if ($uname == "") {
                    $('#username-status').html("<span class='label label-warning'>Please fill this area</span>");
                    $('#signin').attr("disabled", true);
                } else {
                    $.ajax({
                        type: 'post',
                        url: 'parsers.php',
                        data: {
                            send_uname: $uname
                        },
                        success: function(data) {
                            if (data == "ok") {
                                $('#signin').attr("disabled", true);
                                $('#username-status').html("<span class='label label-danger'>Email does not exist in database</span>");
                            } else {
                                $('#signin').attr("disabled", false);
                                $('#username-status').html("");
                            }
                        }
                    });
                }
            });
        });
    </script>
    <script>
        window.onload = () => {
            let el = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
            el.parentNode.removeChild(el);
        }
    </script>
</body>

</html>