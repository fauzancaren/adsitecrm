<!--
        ##########################################################################################
        ### PAGE START  
        ##########################################################################################
        -->
<div class="d-lg-none " style="
    background: #0B1460;
    width: 100%;
    height: 18rem;
    position: absolute;
    left: 0;
    top: 0;
    border-radius: 15px;
"></div>
<div class="d-lg-none d-block px-2 ">
    <div class="card bg-primary m-0 p-2 pt-4">
        <div class="media  align-items-center">
            <div class="avatar avatar-text bg-white">
                <span class="text-primary font-size-20"><?= substr($this->session->userdata("username"), 0, 1) ?></span>
            </div>
            <div class="media-body p-l-15">
                <h5 class="m-b-0 text-white"><?= $this->session->userdata("username") ?></h5>
                <span class="text-white"><?= $this->session->userdata("level") ?></span>
            </div>
        </div>
    </div>
</div>
<div class="d-lg-none d-sm-block d-block py-3 pb-4">
    <form action="search_leads.php" method="get" class="form-inline  ">
        <div class="input-group col-12">
            <input type="text" class="form-control form-control-sm bg-white " placeholder="Search leads..." aria-label="Search" aria-describedby="basic-addon2" name="search">
            <div class="input-group-append">
                <button class="btn btn-light " type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
</div>

<!--  CARD DETAIL   -->
<div class="col-lg-12 px-4 ">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-6 px-1">
            <a href="<?= base_url("admin/leads/new") ?>">
                <div class="card w-100 align-items-stretch mb-2">
                    <div class="card-body p-lg-4 p-md-4 p-sm-4 p-3 text-center">
                        <!-- icon mobile
                        <div class="avatar avatar-icon avatar-lg avatar-green d-lg-none d-md-none d-sm-none d-inline-block  mb-1">
                            <i class="anticon anticon-solution"></i>
                        </div>
                        -->
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="m-b-0 font-size-lg-14 font-size-10">New</p>
                                <h5 class="m-b-0 ">
                                    <span class="d-flex justify-content-start counter fw-bold" id="data-ds-new">0</span>
                                </h5>
                            </div>
                            <div class="avatar avatar-icon avatar-lg avatar-green "> <!-- sebelumnya d-lg-block d-md-block d-sm-block d-none -->
                                <i class="anticon anticon-solution"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-6 px-1 pb-0">
            <a href="<?= base_url("admin/leads/contacted") ?>">
                <div class="card mb-2">
                    <div class="card-body p-lg-4 p-md-4 p-sm-4 p-3 text-center">
                        <!--
                        <div class="avatar avatar-icon avatar-lg avatar-cyan d-lg-none d-md-none d-sm-none d-inline-block mb-1">
                            <i class="anticon anticon-message"></i>
                        </div>
                        -->
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="m-b-0 font-size-10">Contacted</p>
                                <h5 class="m-b-0">
                                    <span class="d-flex justify-content-lg-start justify-content-start counter fw-bold" id="data-ds-contacted">0</span>
                                </h5>
                            </div>
                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                <i class="anticon anticon-message"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-6 px-1 pb-0">
            <a href="<?= base_url("admin/leads/visit") ?>">
                <div class="card">
                    <div class="card-body p-lg-4 p-md-4 p-sm-4 p-3 text-center">
                        <!--
                        <div class="avatar avatar-icon avatar-lg avatar-gold d-lg-none d-md-none d-sm-none d-inline-block mb-1">
                            <i class="anticon anticon-calendar"></i>
                        </div>
                        -->
                        <div class="d-flex justify-content-between">
                            <div class="justify-content-start">
                                <p class="m-b-0 font-size-10">Visit</p>
                                <h5 class="m-b-0">
                                    <span class="d-flex justify-content-start counter fw-bold" id="data-ds-visit">0</span>
                                </h5>
                            </div>
                            <div class="avatar avatar-icon avatar-lg avatar-gold">
                                <i class="anticon anticon-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-6 px-1 pb-0 justify-content-center ">
            <a href="<?= base_url("admin/leads/close") ?>">
                <div class="card ">
                    <div class="card-body p-lg-4 p-md-4 p-sm-4 p-3 text-center">
                        <!--
                        <div class="avatar avatar-icon avatar-lg avatar-red d-lg-none d-md-none d-sm-none d-inline-block mb-1">
                            <i class="anticon anticon-star "></i>
                        </div>
                        -->
                        <div class="d-flex justify-content-between ">
                            <div class="justify-content-start">
                                <p class="m-b-0 font-size-10">Close</p>
                                <h5 class="m-b-0 ">
                                    <span class="d-flex justify-content-start counter fw-bold" id="data-ds-close">0</span>
                                </h5>
                            </div>
                            <div class="avatar avatar-icon avatar-lg avatar-red ">
                                <i class="anticon anticon-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<!--  CARD DETAIL SCRIPT   -->
<script>
    $.ajax({
        dataType: "json",
        url: "<?= base_url("admin/get_card_dashboard") ?>",
        success: function(data) {
            //membuat delay
            setTimeout(function() {
                jQuery.each(data, function(index, item) {
                    $("#" + index).text(item);
                });
                $('.counter').each(function() {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).text()
                    }, {
                        duration: 500,
                        easing: 'swing',
                        step: function(now) {
                            $(this).text(Math.ceil(now));
                        }
                    });
                }); //your code to be executed after 1 second
            }, 500);
        }
    });
</script>

