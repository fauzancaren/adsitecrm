
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
    <link rel="shortcut icon" href="<?= base_url("assets/images/logo/favicon.png")?>">

    <!-- Core css -->
    <link href="<?= base_url("assets/css/app.min.css")?>" rel="stylesheet"> 
    
    <!-- page css -->
    <link href="<?= base_url("assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css")?>" rel="stylesheet">

    <!-- data table css -->
    <link href="<?= base_url("assets/vendors/datatables/dataTables.bootstrap.min.css")?>" rel="stylesheet">
 
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
                        <img src="<?= base_url("assets/images/logo/logo-white.png")?>" alt="Logo">
                        <img class="logo-fold" src="<?= base_url("assets/images/logo/klikdigitalmedia/kdm-02.png")?>" alt="Logo" style="width:60px;">
                    </a>
                </div>
                <div class="nav-wrap">

                    <ul class="nav-left">

                        <img src="<?= base_url("assets/images/logo/adsite/logo.png")?>" alt="logo" width="150px">
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
                            <a href="leads.php">
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

            
            <!--
            ##########################################################################################
            ### PAGE START  
            ##########################################################################################
            -->
            <div class="page-container">  
                <div class="main-content">
                    <div class="d-lg-none d-sm-none d-block p-3 pb-4">
                        <form action="search_leads.php" method="get" class="form-inline">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm bg-white " placeholder="Search leads..." aria-label="Search" aria-describedby="basic-addon2" name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary " type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> 
                    <div class="d-lg-none d-block px-3 ">
                        <div class="card bg-primary p-3">
                            <div class="media m-v-10 align-items-center">
                                <div class="avatar avatar-text bg-white">
                                    <span class="text-primary font-size-20">
                                        <?php
                                        $name = $row['name'];
                                        echo $name[0]; ?>
                                    </span>
                                </div>
                                <div class="media-body p-l-15">
                                    <h5 class="m-b-0 text-white"><?php echo $row['name']; ?></h5>
                                    <span class="text-white"><?php echo $row['level']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <?php



                    $tanggal_sekarang = date('Y-m-d');
                    $tanggal_sekarang_convert = date('d/m/Y');

                    $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days'));
                    $interval_convert = date('d/m/Y', strtotime($tanggal_sekarang . ' - 30 days'));
                    $tgl_pertama =  date('m/01/Y');

                    $sum_new = $this->db->query("SELECT * FROM leads WHERE status ='New' AND date_new BETWEEN '$interval' AND '$tanggal_sekarang' ORDER BY id DESC ")->num_rows();
                    $sum_invalid = $this->db->query("SELECT * FROM leads WHERE category ='Invalid' AND date_new BETWEEN '$interval' AND '$tanggal_sekarang' ORDER BY id DESC ")->num_rows();
                    $sum_pending = $this->db->query("SELECT * FROM leads WHERE category ='Pending' AND date_new BETWEEN '$interval' AND '$tanggal_sekarang' ORDER BY id DESC ")->num_rows();
                    $sum_contacted = $this->db->query("SELECT * FROM leads WHERE status ='Contacted' AND date_new BETWEEN '$interval' AND '$tanggal_sekarang' ORDER BY id DESC ")->num_rows();
                    $sum_visit = $this->db->query("SELECT * FROM leads WHERE status ='Visit' AND  date_new BETWEEN '$interval' AND '$tanggal_sekarang' ORDER BY id DESC ")->num_rows();
                    $sum_close = $this->db->query("SELECT * FROM leads WHERE status ='close' AND date_new BETWEEN '$interval' AND '$tanggal_sekarang' ORDER BY id DESC ")->num_rows();
 

                    ?>


                    <div class="col-lg-12 px-4 ">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-4 px-1">
                                <a href="leads.php">
                                    <div class="card w-100 align-items-stretch">
                                        <div class="card-body p-lg-4 p-md-4 p-sm-4 py-2 ">
                                            <div class="avatar avatar-icon avatar-lg avatar-green d-lg-none d-md-none d-sm-none d-block  mb-1">
                                                <i class="anticon anticon-solution"></i>
                                            </div>
                                            <div class="d-flex justify-content-lg-between justify-content-md-between justify-content-sm-between justify-content-center">
                                                <div>
                                                    <p class="m-b-0 font-size-lg-14 font-size-10">New</p>
                                                    <h5 class="m-b-0 ">
                                                        <span class="d-flex justify-content-lg-start justify-content-sm-start justify-content-center"><?php echo $sum_new; ?></span>
                                                    </h5>
                                                </div>
                                                <div class="avatar avatar-icon avatar-lg avatar-green d-lg-block d-md-block d-sm-block d-none">
                                                    <i class="anticon anticon-solution"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-2 col-md-4 col-4 px-1 pb-0">
                                <a href="contacted.php">
                                    <div class="card ">
                                        <div class="card-body p-lg-4 p-md-4 p-sm-4 py-2">
                                            <div class="avatar avatar-icon avatar-lg avatar-cyan d-lg-none d-md-none d-sm-none d-block mb-1">
                                                <i class="anticon anticon-message"></i>
                                            </div>
                                            <div class="d-flex justify-content-lg-between justify-content-md-between justify-content-sm-between justify-content-center">
                                                <div>
                                                    <p class="m-b-0 font-size-10">Contacted</p>
                                                    <h5 class="m-b-0">
                                                        <span class="d-flex justify-content-lg-start justify-content-sm-start justify-content-center"><?php echo $sum_contacted; ?></span>
                                                    </h5>
                                                </div>
                                                <div class="avatar avatar-icon avatar-lg avatar-cyan d-lg-block d-md-block d-sm-block d-none">
                                                    <i class="anticon anticon-message"></i>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-2 col-md-4 col-4 px-1 pb-0">
                                <a href="visit.php">
                                    <div class="card">
                                        <div class="card-body p-lg-4 p-md-4 p-sm-4 py-2">
                                            <div class="avatar avatar-icon avatar-lg avatar-gold d-lg-none d-md-none d-sm-none d-block mb-1">
                                                <i class="anticon anticon-calendar"></i>
                                            </div>
                                            <div class="d-flex justify-content-lg-between justify-content-md-between justify-content-sm-between justify-content-center">
                                                <div class="justify-content-lg-start justify-content-md-start justify-content-sm-start  justify-content-center">
                                                    <p class="m-b-0 font-size-10">visit</p>
                                                    <h5 class="m-b-0">
                                                        <span class="d-flex justify-content-lg-start justify-content-sm-start justify-content-center"><?php echo $sum_visit; ?></span>
                                                    </h5>
                                                </div>
                                                <div class="avatar avatar-icon avatar-lg avatar-gold d-lg-block d-md-block d-sm-block d-none">
                                                    <i class="anticon anticon-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-4 col-4 px-1 pb-0 justify-content-center ">
                                <a href="close.php">
                                    <div class="card ">
                                        <div class="card-body p-lg-4 p-md-4 p-sm-4 py-2  ">
                                            <div class="avatar avatar-icon avatar-lg avatar-red d-lg-none d-md-none d-sm-none d-block mb-1">
                                                <i class="anticon anticon-star "></i>
                                            </div>
                                            <div class="d-flex justify-content-lg-between justify-content-md-between justify-content-sm-between justify-content-center ">
                                                <div class="justify-content-lg-start justify-content-md-start justify-content-sm-start  justify-content-center">
                                                    <p class="m-b-0 font-size-10">close</p>
                                                    <h5 class="m-b-0 ">
                                                        <span class="d-flex justify-content-lg-start justify-content-center"><?php echo $sum_close; ?></span>
                                                    </h5>
                                                </div>
                                                <div class="avatar avatar-icon avatar-lg avatar-red d-lg-block d-md-block d-sm-block d-none">
                                                    <i class="anticon anticon-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-4 col-4 px-1 pb-0 ">
                                <a href="pending.php">
                                    <div class="card ">
                                        <div class="card-body p-lg-4 p-md-4 p-sm-4 py-2">
                                            <div class="avatar avatar-icon avatar-lg avatar-purple d-lg-none d-md-none d-sm-none d-block mb-1">
                                                <i class="anticon anticon-clock-circle"></i>
                                            </div>
                                            <div class="d-flex justify-content-lg-between justify-content-md-between justify-content-sm-between justify-content-center">

                                                <div>
                                                    <p class="m-b-0 font-size-10">Pending</p>
                                                    <h5 class="m-b-0">
                                                        <span class="d-flex justify-content-lg-start justify-content-sm-start justify-content-center"><?php echo $sum_pending; ?></span>
                                                    </h5>
                                                </div>
                                                <div class="avatar avatar-icon avatar-lg avatar-purple d-lg-block d-md-block d-sm-block d-none">
                                                    <i class="anticon anticon-clock-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-4 col-4 px-1 pb-0 ">
                                <a href="invalid.php">
                                    <div class="card ">
                                        <div class="card-body p-lg-4 p-md-4 p-sm-4 py-2 ">
                                            <div class="avatar avatar-icon avatar-lg avatar-blue d-lg-none d-md-none d-sm-none d-block mb-1">
                                                <i class="anticon anticon-disconnect"></i>
                                            </div>
                                            <div class="d-flex justify-content-lg-between justify-content-md-between justify-content-sm-between justify-content-center">
                                                <div class="justify-content-lg-start justify-content-md-start justify-content-center">
                                                    <p class="m-b-0 font-size-10">Invalid</p>
                                                    <h5 class="m-b-0 ">
                                                        <span class="d-flex justify-content-lg-start justify-content-sm-start justify-content-center"><?php echo $sum_invalid; ?></span>
                                                    </h5>
                                                </div>
                                                <div class="avatar avatar-icon avatar-lg avatar-blue d-lg-block d-md-block d-sm-block d-none">
                                                    <i class="anticon anticon-disconnect"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="d-lg-flex d-block">
                        <div class="col-lg-8 col-12 d-flex align-items-stretch ">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Recent New</h5>
                                        <div>
                                            <a href="leads.php" class="btn btn-sm btn-primary">View All</a>
                                        </div>
                                    </div>
                                    <div class="m-t-30">
                                        <div class="m-t-30">
                                            <div class="">                                        
                                                <ul class="list-group list-group-flush"> 
                                                    <li class="list-group-item p-h-0 "> 
                                                        <div class="d-flex align-items-center justify-content-between  ">
                                                            <div class="d-flex align-items-center col-lg-3 col-md-5 col-0 pl-lg pl-0">
                                                                <div>
                                                                    <h6 class="m-b-0 ">
                                                                        <a href="" class="text-dark "> Name</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="font-size-13 align-items-center col">
                                                                <h6>Category</h6>
                                                            </div>
                                                            <div class="font-size-13 align-items-center d-lg-block d-none col">
                                                                <h6>contact</h6>
                                                            </div>
                                                            <div class="font-size-13 align-items-center d-lg-block d-none col">
                                                                <h6>Address</h6>
                                                            </div>
                                                            <div class="font-size-13 align-items-center d-lg-block d-none col">
                                                                <h6>Product</h6>
                                                            </div>
                                                            <div class="font-size-13 align-items-center d-lg-block d-md-block d-none col">
                                                                <h6>Source</h6>
                                                            </div> 
                                                        </div>

                                                    </li>

                                                    <?php 
                                                    $tanggal_sekarang = date('Y-m-d');
                                                    $tanggal_sekarang_convert = date('d/m/Y');

                                                    $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days'));
                                                    $interval_convert = date('d/m/Y', strtotime($tanggal_sekarang . ' - 30 days'));
                                                    $tgl_pertama =  date('m/01/Y');



                                                    $data = $this->db->query("SELECT * FROM leads WHERE status =  'New' /*AND time_new BETWEEN '$interval' AND '$tanggal_sekarang'*/  ORDER BY id DESC LIMIT 6")->result_array();

                                                    foreach($data as $isi_data){
                                                        $timenew = $isi_data['time_new'];
                                                        $timenew_cvt = date('Y-m-d', strtotime($timenew));
                                                        $timehournew_cvt = date('H:i:s', strtotime($timenew));

                                                    ?>


                                                    <li class="list-group-item p-h-0 align-items-center list" onclick="location.href='data_leads.php?id=<?php echo $isi_data['id']; ?>'">

                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center col-lg-3 col-md-5 col-0 pl-lg pl-0">
                                                                <div class="avatar avatar-text bg-default m-r-15">
                                                                    <span class="text-primary">
                                                                        <?php
                                                                        $initial = $isi_data['name'];
                                                                        echo $initial[0];
                                                                        ?>
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-0 ">
                                                                        <a class="text-dark "> <?php echo $isi_data['name']; ?></a>
                                                                    </h6>
                                                                    <span class="text-muted font-size-13 d-lg-none d-block"><?php echo $timenew_cvt; ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg col">
                                                                <div class="badge badge-pill badge-<?php 
                                                                    if ($isi_data['category'] == 'New') {
                                                                        echo "cyan";
                                                                    }
                                                                    if ($isi_data['category'] == 'Cold') {
                                                                        echo "blue";
                                                                    }
                                                                    if ($isi_data['category'] == 'Warm') {
                                                                        echo "orange";
                                                                    }
                                                                    if ($isi_data['category'] == 'Hot') {
                                                                        echo "red";
                                                                    }
                                                                    if ($isi_data['category'] == 'Invalid') {
                                                                        echo "grey";
                                                                    }
                                                                    if ($isi_data['category'] == 'Pending') {
                                                                        echo "brown";
                                                                    }
                                                                    if ($isi_data['category'] == 'Reserve') {
                                                                        echo "purple";
                                                                    }
                                                                    if ($isi_data['category'] == 'Booking') {
                                                                        echo "gold";
                                                                    } ?> font-size-12  ">
                                                                    <span class="font-weight-semibold"><?php echo $isi_data['category']; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="font-size-13 align-items-center d-lg-block d-none col">
                                                                <span><?php echo $isi_data['contact']; ?></span>
                                                            </div>
                                                            <div class="font-size-13 align-items-center d-lg-block  d-none col">
                                                                <span><?php echo $isi_data['city']; ?></span>
                                                            </div>
                                                            <div class="font-size-13 align-items-center d-lg-block d-none col">
                                                                <span><?php echo $isi_data['product']; ?></span>
                                                            </div>
                                                            <div class="font-size-13 align-items-center d-lg-block d-md-block d-none col">
                                                                <span><?php echo $isi_data['source']; ?></span>
                                                            </div> 
                                                        </div> 
                                                    </li> 
                                                 <?php } ?> 
                                                </ul>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Recent Deals</h5>
                                        <div>
                                            <a href="leads.php" class="btn btn-sm btn-primary">View All</a>
                                        </div>
                                    </div>
                                    <div class="m-t-30">
                                        <div class="m-t-30">
                                            <div class="">
                                                <ul class="list-group list-group-flush"> 
                                                    <li class="list-group-item p-h-0 "> 
                                                        <div class="d-flex align-items-center justify-content-between  ">
                                                            <div class="d-flex align-items-center col-lg-9 col-md-10 col-sm-10 col-0 pl-lg pl-0">
                                                                <div>
                                                                    <h6 class="m-b-0 ">
                                                                        <a href="" class="text-dark "> Name</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="font-size-13 align-items-center col">
                                                                <h6>Category</h6>
                                                            </div>
                                                        </div>

                                                    </li>

                                                    <?php
 

                                                    $tanggal_sekarang = date('Y-m-d');
                                                    $tanggal_sekarang_convert = date('d/m/Y');

                                                    $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days'));
                                                    $interval_convert = date('d/m/Y', strtotime($tanggal_sekarang . ' - 30 days'));
                                                    $tgl_pertama =  date('m/01/Y');



                                                    $data = $this->db->query("SELECT * FROM leads WHERE status =  'Close' AND date_new BETWEEN '$interval' AND '$tanggal_sekarang'  ORDER BY id DESC LIMIT 6")->result_array(); 


                                                    foreach($data as $isi_data){
                                                        $timenew = $isi_data['time_new'];
                                                        $timenew_cvt = date('Y-m-d', strtotime($timenew));
                                                        $timehournew_cvt = date('H:i:s', strtotime($timenew));
                                                        ?>

                                                        <li class="list-group-item p-h-0 align-items-center list" onclick="location.href='data_leads.php?id=<?php echo $isi_data['id']; ?>'">

                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center pl-lg pl-0 col-lg-9 col-md-10 col-sm-10 col-0">
                                                                    <div class="avatar avatar-text bg-default m-r-15">
                                                                        <span class="text-primary">
                                                                            <?php
                                                                            $initial = $isi_data['name'];
                                                                            echo $initial[0];
                                                                            ?>
                                                                        </span>
                                                                    </div>
                                                                    <div>
                                                                        <h6 class="mb-0 ">
                                                                            <a class="text-dark "> <?php echo $isi_data['name']; ?></a>
                                                                        </h6>
                                                                        <span class="text-muted font-size-13 d-lg-none d-block"><?php echo $timenew_cvt; ?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg col">
                                                                    <div class="badge badge-pill badge-<?php

                                                                                                        if ($isi_data['category'] == 'New') {
                                                                                                            echo "cyan";
                                                                                                        }
                                                                                                        if ($isi_data['category'] == 'Cold') {
                                                                                                            echo "blue";
                                                                                                        }
                                                                                                        if ($isi_data['category'] == 'Warm') {
                                                                                                            echo "orange";
                                                                                                        }
                                                                                                        if ($isi_data['category'] == 'Hot') {
                                                                                                            echo "red";
                                                                                                        }
                                                                                                        if ($isi_data['category'] == 'Invalid') {
                                                                                                            echo "grey";
                                                                                                        }
                                                                                                        if ($isi_data['category'] == 'Pending') {
                                                                                                            echo "brown";
                                                                                                        }
                                                                                                        if ($isi_data['category'] == 'Reserve') {
                                                                                                            echo "purple";
                                                                                                        }
                                                                                                        if ($isi_data['category'] == 'Booking') {
                                                                                                            echo "gold";
                                                                                                        } ?> font-size-12  ">
                                                                        <span class="font-weight-semibold"><?php echo $isi_data['category']; ?></span>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </li>


                                                    <?php } ?>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!--
            ##########################################################################################
            ### PAGE END  
            ##########################################################################################
            -->



            <!-- Footer START 
            <footer class="footer">
                <div class="footer-content">
                    <p class="m-b-0">klikdigitalmedia.com</p>
                    <span>
                        <a href="" class="text-gray m-r-15">Term &amp; Conditions</a>
                        <a href="" class="text-gray">Privacy &amp; Policy</a>
                    </span>
                </div>
            </footer>
            -->

            <div class="mb-5"></div>
            <!-- Footer END -->

            </div>
            <!-- Page Container END -->

            <!-- Search Start-->
            <div class="modal modal-left fade search" id="search-drawer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Search</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-search"></i>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Files</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-cyan avatar-icon">
                                        <i class="anticon anticon-file-excel"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                        <p class="m-b-0 text-muted font-size-13">by Finance</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-blue avatar-icon">
                                        <i class="anticon anticon-file-word"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                                        <p class="m-b-0 text-muted font-size-13">by Developers</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-purple avatar-icon">
                                        <i class="anticon anticon-file-text"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                                        <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-red avatar-icon">
                                        <i class="anticon anticon-file-pdf"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                                        <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Members</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="<?= base_url("assets/images/avatars/thumb-1.jpg")?>" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                        <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="<?= base_url("assets/images/avatars/thumb-2.jpg")?>" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                        <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="<?= base_url("assets/images/avatars/thumb-3.jpg")?>" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                                        <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">News</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="<?= base_url("assets/images/others/img-1.jpg")?>" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                        <p class="m-b-0 text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">25 Nov 2018</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End-->

        </div>
    </div>

    <!-- Core Vendors JS -->
    <script src="<?= base_url("assets/js/vendors.min.js")?>"></script>

    <!-- page js -->
    <script src="<?= base_url("assets/vendors/chartjs/Chart.min.js")?>"></script>
    <!-- <script src="<?= base_url("assets/js/pages/dashboard-e-commerce.js")?>"></script>
    <script src="<?= base_url("assets/js/pages/e-commerce-order-list.js")?>"></script> -->

    <!-- datatables  --> 
    <script src="<?= base_url("assets/vendors/datatables/jquery.dataTables.min.js")?>"></script>
    <script src="<?= base_url("assets/vendors/datatables/dataTables.bootstrap.min.js")?>"></script>

   

    <script src="<?= base_url("assets/vendors/jquery-validation/jquery.validate.min.js")?>"></script>
    
    <!-- Core Vendors JS -->
    <script src="<?= base_url("assets/js/app.min.js")?>"></script>

    <!-- FLOAT BUTTON -->             
    <div class="mainopShadow d-lg-block d-none"></div>
    <div class="fab d-lg-block d-none">
        <div class="mainop button_float d-flex justify-content-center align-items-center">
            <div id="addIcon" class="material-icons" style="font-size: 30px; color:#fff;">+</div>
        </div>

        <div id="sheets" type="button" class="minifab op btn btn-primary p-3" data-toggle="modal" data-target="#add_leads">
            <i class="fa fa-id-card  " aria-hidden="true" style="color:#fff;"></i>
        </div>
        <div id=" sheets" class="minifab op btn btn-primary p-3 " type="button" data-toggle="modal" data-target="#add_user">
            <i class="fa fa-user-plus" aria-hidden="true" style="color:#fff; "></i>
        </div>
    </div>

    <!-- Modal LEADS -->
    <div class="modal fade bd-example-modal-xl" id="add_leads">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Leads</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- content modal add leads--------------------------------------------------------------------------------------------------------------------- --> 
                    <form action="process/add_leads.php" method="post" id="form-validation">
                        <div class="row">

                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label control-label">Adress</label>

                                    <div class="col-lg-3 col-12 mb-lg mb-2">
                                        <input type="text" class="form-control" name="city" placeholder="Enter City">
                                    </div>

                                    <div class="col-lg-7 col-12">
                                        <input type="text" class="form-control" name="address" placeholder="Enter Full Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" placeholder="Enter a valid email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label control-label">Contact</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="contact" placeholder="Enter max 18 characters">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label control-label">Source</label>
                                    <div class="col-sm-10">
                                        <select class="form-control " name="source">
                                            <option value="" selected>- Source -</option>
                                            <option value="Google Ads">Google Ads</option>
                                            <option value="Facebook Ads">Facebook Ads</option>
                                            <option value="Instagram Ads">Instagram Ads</option>
                                            <option value="Tiktok Ads">Tiktok Ads</option>
                                            <option value="Youtube Ads">Youtube Ads</option>
                                            <option value="Canvasing">Canvasing</option>
                                            <option value="Media">Media</option>
                                            <option value="Walk In">Walk In</option>
                                            <option value="Event">Event</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label control-label">Product</label>
                                    <div class="col-sm-10">
                                        <select class="form-control " name="product">
                                            <option value="" selected>- Product -</option>
                                            <option value="Google Ads">Google Ads</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label control-label">GM</label>
                                    <div class="col-sm-10">
                                        <select class="form-control " name="management" required>
                                            <option value="" selected>- General Manager -</option>
                                            <?php
                                            $dtuser = mysqli_query($conn, "SELECT * FROM user /* WHERE level = 'management' */ ORDER BY id DESC ");
                                            while ($user = mysqli_fetch_assoc($dtuser)) {
                                            ?>
                                                <option value="<?php echo $user['name'] ?>"><?php echo $user['name'] ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label control-label">Manager</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="agent_manager" required>
                                            <option value="" selected>- Manager -</option>
                                            <?php
                                            $dtuser = mysqli_query($conn, "SELECT * FROM user /* WHERE level = 'agent_manager' */ ORDER BY id DESC ");
                                            while ($user = mysqli_fetch_assoc($dtuser)) {
                                            ?>
                                                <option value="<?php echo $user['name'] ?>"><?php echo $user['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label control-label">Agent</label>
                                    <div class="col-sm-10">
                                        <select class="form-control " name="agent" required>
                                            <option value="" selected>- Sales/Agent -</option>
                                            <?php
                                            $dtuser = mysqli_query($conn, "SELECT * FROM user ORDER BY id DESC ");
                                            while ($user = mysqli_fetch_assoc($dtuser)) {
                                            ?>
                                                <option value="<?php echo $user['name'] ?>"><?php echo $user['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label control-label">Status</label>

                                    <div class="col-lg-5 col-12 mb-lg mb-2">
                                        <select class="form-control" name="status" required>
                                            <option value="" selected>- Status -</option>
                                            <option value="New">New</option>
                                            <option value="Contacted">Contacted</option>
                                            <option value="Visit">Visit</option>
                                            <option value="Closing">Closing</option>
                                        </select>
                                    </div>


                                    <div class="col-lg-5 col-12">
                                        <select class="form-control" name="category" required>
                                            <option value="" selected>- Category -</option>
                                            <option value="New">New</option>
                                            <option value="Cold">Cold</option>
                                            <option value="Warm">Warm</option>
                                            <option value="Hot">Hot</option>
                                            <option value="Invalid">Invalid</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>






                        <!-- end of content modal leads -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div> 
    <script>
        $("#form-validation").validate({
            ignore: ':hidden:not(:checkbox)',
            errorElement: 'label',
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            rules: {
                inputRequired: {
                    required: true
                },
                name: {
                    required: true
                },
                city: {
                    required: true
                },
                address: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                contact: {
                    required: true,
                    rangelength: [2, 18]
                },
                source: {
                    required: true
                },
                product: {
                    required: true
                },
                agent_manager: {
                    required: true
                },

                agent: {
                    required: true
                },
                status: {
                    required: true
                },
                category: {
                    required: true
                },
                inputMinLength: {
                    required: true,
                    minlength: 3
                },
                inputMaxLength: {
                    required: true,
                    minlength: 8
                },
                inputUrl: {
                    required: true,
                    url: true
                },

                inputMinValue: {
                    required: true,
                    min: 8
                },
                inputMaxValue: {
                    required: true,
                    max: 6
                },
                inputRangeValue: {
                    required: true,
                    max: 6,
                    range: [6, 12]
                },

                inputPassword: {
                    required: true
                },
                inputPasswordConfirm: {
                    required: true,
                    equalTo: '#password'
                },
                inputDigit: {
                    required: true,
                    digits: true
                },

                inputValidCheckbox: {
                    required: true
                }
            }
        });
    </script>
 
    <!-- Modal USER -->
    <div class="modal fade bd-example-modal-xl" id="add_user">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- content modal add leads--------------------------------------------------------------------------------------------------------------------- -->  
                    <form action="process/add_user.php" method="post" id="form-validation_account">
                        <div class="row">

                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label control-label">Name</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label control-label">Username</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="usernname" placeholder="Enter username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label control-label">Adress</label>

                                    <div class="col-lg-3 col-12 mb-lg mb-2">
                                        <input type="text" class="form-control" name="city" placeholder="Enter City">
                                    </div>

                                    <div class="col-lg-7 col-12">
                                        <input type="text" class="form-control" name="address" placeholder="Enter Full Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" placeholder="Enter a valid email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label control-label">Contact</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="contact" placeholder="Enter max 18 characters">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label control-label">Level</label>
                                    <div class="col-sm-10">
                                        <select class="form-control " name="level">
                                            <option value="" selected>- Select Level -</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Agent">Sales/Agent</option>
                                            <option value="Agent Manager">Agent Manager</option>
                                            <option value="General Manager">General Manager</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label control-label">Product</label>
                                    <div class="col-sm-10">
                                        <select class="form-control " name="product">
                                            <option value="" selected>- Product -</option>
                                            <option value="test">test</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label control-label">GM</label>
                                    <div class="col-sm-10">
                                        <select class="form-control " name="management" required>
                                            <option value="" selected>- General Manager -</option>
                                            <?php
                                            $dtuser = mysqli_query($conn, "SELECT * FROM user /* WHERE level = 'management' */ ORDER BY id DESC ");
                                            while ($user = mysqli_fetch_assoc($dtuser)) {
                                            ?>
                                                <option value="<?php echo $user['name'] ?>"><?php echo $user['name'] ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label control-label">Manager</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="agent_manager" required>
                                            <option value="" selected>- Manager -</option>
                                            <?php
                                            $dtuser = mysqli_query($conn, "SELECT * FROM user /* WHERE level = 'agent_manager' */ ORDER BY id DESC ");
                                            while ($user = mysqli_fetch_assoc($dtuser)) {
                                            ?>
                                                <option value="<?php echo $user['name'] ?>"><?php echo $user['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label control-label">Password</label>
                                    <div class="col-sm-5">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Enter password">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                                    </div>
                                </div>

                            </div>
                        </div>






                        <!-- end of content modal leads -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div> 
    <script>
        $("#form-validation_account").validate({
            ignore: ':hidden:not(:checkbox)',
            errorElement: 'label',
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            rules: {
                inputRequired: {
                    required: true
                },
                name: {
                    required: true
                },
                username: {
                    required: true
                },
                city: {
                    required: true
                },
                address: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                contact: {
                    required: true,
                    rangelength: [2, 18]
                },
                source: {
                    required: true
                },
                product: {
                    required: true
                },
                agent_manager: {
                    required: true
                },

                agent: {
                    required: true
                },
                status: {
                    required: true
                },
                category: {
                    required: true
                },
                inputMinLength: {
                    required: true,
                    minlength: 3
                },
                inputMaxLength: {
                    required: true,
                    minlength: 8
                },
                inputUrl: {
                    required: true,
                    url: true
                },

                inputMinValue: {
                    required: true,
                    min: 8
                },
                inputMaxValue: {
                    required: true,
                    max: 6
                },
                inputRangeValue: {
                    required: true,
                    max: 6,
                    range: [6, 12]
                },

                password: {
                    required: true
                },
                confirm_password: {
                    required: true,
                    equalTo: '#password'
                },
                inputDigit: {
                    required: true,
                    digits: true
                },

                inputValidCheckbox: {
                    required: true
                }
            }
        });
    </script>

    <!-- Modal LOGOUT -->
    <div class="modal fade" id="modal_logout">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    Continue logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="process/logout.php" type="button" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>