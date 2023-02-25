<!--
        ##########################################################################################
        ### PAGE START  
        ##########################################################################################
        -->

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
                    //$name = $row['name'];
                    //echo $name[0]; 
                    ?>
                </span>
            </div>
            <div class="media-body p-l-15">
                <h5 class="m-b-0 text-white"><?php //echo $row['name']; 
                                                ?></h5>
                <span class="text-white"><?php //echo $row['level']; 
                                            ?></span>
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
            <a href="<?= base_url("new_leads") ?>">
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
            <a href="<?= base_url("contacted_leads") ?>">
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
            <a href="<?= base_url("visit") ?>">
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
            <a href="<?= base_url("close_leads") ?>">
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
            <a href="<?= base_url("pending_leads") ?>">
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
            <a href="<?= base_url("invalid_leads") ?>">
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

                                foreach ($data as $isi_data) {
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


                                foreach ($data as $isi_data) {
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


<!--
        ##########################################################################################
        ### PAGE END  
        ##########################################################################################
        -->