<div class="d-lg-flex d-block ">
    <div class="col-lg-8 col-12 d-flex align-items-stretch p-1">
        <div class="card p-lg-4 w-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Recent New</h5>
                    <div>
                        <a href="<?= base_url("admin/leads") ?>" class="btn btn-sm btn-primary">View All</a>
                    </div>
                </div>
                <div class="m-t-30">
                    <div class="m-t-30">
                        <div class="">
                            <ul class="list-group list-group-flush" id="list-recent-new">
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
                            </ul>

                            <div class="text-center loading-new">
                                <img src="<?= base_url("assets/images/others/Spin-loading.svg") ?>" alt="My Happy SVG" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12 d-flex align-items-stretch p-1">
        <div class="card  w-100 ">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Recent Deals</h5>
                    <div>
                        <a href="<?= base_url("admin/leads") ?>" class="btn btn-sm btn-primary">View All</a>
                    </div>
                </div>
                <div class="m-t-30">
                    <div class="m-t-30">
                        <div class="">
                            <ul class="list-group list-group-flush" id="list-recent-deals">
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
                            </ul>

                            <div class="text-center loading-deals">
                                <img src="<?= base_url("assets/images/others/Spin-loading.svg") ?>" alt="My Happy SVG" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  LIST DEAL SCRIPT   -->
<script>
    $.ajax({
        dataType: "json",
        url: "<?= base_url("admin/get_list_new_dashboard") ?>",
        success: function(data) {
            jQuery.each(data, function(index, item) {
                var date_new = moment(item["date_new"] + " " + item["time_new"]);
                switch (item["category"]) {
                    case 'New':
                        var color = "cyan";
                        break;

                    case 'Cold':
                        var color = "cyan";
                        break;

                    case 'Warm':
                        var color = "blue";
                        break;

                    case 'Hot':
                        var color = "orange";
                        break;

                    case 'Invalid':
                        var color = "red";
                        break;

                    case 'Cold':
                        var color = "brown";
                        break;

                    case 'Reserve':
                        var color = "purple";
                        break;

                    case 'Booking':
                        var color = "gold";
                        break;
                    default:
                        var color = "green";
                }
                var html = `
                    <li class="list-group-item p-h-0 align-items-center list new" onclick="location.href='<?= base_url("admin/data_leads/") ?>${item['id']}'" style="display:none">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center col-lg-3 col-md-5 col-0 pl-lg pl-0">
                                <div class="avatar avatar-text bg-default m-r-15">
                                    <span class="text-primary">${item['name'].slice(0,1)}</span>
                                </div>
                                <div>
                                    <h6 class="mb-0 ">
                                        <a class="text-dark ">${item['name']}</a>
                                    </h6>
                                    <span class="text-muted font-size-13 d-lg-none d-block">${date_new.format("YYYY-MM-DD H:mm:ss")}</span>
                                </div>
                            </div>

                            <div class="col-lg col">
                                <div class="badge badge-pill badge-${color} font-size-12">
                                    <span class="font-weight-semibold">${item['category']}</span>
                                </div>
                            </div>
                            <div class="font-size-13 align-items-center d-lg-block d-none col">
                                <span>${item['contact']}</span>
                            </div>
                            <div class="font-size-13 align-items-center d-lg-block  d-none col">
                                <span>${item['city']}</span>
                            </div>
                            <div class="font-size-13 align-items-center d-lg-block d-none col">
                                <span>${item['product']}</span>
                            </div>
                            <div class="font-size-13 align-items-center d-lg-block d-md-block d-none col">
                                <span>${item['source']}</span>
                            </div>
                        </div>
                    </li>`;
                $("#list-recent-new").append(html);
                $(".list.new").delay(index * 200).fadeIn();
            });
            $(".loading-new").fadeOut();
        }
    });


    $.ajax({
        dataType: "json",
        url: "<?= base_url("admin/get_list_deal_dashboard") ?>",
        success: function(data) {
            jQuery.each(data, function(index, item) {
                var date_new = moment(item["date_new"] + " " + item["time_new"]);
                switch (item["category"]) {
                    case 'New':
                        var color = "cyan";
                        break;

                    case 'Cold':
                        var color = "cyan";
                        break;

                    case 'Warm':
                        var color = "blue";
                        break;

                    case 'Hot':
                        var color = "orange";
                        break;

                    case 'Invalid':
                        var color = "red";
                        break;

                    case 'Cold':
                        var color = "brown";
                        break;

                    case 'Reserve':
                        var color = "purple";
                        break;

                    case 'Booking':
                        var color = "gold";
                        break;
                    default:
                        var color = "green";
                }
                var html = `
                    <li class="list-group-item p-h-0 align-items-center list deals" onclick="location.href='<?= base_url("admin/data_leads/") ?>${item['id']}'" style="display:none">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center pl-lg pl-0 col-lg-9 col-md-10 col-sm-10 col-0">
                                <div class="avatar avatar-text bg-default m-r-15">
                                    <span class="text-primary">${item['name'].slice(0,1)}</span>
                                </div>
                                <div>
                                    <h6 class="mb-0 ">
                                        <a class="text-dark ">${item['name']}</a>
                                    </h6>
                                    <span class="text-muted font-size-13 d-lg-none d-block">${date_new.format("YYYY-MM-DD H:mm:ss")}</span>
                                </div>
                            </div>

                            <div class="col-lg col">
                                <div class="badge badge-pill badge-${color} font-size-12">
                                    <span class="font-weight-semibold">${item['category']}</span>
                                </div>
                            </div> 
                        </div>
                    </li>`;
                $("#list-recent-deals").append(html);
                $(".list.deals").delay(index * 200).fadeIn();
            });
            $(".loading-deals").fadeOut();
        }
    });
</script>

<!--
        ##########################################################################################
        ### PAGE END  
        ##########################################################################################
        -->