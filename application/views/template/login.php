<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRM - KLIK DIGITAL MEDIA</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url("assets/images/logo/favicon.png")?>">

    <!-- page css -->

    <!-- Core css -->
    <link href="<?= base_url("assets/css/app.min.css")?>" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters h-100 full-height">
                <div class="col-lg-4 d-none d-lg-flex bg" style="background-image:url('<?= base_url("assets/images/others/bg-login.jpg")?>')">
                    <div class="d-flex h-100 p-h-40 p-v-15 flex-column justify-content-between">
                        <div>

                            <!-- <img src="assets/images/logo/logo-white.png" alt=""> -->
                        </div>
                        <div>
                            <!--
                            <h1 class="text-white m-b-20 font-weight-normal">Exploring Enlink</h1>
                            <p class="text-white font-size-16 lh-2 w-80 opacity-08">Climb leg rub face on everything give attitude nap all day for under the bed. Chase mice attack feet but rub face on everything hopped up.</p>
                            -->
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-white mr-1">©2023 klikdigitalmedia</span>
                            <ul class="list-inline ">
                                <li class="list-inline-item">
                                    <a class="text-white text-link" href="">Legal</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-white text-link" href="">Privacy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 bg-white">
                    <div class="container h-100">
                        <div class="row no-gutters h-100 align-items-center">
                            <div class="col-md-8 col-lg-7 col-xl-6 mx-auto px-5">
                                <h2>Sign In</h2>
                                <p class="m-b-30">Enter your credential to get access</p>
                                <form action="<?= base_url("login/check_login") ?>" method="post">
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="userName">Username:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon anticon anticon-user"></i>
                                            <input type="text" class="form-control" id="userName" name="email" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">Password:</label>
                                        <!-- <a class="float-right font-size-13 text-muted" href="">Forget Password?</a> -->
                                        <div class="input-affix m-b-10">
                                            <i class="prefix-icon anticon anticon-lock"></i>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="font-size-13 text-muted">
                                                <span class="d-flex justify-content-center" style="color : red;"> <?= $error ?></span>
                                                <!--  Don't have an account? 
                                                <a class="small" href=""> Signup</a>
                                                 -->
                                            </span>

                                            <button class="btn btn-primary">Sign In</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Vendors JS -->
    <script src="<?= base_url("assets/js/vendors.min.js") ?>"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="<?= base_url("assets/js/app.min.js") ?>"></script>

</body>

</html>