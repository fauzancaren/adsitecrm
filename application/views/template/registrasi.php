<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRM - Adsite.id</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url("assets/images/logo/adsite/logo_adsite.png") ?>" type="img/png">

    <!-- page css -->

    <!-- Core css -->
    <link href="<?= base_url("assets/css/app.min.css") ?>" rel="stylesheet">
	<link href="<?= base_url("assets/sweetalert/dist/sweetalert2.min.css") ?>" rel="stylesheet" type="text/css"> 

	<script src="<?= base_url("assets/sweetalert/dist/sweetalert2.all.min.js") ?>"></script> 
</head>

<body>
    <div class="app">
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters h-100 full-height">
                <div class="col-lg-4 d-none d-lg-flex bg" style="background-image:url('<?= base_url("assets/images/others/bg-login2.jpg") ?>')">
                    <div class="d-flex h-100 p-h-40 p-v-15 flex-column justify-content-between">
                        <div>

                            <!-- <img src="assets/images/logo/logo-white.png" alt=""> -->
                        </div>
                        <div>

                            <h1 class="text-white m-b-20 font-weight-bold">ADSITE CRM</h1>
                            <p class="text-white font-size-16 lh-2 w-80 opacity-08">Jangkau lebih banyak customer dari berbagai platform dan kelola leads dengan mudah di ADSITE CRM</p>

                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-white mr-1">©crm.adsite.id</span>
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
                                <h2>Sign Up</h2>
                                <p class="m-b-30">Registrasi baru</p>
                                <div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="userName">Username:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon anticon anticon-user"></i>
                                            <input type="text" class="form-control" id="username" name="email" placeholder="username">
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
                                            <div class="col p-0">
                                                <button class="btn btn-primary col" id="submit">Sign Up</button>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="font-size-13 text-muted mb-3 d-flex justify-content-center align-items-center">
                                        Already have an account
                                        <a class="small ml-1 " href="<?= base_url("login/checkout")?>">Log In</a>
                                    </span>
                                    <span class="font-size-13 d-flex justify-content-center align-items-center mt-2 " style="color : red;" id="message"></span>
                                </div>
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
    <script>
        $("#username").keyup(function(event) {
            if (event.keyCode === 13) {
                $("#password").focus();
            }
        });
        $("#password").keyup(function(event) {
            if (event.keyCode === 13) {
                $("#submit").click();
            }
        });
        $('#submit').on('click', function() {  
            $(this).html('<i class="fas fa-circle-notch fa-spin"></i> Loading');
            $.ajax({
                method: "POST",
                url: "<?php echo site_url('login/check_login') ?>",
                data: {
                    'email': $("#username").val(),
                    'password': $("#password").val()
                },
                success: function(data) {
                    console.log(data);
                    $("#message").html(data.message); 
                    $("#submit").html('Sign In');
                    if (data.status == '5') {
                        // Swal.fire({
                        //     showClass: {
                        //         popup: 'animate__animated animate__zoomInUp', 
                        //     }, 
                        //     hideClass: {
                        //         popup: 'animate__animated fadeOutUp animate__zoomOutDown',
                        //     },
                        //     icon: 'success',
                        //     title: 'Login Success',
                        //     showConfirmButton: false,
                        //     timer: 1500,
                        // }).then((result) => {
                        //     if (result.dismiss === Swal.DismissReason.timer) {
                                window.location.replace('<?= site_url(); ?>');
                        //     }
                        // }) 
                    }
                }
            });
        })
    </script>
</body>

</html>