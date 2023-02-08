<?php


// long long time

$expire = 365 * 24 * 3600; // We choose a one year duration

ini_set('session.cookie_lifetime', $expire);
ini_set('session.gc_maxlifetime', $expire);

session_start(); //We start the session 

setcookie(session_name(), session_id(), time() + $expire);
//Set a session cookies to the one year duration


// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:login.php");
} elseif ($_SESSION['level'] == "Leader") {
    header("location:leader/");
} elseif ($_SESSION['level'] == "Sales") {
    header("location:sales/");
} elseif ($_SESSION['level'] == "GM") {
    header("location:gm/");
}

require './process/db_config.php';

$email = $_SESSION['email'];

$data = mysqli_query($conn, " SELECT * FROM user WHERE email='$email' ");
$fetch = mysqli_fetch_assoc($data);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRM - Adsite.id</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="document/logo/adsite/logo.png">

    <!-- page css -->
    <link href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- data table css -->
    <link href="assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">



    <style>
        .list:hover {
            background-color: #f9fafb;
        }
    </style>

</head>

<body>
    <div class="app is-folded">
        <div class="layout">
            <!-- Header START -->
            <div class="header ">
                <div class="logo logo-dark justify-content-center align-items-center p-2 pt-3  ">
                    <div class="nav-wrap ">
                        <ul class="nav-left">
                            <li class="desktop-toggle">
                                <a href="javascript:void(0);">
                                    <i class="anticon anticon-left"></i>
                                </a>
                            </li>
                            <li class="mobile-toggle">
                                <a href="javascript:void(0);">
                                    <i class="anticon anticon-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="logo logo-white justify-content-center align-items-center">
                    <a href="index.html">
                        <img src="assets/images/logo/logo-white.png" alt="Logo">
                        <img class="logo-fold" src="document/logo/klikdigitalmedia/kdm-02.png" alt="Logo" style="width:60px;">
                    </a>
                </div>
                <div class="nav-wrap">

                    <ul class="nav-left">

                        <img src="document/logo/adsite/logo.png" alt="logo" width="150px">
                        <!--
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon anticon-left"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon anticon-right"></i>
                            </a>
                        </li>
                        -->

                    </ul>
                    <ul class="nav-right">

                        <li class="mr-lg-5">
                            <div>
                                <form action="search_leads.php" method="get" class=" d-none d-sm-inline-block form-inline  ">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm bg-light " placeholder="Search leads..." aria-label="Search" aria-describedby="basic-addon2" name="search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary " type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);" data-toggle="dropdown">
                                <i class="anticon anticon-bell notification-badge"></i>
                            </a>
                            <div class="dropdown-menu pop-notification">
                                <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                                    <p class="text-dark font-weight-semibold m-b-0">
                                        <i class="anticon anticon-bell"></i>
                                        <span class="m-l-10">Notification</span>
                                    </p>
                                    <a class="btn-sm btn-default btn" href="javascript:void(0);">
                                        <small>View All</small>
                                    </a>
                                </div>
                                <div class="relative">
                                    <div class="overflow-y-auto relative scrollable" style="max-height: 300px; ">
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-blue avatar-icon">
                                                    <i class="anticon anticon-mail"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">You </p>
                                                    <p class="m-b-0"><small>8 min ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-cyan avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">New user registered</p>
                                                    <p class="m-b-0"><small>7 hours ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-red avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">System Alert</p>
                                                    <p class="m-b-0"><small>8 hours ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 ">
                                            <div class="d-flex">
                                                <div class="avatar avatar-gold avatar-icon ">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">You have </p>
                                                    <p class="m-b-0"><small>2 days ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);" data-toggle="dropdown">
                                <i class="anticon anticon-user notification-badge"></i>
                            </a>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <i class="anticon anticon-user"></i>
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold"><?php echo $fetch['name']; ?></p>
                                            <p class="m-b-0 opacity-07"><?php echo $fetch['level']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                            <span class="m-l-10">Edit Profile</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                            <span class="m-l-10">Account Setting</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-project"></i>
                                            <span class="m-l-10">Projects</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a type="button" class="dropdown-item d-block p-h-15 p-v-10" data-toggle="modal" data-target="#modal_logout">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Logout</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>

                            </div>
                        </li>
                        <!--
                        <li>
                            <a href="/process/logout.php" data-toggle="modal" data-target="#quick-view">
                                <i class="anticon anticon-appstore"></i>
                            </a>
                        </li>
                        -->
                    </ul>
                </div>
            </div>
            <!-- Header END -->