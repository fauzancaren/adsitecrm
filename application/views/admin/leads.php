<!-- <div class="no-gutters mt-2 mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <div class="media m-v-10 align-items-center">
            <div class="media-body m-l-15">
                <h4 class="m-b-0">Data Leads (<span class="category">New</span>)</h4>
            </div>
        </div>
        <div class="dropdown dropdown-animated scale-left mr-2" id="lead-status">
            <button type="button" class="btn btn-default dropdown-toggle category" data-toggle="dropdown">New</button>
            <div class="dropdown-menu">
                <button class="dropdown-item btn" type="button" id="btn-new">New</button>
                <button class="dropdown-item btn" type="button" id="btn-contacted">Contacted</button>
                <button class="dropdown-item btn" type="button" id="btn-visit">Visit</button>
                <button class="dropdown-item btn" type="button" id="btn-pending">Close</button>
            </div>
        </div>
    </div>
</div> -->

<div class="card">
    <div class="card-body p-3">
        <!--
        <div class="d-lg-none d-sm-none d-block py-3">
            <form action="search_leads.php" method="get" class="form-inline">
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
-->
        <div class="navbar-page">
            <div class="row ">
                <div class="col-6  d-lg-block d-none ">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-new-tab" data-toggle="pill" href="#pills-new" role="tab" aria-controls="pills-new" aria-selected="true">New</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contacted-tab" data-toggle="pill" href="#pills-contacted" role="tab" aria-controls="pills-contacted" aria-selected="false">Contacted</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-visit-tab" data-toggle="pill" href="#pills-visit" role="tab" aria-controls="pills-visit" aria-selected="false">Visit</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-close-tab" data-toggle="pill" href="#pills-close" role="tab" aria-controls="pills-close" aria-selected="false">Close</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="d-flex justify-content-end">
                        <div class="input-group col-lg-6 col-10 p-0">
                            <input type="text" class="form-control form-control-sm input-light " placeholder="Search leads..." aria-label="Search" aria-describedby="basic-addon2" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-sm" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-sm ml-2" type="button" data-toggle="offcanvas">
                            <i class="fas fa-filter fa-sm"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="tab-content row p-2 py-3 " id="pills-tabContent">
                <div class="tab-pane fade show active col" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">New Leads</div>
                <div class="tab-pane fade col" id="pills-contacted" role="tabpanel" aria-labelledby="pills-contacted-tab">Contacted</div>
                <div class="tab-pane fade col" id="pills-visit" role="tabpanel" aria-labelledby="pills-visit-tab">Visit</div>
                <div class="tab-pane fade col" id="pills-close" role="tabpanel" aria-labelledby="pills-close-tab">close</div>
            </div>
        </div>
        <div class="">
            <ul class="list-group list-group-flush" id="list-leads">

            </ul>
        </div>



    </div>
</div>

<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <div class="d-flex justify-content-between">
        <h5>Advance Setting</h5>
        <button type="button" class="close" aria-label="Close" data-toggle="offcanvas">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="d-block pt-4">
        <h6 class="font-weight-bold" style="color:#001A72"><i class="fas fa-list mr-2"></i>Row Count</h6>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-row-1">10 Rows</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filter-row" id="filter-row-1" value="10" checked>
            </div>
        </div>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-row-2">25 Rows</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filter-row" id="filter-row-2" value="25">
            </div>
        </div>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-row-3">50 Rows</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filter-row" id="filter-row-3" value="50">
            </div>
        </div>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-row-4">100 Rows</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filter-row" id="filter-row-4" value="100">
            </div>
        </div>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-row-5">All Rows</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filter-row" id="filter-row-5" value="">
            </div>
        </div>
        <span class="border d-block mb-2 mt-2"></span>

        <h6 class="font-weight-bold" style="color:#001A72"><i class="fas fa-calendar-alt mr-2"></i>Filter Date</h6>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-date-1">Today</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filter-date" id="filter-date-1" value="0" checked>
            </div>
        </div>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-date-2">last 7 days</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filter-date" id="filter-date-2" value="7">
            </div>
        </div>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-date-3">last 30 days</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filter-date" id="filter-date-3" value="30">
            </div>
        </div>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-date-4">last 90 days</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filter-date" id="filter-date-4" value="90">
            </div>
        </div>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-date-5">Custom</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filter-date" id="filter-date-5" value="">
            </div>
        </div>
        <input class="form-control form-control-sm" type="text" name="daterange" value="01/01/2018 - 01/15/2018" disabled />
        <span class="border d-block mb-2 mt-2"></span>


        <h6 class="font-weight-bold" style="color:#001A72"><i class="fas fa-shapes mr-2"></i>Filter Category</h6>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-categori-1">Cold</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filter-categori" id="filter-categori-1" value="Cold" checked>
            </div>
        </div>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-categori-2">Warm</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filter-categori" id="filter-categori-2" value="Warm">
            </div>
        </div>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-categori-3">Hot</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filter-categori" id="filter-categori-3" value="Hot">
            </div>
        </div>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-categori-4">Invalid</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filter-categori" id="filter-categori-4" value="Invalid">
            </div>
        </div>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-categori-5">Pending</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filter-categori" id="filter-categori-5" value="Pending">
            </div>
        </div>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-categori-6">Reserve</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filter-categori" id="filter-categori-6" value="Reserve">
            </div>
        </div>
        <div class="d-flex justify-content-between pb-0">
            <label for="filter-categori-7">Boking/Checkout</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filter-categori" id="filter-categori-7" value="Checkout">
            </div>
        </div>
        <span class="border d-block mb-2 mt-2"></span>
        <div class="d-flex justify-content-center pb-0 col-12 p-0">
            <button type="button" class="btn btn-primary btn-sm w-100" data-toggle="offcanvas">Submit and view</button>
        </div>
    </div>
