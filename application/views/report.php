<div class="no-gutters mt-2 mb-4">
    <div class="col-lg col-12 d-flex align-items-center justify-content-between row px-3">
        <div class=" col-lg col-12 m-v-10 align-items-center">
            <div class="px-2">
                <h4 class="m-b-0">Report Leads <span class="text-success m-l-10 font-size-14">
                        <?php
                        if (isset($_GET['tanggal_awal'])) {
                            $tanggal_awal_filter = $_GET['tanggal_awal'];
                            $tanggal_akhir_filter = $_GET['tanggal_akhir'];
                            $jum = mysqli_query($conn, "SELECT * FROM leads WHERE date_new BETWEEN '$tanggal_awal_filter' AND '$tanggal_akhir_filter' ");

                            echo mysqli_num_rows($jum);
                        } else {
                            $tanggal_sekarang = date('Y-m-d');
                            $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days'));
                            $jum = mysqli_query($conn, "SELECT * FROM leads WHERE date_new BETWEEN '$interval' AND '$tanggal_sekarang' ");
                            echo mysqli_num_rows($jum);
                        }
                        ?></h4>
                <!-- <span class="text-gray">Project Manager</span>-->
            </div>
        </div>



        <div class="col-lg-5 col-md-6 col-sm-12 col-12 mt-3 pr-0 ">
            <form action="report.php" method="get" class="row">
                <div class="mb-1 col-lg-5 col-md-5 col-sm-5 col-12 pr-0">
                    <div class="input-group date">
                        <input type="date" class="date form-control form-control  " id="date" name="tanggal_awal" />
                        <span class="input-group-append">
                            <span class="input-group-text bg-light d-lg-none d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>

                </div>
                <div class="mb-2 col-lg-5 col-md-5 col-sm-5 col-12 pr-0">
                    <div class="input-group date">
                        <input type="date" class="date form-control form-control" id="date" name="tanggal_akhir" />
                        <span class="input-group-append ">
                            <span class="input-group-text bg-light d-lg-none w-100 d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>

                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-12 pr-0 "><button type="submit" class="btn btn-primary col-12 d-block pr-0 pl-0 "> Filter</button></div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8 col-12  ">
            <div class="card w-100 p-lg-4 p-3 pt-3">
                <div class="d-flex justify-content-between p-2">

                    <div>
                        <h5 class="mb-3">Earnings Overview</h5>
                    </div>
                    <div>
                        <a href="report_close.php" class="btn btn-sm btn-primary">Detail</a>
                    </div>
                </div>

                <div class="d-md-flex p-2">
                    <div class="pr-4 m-v-10 border-right border-hide-md">
                        <p class="m-b-0">Total Earnings</p>
                        <h3 class="m-b-0">

                            <?php

                            ?>
                            <span>
                                <?php
                                if (isset($_GET['tanggal_awal'])) {
                                    $tanggal_awal_filter = $_GET['tanggal_awal'];
                                    $tanggal_akhir_filter = $_GET['tanggal_akhir'];

                                    $data_reserve_filter = mysqli_query($conn, "SELECT SUM(reserve) as total_reserve FROM leads WHERE  date_close BETWEEN '$tanggal_awal_filter' AND '$tanggal_akhir_filter' ");
                                    $data_booking_filter = mysqli_query($conn, "SELECT SUM(booking) as total_booking FROM leads WHERE  date_close BETWEEN '$tanggal_akhir_filter' AND '$tanggal_akhir_filter' ");

                                    while ($sum_reserve_filter = mysqli_fetch_assoc($data_reserve_filter)) {

                                        $all_reserve = $sum_reserve_filter['total_reserve'];
                                    }


                                    while ($sum_booking_filter = mysqli_fetch_assoc($data_booking_filter)) {

                                        $all_booking = $sum_booking_filter['total_booking'];
                                    }

                                    $currencyValue = $all_reserve + $all_booking;

                                    $formatter = new NumberFormatter('in_ID', NumberFormatter::CURRENCY);
                                    $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
                                    $formattedCurrency = $formatter->formatCurrency($currencyValue, 'IDR');

                                    echo $formattedCurrency;
                                } else {

                                    $tanggal_sekarang = date('Y-m-d');
                                    $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days'));

                                    $data_reserve = mysqli_query($conn, "SELECT SUM(reserve) as total_reserve FROM leads WHERE  date_close BETWEEN '$interval' AND '$tanggal_sekarang' ");
                                    $data_booking = mysqli_query($conn, "SELECT SUM(booking) as total_booking FROM leads WHERE  date_close BETWEEN '$interval' AND '$tanggal_sekarang' ");

                                    while ($sum_booking = mysqli_fetch_assoc($data_booking)) {

                                        $all_booking = $sum_booking['total_booking'];
                                    }

                                    while ($sum_reserve = mysqli_fetch_assoc($data_reserve)) {

                                        $all_reserve = $sum_reserve['total_reserve'];
                                    }

                                    $currencyValue = $all_booking + $all_reserve;

                                    $formatter = new NumberFormatter('in_ID', NumberFormatter::CURRENCY);
                                    $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
                                    $formattedCurrency = $formatter->formatCurrency($currencyValue, 'IDR');

                                    echo $formattedCurrency;
                                }
                                ?>
                            </span>
                        </h3>
                    </div>
                    <div class="px-md-4 m-v-10 border-right border-hide-md">
                        <p class="m-b-0">Reserve</p>
                        <h3 class="m-b-0">
                            <span>
                                <?php

                                if (isset($_GET['tanggal_awal'])) {
                                    $tanggal_awal_filter = $_GET['tanggal_awal'];
                                    $tanggal_akhir_filter = $_GET['tanggal_akhir'];

                                    $data_reserve_filter = mysqli_query($conn, "SELECT SUM(reserve) as total_reserve FROM leads WHERE  date_close BETWEEN '$tanggal_awal_filter' AND '$tanggal_akhir_filter' ");

                                    while ($sum_reserve_filter = mysqli_fetch_assoc($data_reserve_filter)) {

                                        $all_reserve = $sum_reserve_filter['total_reserve'];
                                    }


                                    $currencyValue = $all_reserve;

                                    $formatter = new NumberFormatter('in_ID', NumberFormatter::CURRENCY);
                                    $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
                                    $formattedCurrency = $formatter->formatCurrency($currencyValue, 'IDR');

                                    echo $formattedCurrency;
                                } else {

                                    $tanggal_sekarang = date('Y-m-d');
                                    $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days'));

                                    $data_reserve = mysqli_query($conn, "SELECT SUM(reserve) as total_reserve FROM leads WHERE date_close BETWEEN '$interval' AND '$tanggal_sekarang' ");

                                    while ($sum_reserve = mysqli_fetch_assoc($data_reserve)) {

                                        $all_reserve = $sum_reserve['total_reserve'];
                                    }

                                    $currencyValue = $all_reserve;

                                    $formatter = new NumberFormatter('in_ID', NumberFormatter::CURRENCY);
                                    $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
                                    $formattedCurrency = $formatter->formatCurrency($currencyValue, 'IDR');

                                    echo $formattedCurrency;
                                }

                                ?>
                            </span>
                            <span class="text-success m-l-10 font-size-14">
                                <?php
                                if (isset($_GET['tanggal_awal'])) {
                                    $tanggal_awal_filter = $_GET['tanggal_awal'];
                                    $tanggal_akhir_filter = $_GET['tanggal_akhir'];
                                    $jum_reserve = mysqli_query($conn, "SELECT * FROM leads WHERE reserve AND date_close BETWEEN '$tanggal_awal_filter' AND '$tanggal_akhir_filter' ");

                                    echo mysqli_num_rows($jum_reserve);
                                } else {
                                    $tanggal_sekarang = date('Y-m-d');
                                    $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days'));
                                    $jum_reserve = mysqli_query($conn, "SELECT * FROM leads WHERE reserve AND date_close BETWEEN '$interval' AND '$tanggal_sekarang' ");
                                    echo mysqli_num_rows($jum_reserve);
                                }
                                ?>
                            </span>
                        </h3>
                    </div>
                    <div class="px-md-4 m-v-10">
                        <p class="m-b-0">Booking/Checkout</p>
                        <h3 class="m-b-0">
                            <span><?php
                                    if (isset($_GET['tanggal_awal'])) {
                                        $tanggal_awal_filter = $_GET['tanggal_awal'];
                                        $tanggal_akhir_filter = $_GET['tanggal_akhir'];

                                        $data_booking_filter = mysqli_query($conn, "SELECT SUM(booking) as total_booking FROM leads WHERE  date_close BETWEEN '$tanggal_akhir_filter' AND '$tanggal_akhir_filter' ");

                                        while ($sum_booking_filter = mysqli_fetch_assoc($data_booking_filter)) {

                                            $all_booking = $sum_booking_filter['total_booking'];
                                        }

                                        $currencyValue = $all_booking;

                                        $formatter = new NumberFormatter('in_ID', NumberFormatter::CURRENCY);
                                        $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
                                        $formattedCurrency = $formatter->formatCurrency($currencyValue, 'IDR');

                                        echo $formattedCurrency;
                                    } else {

                                        $tanggal_sekarang = date('Y-m-d');
                                        $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days'));

                                        $data_booking = mysqli_query($conn, "SELECT SUM(booking) as total_booking FROM leads WHERE date_close BETWEEN '$interval' AND '$tanggal_sekarang' ");

                                        while ($sum_booking = mysqli_fetch_assoc($data_booking)) {

                                            $all_booking = $sum_booking['total_booking'];
                                        }

                                        $currencyValue = $all_booking;

                                        $formatter = new NumberFormatter('in_ID', NumberFormatter::CURRENCY);
                                        $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
                                        $formattedCurrency = $formatter->formatCurrency($currencyValue, 'IDR');

                                        echo $formattedCurrency;
                                    }
                                    ?></span>
                            <span class="text-success m-l-10 font-size-14">
                                <?php
                                if (isset($_GET['tanggal_awal'])) {
                                    $tanggal_awal_filter = $_GET['tanggal_awal'];
                                    $tanggal_akhir_filter = $_GET['tanggal_akhir'];
                                    $jum_booking = mysqli_query($conn, "SELECT * FROM leads WHERE booking AND date_close BETWEEN '$tanggal_awal_filter' AND '$tanggal_akhir_filter' ");

                                    echo mysqli_num_rows($jum_booking);
                                } else {
                                    $tanggal_sekarang = date('Y-m-d');
                                    $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days'));
                                    $jum_booking = mysqli_query($conn, "SELECT * FROM leads WHERE booking AND date_close BETWEEN '$interval' AND '$tanggal_sekarang' ");
                                    echo mysqli_num_rows($jum_booking);
                                }
                                ?>
                            </span>
                        </h3>
                    </div>
                </div>

            </div>
            <div class="row d-flex">

                <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">
                    <div class="card p-lg-4 p-3 pt-3 ">
                        <div class="d-flex justify-content-between p-2">
                            <div>
                                <h5 class="mb-lg-4 mb-3">Leads in <span class="text-success m-l-10 font-size-14">
                                        <?php
                                        if (isset($_GET['tanggal_awal'])) {
                                            $tanggal_awal_filter = $_GET['tanggal_awal'];
                                            $tanggal_akhir_filter = $_GET['tanggal_akhir'];
                                            $jum_new = mysqli_query($conn, "SELECT * FROM leads WHERE  date_new BETWEEN '$tanggal_awal_filter' AND '$tanggal_akhir_filter' ");

                                            echo mysqli_num_rows($jum_new);
                                        } else {
                                            $tanggal_sekarang = date('Y-m-d');
                                            $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days'));
                                            $jum_new = mysqli_query($conn, "SELECT * FROM leads WHERE date_new BETWEEN '$interval' AND '$tanggal_sekarang' ");
                                            echo mysqli_num_rows($jum_new);
                                        }
                                        ?>
                                    </span> </h5>
                            </div>
                            <div>
                                <a href="report_leads.php" class="btn btn-sm btn-primary">Detail</a>
                            </div>
                        </div>
                        <?php require 'charts/overview.php'; ?>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">
                    <div class="card p-lg-4 p-3 pt-3 ">
                        <div class="d-flex justify-content-between p-2">
                            <div>
                                <h5 class="mb-lg-4 mb-3">Contacted <span class="text-success m-l-10 font-size-14">
                                        <?php
                                        if (isset($_GET['tanggal_awal'])) {
                                            $tanggal_awal_filter = $_GET['tanggal_awal'];
                                            $tanggal_akhir_filter = $_GET['tanggal_akhir'];
                                            $jum_contacted = mysqli_query($conn, "SELECT * FROM leads WHERE date_contacted BETWEEN '$tanggal_awal_filter' AND '$tanggal_akhir_filter' ");

                                            echo mysqli_num_rows($jum_contacted);
                                        } else {
                                            $tanggal_sekarang = date('Y-m-d');
                                            $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days'));
                                            $jum_contacted = mysqli_query($conn, "SELECT * FROM leads WHERE date_contacted BETWEEN '$interval' AND '$tanggal_sekarang' ");
                                            echo mysqli_num_rows($jum_contacted);
                                        }
                                        ?>
                                    </span></h5>
                            </div>
                            <div>
                                <a href="report_contacted.php" class="btn btn-sm btn-primary">Detail</a>
                            </div>
                        </div>
                        <?php require 'charts/contacted_chart.php'; ?>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">
                    <div class="card p-lg-4 p-3 pt-3 ">
                        <div class="d-flex justify-content-between p-2">
                            <div>
                                <h5 class="mb-lg-4 mb-3">Visit <span class="text-success m-l-10 font-size-14">
                                        <?php
                                        if (isset($_GET['tanggal_awal'])) {
                                            $tanggal_awal_filter = $_GET['tanggal_awal'];
                                            $tanggal_akhir_filter = $_GET['tanggal_akhir'];
                                            $jum_visit = mysqli_query($conn, "SELECT * FROM leads WHERE date_visit BETWEEN '$tanggal_awal_filter' AND '$tanggal_akhir_filter' ");

                                            echo mysqli_num_rows($jum_visit);
                                        } else {
                                            $tanggal_sekarang = date('Y-m-d');
                                            $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days'));
                                            $jum_visit = mysqli_query($conn, "SELECT * FROM leads WHERE date_visit BETWEEN '$interval' AND '$tanggal_sekarang' ");
                                            echo mysqli_num_rows($jum_visit);
                                        }
                                        ?>
                                    </span></h5>
                            </div>
                            <div>
                                <a href="report_visit.php" class="btn btn-sm btn-primary">Detail</a>
                            </div>
                        </div>
                        <?php require 'charts/visit_chart.php'; ?>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card p-lg-4 p-3 pt-3 ">
                        <div class="d-flex justify-content-between p-2">
                            <div>
                                <h5 class="mb-lg-4 mb-3">Close <span class="text-success m-l-10 font-size-14">
                                        <?php
                                        if (isset($_GET['tanggal_awal'])) {
                                            $tanggal_awal_filter = $_GET['tanggal_awal'];
                                            $tanggal_akhir_filter = $_GET['tanggal_akhir'];
                                            $jum_close = mysqli_query($conn, "SELECT * FROM leads WHERE date_close BETWEEN '$tanggal_awal_filter' AND '$tanggal_akhir_filter' ");

                                            echo mysqli_num_rows($jum_close);
                                        } else {
                                            $tanggal_sekarang = date('Y-m-d');
                                            $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days'));
                                            $jum_close = mysqli_query($conn, "SELECT * FROM leads WHERE date_close BETWEEN '$interval' AND '$tanggal_sekarang' ");
                                            echo mysqli_num_rows($jum_close);
                                        }
                                        ?>
                                    </span></h5>
                            </div>
                            <div>
                                <a href="report_close.php" class="btn btn-sm btn-primary">Detail</a>
                            </div>
                        </div>
                        <?php require 'charts/close_chart.php'; ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-4 col-12 d-flex align-items-stretch">
            <div class="card w-100 p-lg-4 p-3 pt-lg-4 pt-2">
                <div class="d-flex justify-content-between p-2">
                    <div>
                        <h5 class="mb-lg-5 mb-3">Source </h5>
                    </div>
                    <div>
                        <a href="report_source.php" class="btn btn-sm btn-primary">Detail</a>
                    </div>
                </div>
                <?php require 'charts/source_distribution.php'; ?>

                <div class="row p-lg-2 p-4">
                    <div class="col-md-8 m-h-auto">
                        <div class="d-flex justify-content-between align-items-center pt-lg-5 pt-1 mb-3">
                            <p class="m-b-0 d-flex align-items-center">
                                <span class="badge badge-primary badge-dot m-r-10"></span>
                                <span>Facebook Ads</span>
                            </p>
                            <h5 class="m-b-0"> <?php echo $jumlah_fb_ads; ?></h5>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="m-b-0 d-flex align-items-center">
                                <span class="badge badge-secondary badge-dot m-r-10"></span>
                                <span>Instagram Ads</span>
                            </p>
                            <h5 class="m-b-0"><?php echo $jumlah_instagram_ads; ?></h5>
                        </div>


                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="m-b-0 d-flex align-items-center">
                                <span class="badge badge-pink badge-dot m-r-10"></span>
                                <span>Tiktok Ads</span>
                            </p>
                            <h5 class="m-b-0"><?php echo $jumlah_tiktok_ads; ?></h5>
                        </div>


                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="m-b-0 d-flex align-items-center">
                                <span class="badge badge-success badge-dot m-r-10"></span>
                                <span>Google Ads</span>
                            </p>
                            <h5 class="m-b-0"><?php echo $jumlah_google_ads; ?></h5>
                        </div>


                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="m-b-0 d-flex align-items-center">
                                <span class="badge badge-danger badge-dot m-r-10"></span>
                                <span>Youtube Ads</span>
                            </p>
                            <h5 class="m-b-0"><?php echo $jumlah_youtube_ads; ?></h5>
                        </div>


                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="m-b-0 d-flex align-items-center">
                                <span class="badge badge-walkin badge-dot m-r-10"></span>
                                <span>Walk In</span>
                            </p>
                            <h5 class="m-b-0"><?php echo $jumlah_walkin; ?></h5>
                        </div>


                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="m-b-0 d-flex align-items-center">
                                <span class="badge badge-info badge-dot m-r-10"></span>
                                <span>Media</span>
                            </p>
                            <h5 class="m-b-0"><?php echo $jumlah_media; ?></h5>
                        </div>


                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="m-b-0 d-flex align-items-center">
                                <span class="badge badge-warning badge-dot m-r-10"></span>
                                <span>Canvasing</span>
                            </p>
                            <h5 class="m-b-0"><?php echo $jumlah_canvasing; ?></h5>
                        </div>


                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="m-b-0 d-flex align-items-center">
                                <span class="badge badge-event-promo badge-dot m-r-10"></span>
                                <span>Event</span>
                            </p>
                            <h5 class="m-b-0"><?php echo $jumlah_event; ?></h5>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>

</div>