        <!-- Content Wrapper START 
        <div class="page-header">
            <div class="d-md-flex align-items-md-center justify-content-between">
                <div class="media m-v-10 align-items-center">
                 
                    <div class="avatar avatar-image avatar-lg align-items-center " style="background:#dcefef;">
                           
                        <i class="anticon anticon-user text-dark font-size-20 "></i>
                        <img src="assets/images/avatars/thumb-3.jpg" alt="">
                    
                    </div>
                  
    <div class="media-body p-l-15">
        <h4 class="m-b-0">New Leads</h4>
       <span class="text-gray">Sales Executive</span> 
    </div>
</div>

<div class="d-md-flex align-items-center d-none">
    <button class="btn btn-primary">
        <i class="anticon anticon-plus-circle m-r-5"></i>
        <span>Add Product</span>
    </button>
</div>

</div>
</div>
-->


        <div class="no-gutters mt-2 mb-4">
            <div class="d-flex align-items-center justify-content-between">
                <div class="media m-v-10 align-items-center">
                    <div class="media-body m-l-15">
                        <h4 class="m-b-0">Close</h4>
                        <!-- <span class="text-gray">Project Manager</span>-->
                    </div>
                </div>
                <div class="dropdown dropdown-animated scale-left mr-2">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Close
                    </button>
                    <div class="dropdown-menu">
                        <a href="<?= base_url("admin/new_leads") ?>" class="dropdown-item btn" type="button">New Leads</a>
                        <a href="<?= base_url("admin/contacted_leads") ?>" class="dropdown-item btn" type="button">Contacted</a>
                        <a href="<?= base_url("admin/visit") ?>" class="dropdown-item btn" type="button">Visit</a>
                        <a href="<?= base_url("admin/pending_leads") ?>" class="dropdown-item btn" type="button">Pending</a>
                        <a href="<?= base_url("admin/invalid_leads") ?>" class="dropdown-item btn" type="button">Invalid</a>
                    </div>
                </div>
            </div>
        </div>




        <div class="card">
            <div class="card-body">

                <div class="d-lg-none d-sm-none d-block py-3">
                    <form action="search_leads.php" method="get" class=" form-inline  ">
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
                <!--
                <div class="d-flex justify-content-between align-items-center">
                   
                    <h5>New Leads</h5>
                    <div>
                        <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>
                    </div>     
            </div>
            -->
                <div class="">
                    <ul class="list-group list-group-flush">


                        <li class="list-group-item p-h-0 ">

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

                        </li>

                        <?php

                        $tanggal_sekarang = date('Y-m-d');
                        $tanggal_sekarang_convert = date('d/m/Y');

                        $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days'));
                        $interval_convert = date('d/m/Y', strtotime($tanggal_sekarang . ' - 30 days'));
                        $tgl_pertama =  date('m/01/Y');



                        $data = $this->db->query("SELECT * FROM leads WHERE status =  'Close' AND category IN ('New','Cold','Warm','Hot','Reserve','Booking')  AND date_close BETWEEN '$interval' AND '$tanggal_sekarang' ORDER BY id DESC ")->result_array;


                        foreach ($data as $isi_data) {

                            $date_new = $isi_data['date_new'];
                            $timenew = $isi_data['time_new'];
                            $timenew_cvt = date('H:i:s', strtotime($timenew));

                        ?>


                            <li class="list-group-item p-h-0 align-items-center list" onclick="location.href='<?= base_url('admin/data_leads') ?>?id=<?php echo $isi_data['id']; ?>'">

                                <div class="d-flex align-items-center justify-content-between">

                                    <div class="d-flex align-items-center col-lg-2 col-md-3 col-9 pl-lg pl-0">
                                        <div class="avatar avatar-text bg-default m-r-15">
                                            <span class="text-primary">
                                                <?php
                                                $initial = $isi_data['name'];
                                                echo $initial[0];
                                                ?>
                                            </span>
                                        </div>
                                        <div>
                                            <h6 class="text-dark mb-0 "> <?php echo $isi_data['name']; ?></h6>

                                            <span class="text-muted font-size-13"><?php echo $date_new . ' ' . $timenew_cvt; ?></span>
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
                                                                            } ?>  font-size-12  ">
                                            <span class="font-weight-semibold"><?php echo $isi_data['category']; ?></span>
                                        </div>
                                    </div>
                                    <div class="font-size-13 align-items-center d-lg-block d-md-block d-none col">
                                        <p><?php echo $isi_data['contact']; ?></p>
                                    </div>
                                    <div class="font-size-13 align-items-center d-lg-block  d-none col">
                                        <p><?php echo $isi_data['city']; ?></p>
                                    </div>
                                    <div class="font-size-13 align-items-center d-lg-block d-none col">
                                        <p><?php echo $isi_data['product']; ?></p>
                                    </div>
                                    <div class="font-size-13 align-items-center d-lg-block d-md-block d-none col">
                                        <p><?php echo $isi_data['source']; ?></p>
                                    </div>

                                    <div class="font-size-13 align-items-center d-lg-block d-md-block d-none col">
                                        <button class="btn btn-sm btn-primary">
                                            <span>Whatsapp</span>
                                        </button>
                                    </div>
                                </div>

                            </li>


                        <?php } ?>

                    </ul>
                </div>
            </div>




            <?php
            /*
            require 'assets/widget/footer.php';
            require 'assets/widget/float_button.php';
            require 'assets/widget/add_leads.php';
            require 'assets/widget/add_user.php';
            require 'assets/widget/modal_logout.php';
            */
            ?>