</div>
<!--  LIST DEAL SCRIPT   -->
<script>
    $(function() {

        $('[data-toggle="offcanvas"]').on('click', function() {
            $('.offcanvas-collapse').toggleClass('open')
        })

        $('.navbar-nav>li>.nav-link').on('click', function() {
            $('.offcanvas-collapse').toggleClass('open')
        })

        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    })

    function capitalize(word) {
        return word[0].toUpperCase() + word.slice(1).toLowerCase();
    }
    var ses_category = "";
    reload_data = function(category) {
        $("#list-leads").html(`<li class="list-group-item p-h-0 "> 
                    <div class="d-flex align-items-center justify-content-between ">
                        <div class="d-flex align-items-center col-lg-2 col-md-3 col-0 pl-lg pl-0">
                            <div>
                                <h6 class="m-b-1 ">
                                    <a href="" class="text-dark "> Name</a>
                                </h6>
                            </div>
                        </div>
                        <div class="font-size-13  align-items-center col">
                            <h6>Category</h6>
                        </div>
                        <div class="font-size-13 align-items-center d-lg-block d-md-block d-none col">
                            <h6>contact</h6>
                        </div>
                        <div class="font-size-13 align-items-center d-lg-block d-none col">
                            <h6>Adress</h6>
                        </div>
                        <div class="font-size-13 align-items-center d-lg-block d-none col">
                            <h6>Product</h6>
                        </div>
                        <div class="font-size-13 align-items-center d-lg-block d-md-block d-none col">
                            <h6>Source</h6>
                        </div>

                        <div class="font-size-13 align-items-center  d-lg-block d-md-block d-none col">
                            <h6>Follow Up</h6>
                        </div>
                    </div> 
                </li> `);
        $(".category").text(capitalize(category));
        $.ajax({
            dataType: "json",
            type: "POST",
            data: {
                "status": capitalize(category)
            },
            url: "<?= base_url("admin/get_list_leads") ?>",
            success: function(data) {
                jQuery.each(data, function(index, item) {
                    var datenew = new moment(item["date_new"]);
                    var timenew = new moment(item["time_new"]);
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
                                <div class="d-flex align-items-center col-lg-2 col-md-3 col-9 pl-lg pl-0">
                                    <div class="avatar avatar-text bg-default m-r-15">
                                        <span class="text-primary">${item['name'].slice(0,1)}</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-dark ">${item['name']}</h6>
                                        <span class="text-muted font-size-13">${datenew.format("YYYY-MM-DD")} ${timenew.format("H:mm:ss")}</span>
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
                                <div class="font-size-13 align-items-center d-lg-block d-none col">
                                    <span>${item['source']}</span>
                                </div> 
                                <div class="font-size-13 align-items-center d-lg-block d-md-block d-none col">
                                    <button class="btn btn-sm btn-primary">
                                        <span>Whatsapp</span>
                                    </button>
                                </div>
                            </div>
                        </li>`;
                    $("#list-leads").append(html);
                    $(".list.new").delay(index * 50).fadeIn();
                });
                $(".loading-new").fadeOut();
            }
        });
    }
    //reload_data(ses_category);
    $("#lead-status .dropdown-item").click(function() {
        if ($("#lead-status .dropdown-toggle").text() != $(this).text()) {
            const nextURL = "<?= base_url("admin/leads/") ?>" + $(this).text().toLowerCase();
            const nextTitle = 'CRM - Adsite.id';
            const nextState = {
                additionalInformation: 'Updated the URL with JS'
            };
            window.history.pushState(nextState, nextTitle, nextURL);

            reload_data($(this).text());
        };
    });
    window.addEventListener('locationchange', function() {
        reload_data(window.location.href.split("/").pop());
    });
    (() => {
        let oldPushState = history.pushState;
        history.pushState = function pushState() {
            let ret = oldPushState.apply(this, arguments);
            window.dispatchEvent(new Event('pushstate'));
            window.dispatchEvent(new Event('locationchange'));
            return ret;
        };

        let oldReplaceState = history.replaceState;
        history.replaceState = function replaceState() {
            let ret = oldReplaceState.apply(this, arguments);
            window.dispatchEvent(new Event('replacestate'));
            window.dispatchEvent(new Event('locationchange'));
            return ret;
        };

        window.addEventListener('popstate', () => {
            window.dispatchEvent(new Event('locationchange'));
        });
    })();
</script>
<style>
    .offcanvas-collapse {
        position: fixed;
        z-index: 1040;
        top: 0;
        bottom: 0;
        right: 0;
        width: 350px;
        padding: 1rem 2rem;
        overflow-y: auto;
        background-color: #F9F7F7;
        transition: -webkit-transform .3s ease-in-out;
        transition: transform .3s ease-in-out;
        transition: transform .3s ease-in-out, -webkit-transform .3s ease-in-out;
        -webkit-transform: translateX(100%);
        transform: translateX(100%);
    }

    .offcanvas-collapse.open {
        -webkit-transform: translateX(0);
        transform: translateX(0);
        /* Account for horizontal padding on navbar */
    }

    input.date:before {
        content: "";

    }
</style>