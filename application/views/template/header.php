<?php
$email = $_SESSION['email'];
$row =  $this->db->where("email", $email)->get("user")->row_array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRM - Adsite.id</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url("assets/images/logo/favicon.png") ?>">

    <!-- Core css -->
    <link href="<?= base_url("assets/css/app.min.css") ?>" rel="stylesheet">

    <!-- page css -->
    <link href="<?= base_url("assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css") ?>" rel="stylesheet">

    <!-- data table css -->
    <link href="<?= base_url("assets/vendors/datatables/dataTables.bootstrap.min.css") ?>" rel="stylesheet">

    <style>
        .list:hover {
            background-color: #f9fafb;
        }

        .fab {
            background-color: transparent;
            height: 50px;
            width: 50px;
            border-radius: 32px;
            transition: height 300ms;
            transition-timing-function: ease;
            position: fixed;
            right: 30px;
            bottom: 30px;
            /* tinggi tombol */
            text-align: center;
            overflow: hidden;
            z-index: 10;
        }

        .fab:hover {
            height: 150px;
            /* tinggi icon muncul */
        }

        .fab:hover .mainop {
            transform: rotate(180deg);
        }

        .mainop {
            margin: auto;
            width: 50px;
            height: 50px;
            position: absolute;
            bottom: 0;
            right: 0;
            transition: transform 300ms;
            background-color: #5d77c5;
            border-radius: 100px;
            z-index: 6;
        }



        .mainop i {
            margin-top: 10px;
            font-size: 32px;
            color: #fff;
        }

        .minifab {
            position: relative;
            width: 48px;
            height: 48px;
            border-radius: 24px;
            z-index: 5;
            background-color: blue;
            transition: box-shadow 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }



        .op {
            background-color: #5d77c5;
        }
    </style>


</head>

<body>
    <div class="app is-folded">
        <div class="layout">
            <!--
        ##########################################################################################
        ### HEADER START  
        ##########################################################################################
        -->
            <div class="header">
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
                        <img src="<?= base_url("assets/images/logo/logo-white.png") ?>" alt="Logo">
                        <img class="logo-fold" src="<?= base_url("assets/images/logo/klikdigitalmedia/kdm-02.png") ?>" alt="Logo" style="width:60px;">
                    </a>
                </div>
                <div class="nav-wrap">

                    <ul class="nav-left">

                        <img src="<?= base_url("assets/images/logo/adsite/logo.png") ?>" alt="logo" width="150px">
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
                                            <p class="m-b-0 text-dark font-weight-semibold"><?php echo $row['name']; ?></p>
                                            <p class="m-b-0 opacity-07"><?php echo $row['level']; ?></p>
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
            <!--
        ##########################################################################################
        ### HEADER END  
        ##########################################################################################
        -->

            <!--
        ##########################################################################################
        ### NAVBAR DESKTOP START
        ##########################################################################################
        -->
            <div class="side-nav text-white" style="background:#5d77c5;">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item dropdown mt-4 mb-1">
                            <a href="index.php">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore font-size-20"></i>
                                </span>
                                <span class="title">Home</span>
                            </a>

                        </li>
                        <li class="nav-item dropdown mb-1"> <!-- open -->
                            <a href="<?= base_url("new_leads") ?>">
                                <span class="icon-holder">
                                    <i class="anticon anticon-idcard font-size-20"></i>
                                </span>
                                <span class="title">Leads</span>
                            </a>

                        </li>
                        <!--
                    <li class="nav-item dropdown mb-1">
                        <a href="">
                            <span class="icon-holder">
                                <i class="anticon anticon-schedule font-size-20"></i>
                            </span>
                            <span class="title">Task/Schedule</span>
                        </a>
                    </li>
                    -->
                        <li class="nav-item dropdown mb-1">
                            <a href="report.php">
                                <span class="icon-holder">
                                    <i class="anticon anticon-pie-chart font-size-20"></i>
                                </span>
                                <span class="title">Report</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown mb-1">
                            <a href="account.php">
                                <span class="icon-holder">
                                    <i class="anticon anticon-team font-size-20"></i>
                                </span>
                                <span class="title">Account</span>
                            </a>
                        </li>
                        <!--
                    <li class="nav-item dropdown mb-1">
                        <a href="">
                            <span class="icon-holder">
                                <i class="anticon anticon-appstore font-size-20"></i>
                            </span>
                            <span class="title">CMS</span>
                        </a>
                    </li>
                    -->
                        <li class="nav-item dropdown mb-1">
                            <a href="profile.php?id=<?php echo $row['id']; ?>">
                                <span class="icon-holder">
                                    <i class="anticon anticon-setting font-size-20"></i>
                                </span>
                                <span class="title">Setting</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!--
        ##########################################################################################
        ### NAVBAR DESKTOP END
        ##########################################################################################
        -->

            <!--
        ##########################################################################################
        ### NAVBAR MOBILE START  
        ##########################################################################################
        -->
            <nav class=" bg-white fixed-bottom p-4 d-lg-none d-block">
                <div class="container-fluid">

                    <div class="row d-flex">

                        <a href="index.php" class="col">
                            <span class="icon-holder">
                                <i class="anticon anticon-appstore font-size-20"></i>
                            </span>
                        </a>
                        <a href="report.php" class="col">
                            <span class="icon-holder">
                                <i class="anticon anticon-pie-chart font-size-20"></i>
                            </span>
                        </a>
                        <a href="leads.php" class="col" type="button" data-toggle="modal" data-target="#add_leads">
                            <span class="icon-holder rounded-circle position-static mb-5 p-2 p-h-10" style="background-color:#5d77c5">
                                <i class="anticon anticon-plus font-size-15   text-white "></i>
                            </span>
                        </a>
                        <a href="leads.php" class="col">
                            <span class="icon-holder">
                                <i class="anticon anticon-idcard font-size-20"></i>
                            </span>
                        </a>

                        <a href="account.php" class="col">
                            <span class="icon-holder">
                                <i class="anticon anticon-team font-size-20"></i>
                            </span>
                        </a>

                    </div>

                </div>
            </nav>
            <!--
        ##########################################################################################
        ### NAVBAR MOBILE END  
        ##########################################################################################
        -->

            <div class="page-container">
                <div class="main-content">