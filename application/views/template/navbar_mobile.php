<nav class=" bg-white fixed-bottom p-3 d-lg-none d-block">
    <div class="container-fluid">

        <div class="row d-flex align-items-center">

            <a href="<?= base_url("admin") ?>" class="col">
                <span class="icon-holder d-flex justify-content-center align-items-center">
                    <i class="anticon anticon-appstore font-size-20"></i>
                </span>
            </a>
            <a href="<?= base_url("admin/report") ?>" class="col">
                <span class="icon-holder d-flex justify-content-center align-items-center">
                    <i class="anticon anticon-pie-chart font-size-20"></i>
                </span>
            </a>
            <a href="" class="col d-flex justify-content-center" type="button" data-toggle="modal" data-target="#add_leads">
                <span class="icon-holder rounded-circle position-static p-2 p-h-10 " style=" background-color:#0b1460">
                    <i class="anticon anticon-plus font-size-16  text-white "></i>
                </span>
            </a>
            <a href="<?= base_url("admin/leads") ?>" class="col">
                <span class="icon-holder d-flex justify-content-center align-items-center">
                    <i class="anticon anticon-idcard font-size-20"></i>
                </span>
            </a>

            <a href="<?= base_url("admin/profile") ?>" class="col">
                <span class="icon-holder d-flex justify-content-center align-items-center">
                    <i class="anticon anticon-team font-size-20"></i>
                </span>
            </a>

        </div>

    </div>
</nav>