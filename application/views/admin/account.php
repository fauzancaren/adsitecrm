<div class="page-header">
    <div class="d-flex mt-lg-0 mt-3 justify-content-between">
        <div class="media m-v-10 align-items-center">

            <div class="media-body p-l-15">
                <h4 class="m-b-0">Admin User</h4>
            </div>
        </div>

        <div class="d-md-flex align-items-center ">
            <div class="dropdown dropdown-animated scale-left mr-2">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    Pilih Group
                </button>
                <div class="dropdown-menu">
                    <a href="account.php" type="button" class="dropdown-item" type="button">Admin</a>
                    <a href="account.php" type="button" class="dropdown-item" type="button">Sales/Agent</a>
                </div>
            </div>
            <button class="btn btn-primary d-lg-block d-none" type="button" data-toggle="modal" data-target="#add_user">
                <i class="anticon anticon-plus-circle m-r-5"></i>
                <span>Add User</span>
            </button>
        </div>

    </div>
</div>



<div class="card">
    <div class="card-body">
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
                            <h6>Level</h6>
                        </div>
                        <div class="font-size-13 align-items-center d-lg-block d-md-block d-none col">
                            <h6>contact</h6>
                        </div>
                        <div class="font-size-13 align-items-center d-lg-block d-none col">
                            <h6>Adress</h6>
                        </div>
                        <div class="font-size-13 align-items-center d-lg-block d-none col">
                            <h6>Agent Manager</h6>
                        </div>
                        <div class="font-size-13 align-items-center d-lg-block d-md-block d-none col">
                            <h6>General Manager</h6>
                        </div>

                        <div class="font-size-13 align-items-center  d-lg-block d-md-block d-none col">
                            <h6>Whatsapp</h6>
                        </div>
                    </div>

                </li>

                <?php

                $data = $this->db->query("SELECT * FROM user ORDER BY id DESC ")->result_array();


                foreach ($data as $isi_data) {

                ?>


                    <li class="list-group-item p-h-0 align-items-center list" onclick="location.href='<?= base_url("admin/profile") ?>?id=<?php echo $isi_data['id']; ?>'">

                        <div class="d-flex align-items-center justify-content-between">

                            <div class="d-flex align-items-center col-lg-2 col-md-3 col-7 pl-lg pl-0">
                                <div class="avatar avatar-text bg-default m-r-15">
                                    <span class="text-primary">
                                        <?php
                                        $initial = $isi_data['name'];
                                        echo $initial[0];
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <h6 class="text-dark mb-0 "> <?= $isi_data['name']; ?></h6>
                                </div>
                            </div>

                            <div class="col-lg col-5">
                                <div class="badge badge-pill badge-<?php

                                                                    if ($isi_data['level'] == 'Admin') {
                                                                        echo "cyan";
                                                                    }
                                                                    if ($isi_data['level'] == 'Management') {
                                                                        echo "blue";
                                                                    }
                                                                    if ($isi_data['level'] == 'Agent Manager') {
                                                                        echo "orange";
                                                                    }
                                                                    if ($isi_data['level'] == 'Agent') {
                                                                        echo "red";
                                                                    }
                                                                    ?>  font-size-12  ">
                                    <span class="font-weight-semibold"><?php echo $isi_data['level']; ?></span>
                                </div>
                            </div>
                            <div class="font-size-13 align-items-center d-lg-block d-md-block d-none col">
                                <p><?php echo $isi_data['contact']; ?></p>
                            </div>
                            <div class="font-size-13 align-items-center d-lg-block  d-none col">
                                <p><?php echo $isi_data['city']; ?></p>
                            </div>
                            <div class="font-size-13 align-items-center d-lg-block d-none col">
                                <p><?php echo $isi_data['agent_manager']; ?></p>
                            </div>
                            <div class="font-size-13 align-items-center d-lg-block d-md-block d-none col">
                                <p><?php echo $isi_data['management']; ?></p>
                            </div>


                            <?php

                            $nomorhp = $isi_data['contact'];
                            //Terlebih dahulu kita trim dl
                            $nomorhp = trim($nomorhp);
                            //bersihkan dari karakter yang tidak perlu
                            $nomorhp = strip_tags($nomorhp);
                            // Berishkan dari spasi
                            $nomorhp = str_replace(" ", "", $nomorhp);
                            // bersihkan dari bentuk seperti  (022) 66677788
                            $nomorhp = str_replace("(", "", $nomorhp);
                            // bersihkan dari format yang ada titik seperti 0811.222.333.4
                            $nomorhp = str_replace(".", "", $nomorhp);
                            $nomorhp = str_replace("-", "", $nomorhp);

                            //cek apakah mengandung karakter + dan 0-9
                            if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
                                // cek apakah no hp karakter 1-3 adalah +62
                                if (substr(trim($nomorhp), 0, 3) == '+62') {
                                    $nomorhp = trim($nomorhp);
                                }
                                // cek apakah no hp karakter 1 adalah 0
                                elseif (substr($nomorhp, 0, 1) == '0') {
                                    $nomorhp = '+62' . substr($nomorhp, 1);
                                }
                            }

                            ?>


                            <div class="font-size-13 align-items-center d-lg-block d-md-block d-none col">
                                <a href="https://wa.me/<?php echo $nomorhp; ?>" class="btn btn-sm btn-primary">
                                    <span>Whatsapp</span>
                                </a>
                            </div>
                        </div>

                    </li>


                <?php } ?>

            </ul>
        </div>
    </div>
</div>

</div>