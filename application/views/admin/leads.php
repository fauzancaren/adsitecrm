<div class="no-gutters mt-2 mb-4">
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
</div>

<div class="card">
    <div class="card-body">
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
        <div class="">
            <ul class="list-group list-group-flush" id="list-leads">

            </ul>
        </div>
    </div>
</div>
<!--  LIST DEAL SCRIPT   -->
<script>
    function capitalize(word) {
        return word[0].toUpperCase() + word.slice(1).toLowerCase();
    }
    var ses_category = "<?= $category ?>";
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
    reload_data(ses_category);
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