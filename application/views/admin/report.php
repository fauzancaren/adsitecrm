<div class="no-gutters mt-2 mb-4">
    <div class="col-lg col-12 d-flex align-items-center justify-content-between row px-3">
        <div class=" col-lg col-12 m-v-10 align-items-center">
            <div class="px-2">
                <h4 class="m-b-0">Report Leads <span class="text-success m-l-10 font-size-14">266</h4>
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
                        Rp.20.000.000
                        <span class="text-success m-l-10 font-size-14">
                            10
                        </span>
                    </h3>
                </div>
                <div class="px-md-4 m-v-10 border-right border-hide-md">
                    <p class="m-b-0">Reserve</p>
                    <h3 class="m-b-0">
                        <span>
                            Rp.30.000.000
                        </span>
                        <span class="text-success m-l-10 font-size-14">
                            10
                        </span>
                    </h3>
                </div>
                <div class="px-md-4 m-v-10">
                    <p class="m-b-0">Booking/Checkout</p>
                    <h3 class="m-b-0">
                        <span>Rp.50.000.000</span>
                        <span class="text-success m-l-10 font-size-14">
                            7
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
                                    400
                                </span>
                            </h5>
                        </div>
                        <div>
                            <a href="report_leads.php" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>

                    <!-- CHART NEW -->

                    <!-- sumber https://codepen.io/adammarshall84/pen/eYNMRZK -->


                    <div id="chart_new">
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

                    <script>
                        var options = {
                            chart: {
                                height: 280,
                                type: "area"
                            },
                            dataLabels: {
                                enabled: false
                            },
                            series: [{
                                name: "Series 1",
                                data: [45, 52, 38, 45, 19, 23, 2]
                            }],
                            fill: {
                                type: "gradient",
                                gradient: {
                                    shadeIntensity: 1,
                                    opacityFrom: 0.7,
                                    opacityTo: 0.9,
                                    stops: [0, 90, 100]
                                }
                            },
                            xaxis: {
                                categories: [
                                    "01 Jan",
                                    "02 Jan",
                                    "03 Jan",
                                    "04 Jan",
                                    "05 Jan",
                                    "06 Jan",
                                    "07 Jan"
                                ]
                            }
                        };

                        var chart = new ApexCharts(document.querySelector("#chart_new"), options);

                        chart.render();
                    </script>


                    <!-- CHART NEW -->


                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">
                <div class="card p-lg-4 p-3 pt-3 ">
                    <div class="d-flex justify-content-between p-2">
                        <div>
                            <h5 class="mb-lg-4 mb-3">Contacted <span class="text-success m-l-10 font-size-14">
                                    565
                                </span>
                            </h5>
                        </div>
                        <div>
                            <a href="report_contacted.php" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>
                    <!-- CHART CONTACTED -->
                    <!-- sumber https://codepen.io/adammarshall84/pen/eYNMRZK -->


                    <div id="chart_contacted">
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

                    <script>
                        var options = {
                            chart: {
                                height: 280,
                                type: "area"
                            },
                            dataLabels: {
                                enabled: false
                            },
                            series: [{
                                name: "Series 1",
                                data: [45, 52, 38, 45, 19, 23, 2]
                            }],
                            fill: {
                                type: "gradient",
                                gradient: {
                                    shadeIntensity: 1,
                                    opacityFrom: 0.7,
                                    opacityTo: 0.9,
                                    stops: [0, 90, 100]
                                }
                            },
                            xaxis: {
                                categories: [
                                    "01 Jan",
                                    "02 Jan",
                                    "03 Jan",
                                    "04 Jan",
                                    "05 Jan",
                                    "06 Jan",
                                    "07 Jan"
                                ]
                            }
                        };

                        var chart = new ApexCharts(document.querySelector("#chart_contacted"), options);

                        chart.render();
                    </script>
                    <!-- CHART CONTACTED -->
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">
                <div class="card p-lg-4 p-3 pt-3 ">
                    <div class="d-flex justify-content-between p-2">
                        <div>
                            <h5 class="mb-lg-4 mb-3">Visit <span class="text-success m-l-10 font-size-14">
                                    899
                                </span></h5>
                        </div>
                        <div>
                            <a href="report_visit.php" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>
                    <!-- CHART VISIT -->

                    <!-- sumber https://codepen.io/adammarshall84/pen/eYNMRZK -->


                    <div id="chart_visit">
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

                    <script>
                        var options = {
                            chart: {
                                height: 280,
                                type: "area"
                            },
                            dataLabels: {
                                enabled: false
                            },
                            series: [{
                                name: "Series 1",
                                data: [45, 52, 38, 45, 19, 23, 2]
                            }],
                            fill: {
                                type: "gradient",
                                gradient: {
                                    shadeIntensity: 1,
                                    opacityFrom: 0.7,
                                    opacityTo: 0.9,
                                    stops: [0, 90, 100]
                                }
                            },
                            xaxis: {
                                categories: [
                                    "01 Jan",
                                    "02 Jan",
                                    "03 Jan",
                                    "04 Jan",
                                    "05 Jan",
                                    "06 Jan",
                                    "07 Jan"
                                ]
                            }
                        };

                        var chart = new ApexCharts(document.querySelector("#chart_visit"), options);

                        chart.render();
                    </script>

                    <!-- CHART VISIT -->
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="card p-lg-4 p-3 pt-3 ">
                    <div class="d-flex justify-content-between p-2">
                        <div>
                            <h5 class="mb-lg-4 mb-3">Close <span class="text-success m-l-10 font-size-14">
                                    88
                                </span>
                            </h5>
                        </div>
                        <div>
                            <a href="report_close.php" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>

                    <!-- CLOSE CHART -->

                    <!-- sumber https://codepen.io/adammarshall84/pen/eYNMRZK -->


                    <div id="chart_close">
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

                    <script>
                        var options = {
                            chart: {
                                height: 280,
                                type: "area"
                            },
                            dataLabels: {
                                enabled: false
                            },
                            series: [{
                                name: "Series 1",
                                data: [45, 52, 38, 45, 19, 23, 2]
                            }],
                            fill: {
                                type: "gradient",
                                gradient: {
                                    shadeIntensity: 1,
                                    opacityFrom: 0.7,
                                    opacityTo: 0.9,
                                    stops: [0, 90, 100]
                                }
                            },
                            xaxis: {
                                categories: [
                                    "01 Jan",
                                    "02 Jan",
                                    "03 Jan",
                                    "04 Jan",
                                    "05 Jan",
                                    "06 Jan",
                                    "07 Jan"
                                ]
                            }
                        };

                        var chart = new ApexCharts(document.querySelector("#chart_close"), options);

                        chart.render();
                    </script>

                    <!-- CLOSE CHART -->
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



            <!-- chart source donut -->
            <script src="<?= base_url("assets/vendors/chartist/chartist.min.js") ?>"></script>
            <div class="ct-chart px-4" id="donut-chart"></div>

            <script>
                new Chartist.Pie('#donut-chart', {
                    series: [
                        30,
                        50,
                        60,
                        89,
                    ]
                }, {
                    donut: true,
                    donutWidth: 60,
                    donutSolid: true,
                    startAngle: 270,
                    showLabel: true
                });
            </script>



            <div class="row p-lg-2 p-4">
                <div class="col-md-8 m-h-auto">
                    <div class="d-flex justify-content-between align-items-center pt-lg-5 pt-1 mb-3">
                        <p class="m-b-0 d-flex align-items-center">
                            <span class="badge badge-primary badge-dot m-r-10"></span>
                            <span>Facebook Ads</span>
                        </p>
                        <h5 class="m-b-0"> 33</h5>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="m-b-0 d-flex align-items-center">
                            <span class="badge badge-secondary badge-dot m-r-10"></span>
                            <span>Instagram Ads</span>
                        </p>
                        <h5 class="m-b-0">33</h5>
                    </div>


                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="m-b-0 d-flex align-items-center">
                            <span class="badge badge-pink badge-dot m-r-10"></span>
                            <span>Tiktok Ads</span>
                        </p>
                        <h5 class="m-b-0">33</h5>
                    </div>


                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="m-b-0 d-flex align-items-center">
                            <span class="badge badge-success badge-dot m-r-10"></span>
                            <span>Google Ads</span>
                        </p>
                        <h5 class="m-b-0">33</h5>
                    </div>


                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="m-b-0 d-flex align-items-center">
                            <span class="badge badge-danger badge-dot m-r-10"></span>
                            <span>Youtube Ads</span>
                        </p>
                        <h5 class="m-b-0">33</h5>
                    </div>


                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="m-b-0 d-flex align-items-center">
                            <span class="badge badge-walkin badge-dot m-r-10"></span>
                            <span>Walk In</span>
                        </p>
                        <h5 class="m-b-0">33</h5>
                    </div>


                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="m-b-0 d-flex align-items-center">
                            <span class="badge badge-info badge-dot m-r-10"></span>
                            <span>Media</span>
                        </p>
                        <h5 class="m-b-0">33</h5>
                    </div>


                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="m-b-0 d-flex align-items-center">
                            <span class="badge badge-warning badge-dot m-r-10"></span>
                            <span>Canvasing</span>
                        </p>
                        <h5 class="m-b-0">33</h5>
                    </div>


                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="m-b-0 d-flex align-items-center">
                            <span class="badge badge-event-promo badge-dot m-r-10"></span>
                            <span>Event</span>
                        </p>
                        <h5 class="m-b-0">33</h5>
                    </div>

                </div>
            </div>


        </div>
    </div>