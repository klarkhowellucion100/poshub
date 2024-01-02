


<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Register | AgriHub POS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="icon.png">

    <!-- Bootstrap Css -->
    <link href="function/login2/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="function/login2/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="function/login2/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg" style="background:url(2.png) center center;">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="#" class="mb-5 d-block auth-logo">
                                <img src="hublogo.png" alt="" height="70" class="logo logo-dark">
                                <img src="hublogo.png" alt="" height="70" class="logo logo-light">
                            </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Register Now !</h5>
                                <p class="text-muted">Sign up to access the Volume Data Management System</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="post" action="registerprocess.php">

                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter username">
                                    </div>

                                    <div class="mb-3">
                                        <!--<div class="float-end">
                                            <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                        </div>-->
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="pword" name="pword" placeholder="Enter password">
                                    </div>

                                    <div class="mb-3">
                                        <!--<div class="float-end">
                                            <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                        </div>-->
                                        <label class="form-label" for="fname">Full Name</label>
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Full Name">
                                    </div>

                                    <div class="mb-3">
                                       
                                        <label class="form-label" for="position">Position</label>
                                        <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position">
                                    </div>

                                    <input style="display:none;" type="text" class="form-control" id="type" name="type" value="Employee">

                                    <!--<div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>-->

                                    <div class="mt-3 text-end">
                                        <input type="submit" name="submit" value="Sign Up"  class="btn btn-primary w-sm waves-effect waves-light">
                                    </div>



                                  <!--  <div class="mt-4 text-center">
                                        <div class="signin-other-title">
                                            <h5 class="font-size-14 mb-3 title">Sign in with</h5>
                                        </div>


                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="javascript:void()" class="social-list-item bg-primary text-white border-primary">
                                                        <i class="mdi mdi-facebook"></i>
                                                    </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:void()" class="social-list-item bg-info text-white border-info">
                                                        <i class="mdi mdi-twitter"></i>
                                                    </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:void()" class="social-list-item bg-danger text-white border-danger">
                                                        <i class="mdi mdi-google"></i>
                                                    </a>
                                            </li>
                                        </ul>
                                    </div>-->

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Don't have an account ? <a href="login.php" class="fw-medium text-primary"> Sign In now </a> </p>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <p>©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> OCEE. Crafted with <i class="mdi mdi-heart text-danger"></i> by CAgO</p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="function/login2/assets/libs/jquery/jquery.min.js"></script>
    <script src="function/login2/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="function/login2/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="function/login2/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="function/login2/assets/libs/node-waves/waves.min.js"></script>
    <script src="function/login2/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="function/login2/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

    <!-- App js -->
    <script src="function/login2/assets/js/app.js"></script>

</body>

</html>