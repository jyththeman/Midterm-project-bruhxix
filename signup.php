<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign Up | Photo Share Community</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login to Photo Share Community</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <fieldset>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name" required="required">
                                </div><br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" required="required">
                                </div><br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="password" type="password" class="form-control" placeholder="Password" name="u_pass" required="required">
                                </div><br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="email" type="email" class="form-control" placeholder="Email" name="u_email" required="required">
                                </div><br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
                                    <select class="form-control" name="u_country" required="required">
                                        <option disabled>Select your Country</option>
                                        <option>Pakistan</option>
                                        <option>United States of America</option>
                                        <option>India</option>
                                        <option>Japan</option>
                                        <option>UK</option>
                                        <option>France</option>
                                        <option>Germany</option>
                                    </select>
                                </div><br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
                                    <select class="form-control input-md" name="u_gender" required="required">
                                        <option disabled>Select your Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Others</option>
                                    </select>
                                </div><br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input type="date" class="form-control input-md" placeholder="Email" name="u_birthday" required="required">
                                </div><br>
                                <div class="form-group">
                                    <a href="index.php" class="">Already have an Account?</a>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button id="signup" class="btn btn-outline btn-success btn-lg btn-block" name="sign_up">Sign up</button>
                            </fieldset>
                            <?php include("insert_user.php"); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>