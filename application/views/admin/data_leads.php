<?php



$id = $this->uri->segment(3);

$data = $this->db->query("SELECT * from leads where id='$id' ")->result_array();

foreach ($data as $leads) {

    $time = $leads['time_new'];
    $convert_time = date('H:i:s', strtotime($time));

?>

    <form action="process/staging/update_<?php echo strtolower($leads['status']); ?>.php" method="post">

        <input type="hidden" name="id" value="<?php echo $id; ?>">






        <div class="container-fluid">

            <div class="row d-flex justify-content-between p-3">
                <div>
                    <h4>Data Leads</h4>

                </div>
                <div class="justify-content-end">
                    <div class="badge badge-pill badge-<?php

                                                        if ($leads['status'] == 'New') {
                                                            echo "green";
                                                        }
                                                        if ($leads['status'] == 'Contacted') {
                                                            echo "cyan";
                                                        }
                                                        if ($leads['status'] == 'Visit') {
                                                            echo "orange";
                                                        }
                                                        if ($leads['status'] == 'Close') {
                                                            echo "red";
                                                        }
                                                        ?> font-size-12  ">
                        <span class="font-weight-semibold"><?php echo $leads['status']; ?></span>
                    </div>
                    <div class="badge badge-pill badge-<?php

                                                        if ($leads['category'] == 'New') {
                                                            echo "cyan";
                                                        }
                                                        if ($leads['category'] == 'Cold') {
                                                            echo "blue";
                                                        }
                                                        if ($leads['category'] == 'Warm') {
                                                            echo "orange";
                                                        }
                                                        if ($leads['category'] == 'Hot') {
                                                            echo "red";
                                                        }
                                                        if ($leads['category'] == 'Invalid') {
                                                            echo "grey";
                                                        }
                                                        if ($leads['category'] == 'Pending') {
                                                            echo "brown";
                                                        }
                                                        if ($leads['category'] == 'Reserve') {
                                                            echo "purple";
                                                        }
                                                        if ($leads['category'] == 'Booking') {
                                                            echo "gold";
                                                        } ?> font-size-12  ">
                        <span class="font-weight-semibold"><?php echo $leads['category']; ?></span>
                    </div>

                </div>
            </div>
            <div class="card  ">
                <div class="card-body">
                    <div class="row align-items-center p-2 ">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-lg-0 mb-4 d-flex align-items-center ">
                            <div class=" d-flex align-items-center ">
                                <div>
                                    <div class="avatar avatar-text bg-default m-r-15 pt-1 " style="width: 50px; height: 50px;">
                                        <span class="text-primary font-size-25  ">
                                            <?php
                                            $initial = ucwords($leads['name']);
                                            echo $initial[0];
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="p-l-lg-30 mb-lg-0 mb-3 align-items-center">
                                    <h3 class=" m-b-5 mt-3"><?php echo $leads['name']; ?></h3>
                                    <p class="text-opacity font-size-13"><?php echo $leads['date_new'] . ' ' . $convert_time; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-12 ">
                            <div class="row px-3">
                                <div class="d-md-block d-none border-left col-1"></div>
                                <div class="col">
                                    <ul class="list-unstyled m-t-10">
                                        <li class="row">
                                            <p class="font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                                <!-- <span>Email: </span> -->
                                            </p>
                                            <p class="col font-weight-semibold"> <?php echo $leads['email']; ?></p>
                                        </li>
                                        <li class="row">
                                            <p class=" font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                                <!--<span>Phone: </span>-->
                                            </p>
                                            <p class="col font-weight-semibold"> <?php echo $leads['contact']; ?></p>
                                        </li>
                                        <li class="row">
                                            <p class=" font-weight-semibold text-dark m-b-5">
                                                <i class="far fa-map m-r-10 text-primary "></i>
                                                <!--<span>Location: </span>-->
                                            </p>
                                            <p class="col font-weight-semibold"><?php echo $leads['city']; ?></p>
                                        </li>
                                        <li class="row">
                                            <p class=" font-weight-semibold text-dark m-b-5">
                                                <i class="far fa-address-book  m-r-10 text-primary"></i>
                                                <!--<span>Location: </span>-->
                                            </p>
                                            <p class="col font-weight-semibold"><?php echo $leads['address']; ?></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <?php

                        function gantiformat($nomorhp)
                        {
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
                            return $nomorhp;
                        }

                        $hp = $leads['contact'];
                        $nomor = gantiformat($hp);

                        ?>

                        <div class="col-lg-6 col-md-4 col-sm-4 col-12 align-items-center ">
                            <div class="row mt-lg-0 mt-5 justify-content-end ">
                                <a href="tel:<?php echo $nomor; ?>" class="btn btn-primary-outline col-lg-3 col-6 mr-lg-2 ">
                                    <i class="fas fa-phone"></i>
                                    <span>Telepon</span>
                                </a>
                                <a href="https://wa.me/<?php echo $nomor; ?>" class="btn btn-primary col-lg-3 col-6">
                                    <i class="fab fa-whatsapp text-white"></i>
                                    <span>Whatsapp</span>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-semibold">
                                    <h6>Management</h6>
                                </label>
                                <select class="custom-select" name="management">
                                    <option value="<?php echo $leads['management']; ?>" selected><?php echo $leads['management']; ?></option>
                                    <?php
                                    $dtuser = mysqli_query($conn, "SELECT * FROM user /* WHERE level = 'agent_manager' */ ORDER BY id DESC ");
                                    while ($user = mysqli_fetch_assoc($dtuser)) {
                                    ?>
                                        <option value="<?php echo $user['name'] ?>"><?php echo $user['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-semibold">
                                    <h6>Agent Manager</h6>
                                </label>
                                <select class="custom-select" name="agent_manager">
                                    <option value="<?php echo $leads['agent_manager']; ?>" selected><?php echo $leads['agent_manager']; ?></option>
                                    <?php
                                    $dtuser = mysqli_query($conn, "SELECT * FROM user /* WHERE level = 'agent_manager' */ ORDER BY id DESC ");
                                    while ($user = mysqli_fetch_assoc($dtuser)) {
                                    ?>
                                        <option value="<?php echo $user['name'] ?>"><?php echo $user['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>


                            <div class="form-group mb-5">
                                <label class="font-weight-semibold">
                                    <h6>Sales/Agent</h6>
                                </label>
                                <select class="custom-select" name="agent">
                                    <option value="<?php echo $leads['agent']; ?>" selected><?php echo $leads['agent']; ?></option>
                                    <?php
                                    $dtuser = mysqli_query($conn, "SELECT * FROM user /* WHERE level = 'agent_manager' */ ORDER BY id DESC ");
                                    while ($user = mysqli_fetch_assoc($dtuser)) {
                                    ?>
                                        <option value="<?php echo $user['name']; ?>"><?php echo $user['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12 d-flex align-items-stretch ">
                    <div class="card w-100 ">
                        <div class="card-body">



                            <div class="row">
                                <div class="form-group col-lg-6 col-12">
                                    <label class="font-weight-semibold">
                                        <h6>Status</h6>
                                    </label>
                                    <select class="custom-select" name="status">

                                        <?php
                                        if (isset($leads['status']) && $leads['status'] == "New") {
                                        ?>
                                            <option <?php if (isset($leads['status']) && $leads['status'] == "Contacted") echo "selected"; ?> value="Contacted">Contacted</option>
                                        <?php }


                                        if (isset($leads['status']) && $leads['status'] == "Contacted") {
                                        ?>
                                            <option <?php if (isset($leads['status']) && $leads['status'] == "Contacted") echo "selected"; ?> value="Contacted">Contacted</option>
                                            <option <?php if (isset($leads['status']) && $leads['status'] == "Visit") echo "selected"; ?> value="Visit">Visit</option>
                                            <option <?php if (isset($leads['status']) && $leads['status'] == "Close") echo "selected"; ?> value="Close">Close</option>
                                        <?php }


                                        if (isset($leads['status']) && $leads['status'] == "Visit") {
                                        ?>
                                            <option <?php if (isset($leads['status']) && $leads['status'] == "Visit") echo "selected"; ?> value="Visit">Visit</option>
                                            <option <?php if (isset($leads['status']) && $leads['status'] == "Close") echo "selected"; ?> value="Close">Close</option>
                                        <?php }


                                        if (isset($leads['status']) && $leads['status'] == "Close") {
                                        ?>
                                            <option <?php if (isset($leads['status']) && $leads['status'] == "Close") echo "selected"; ?> value="Close">Close</option>
                                        <?php }  ?>


                                    </select>
                                </div>

                                <div class="form-group col-lg-6 col-12">
                                    <label class="font-weight-semibold">
                                        <h6>Category</h6>
                                    </label>
                                    <select class="custom-select" name="category">
                                        <?php
                                        if (isset($leads['status']) && $leads['status'] == "New") {
                                        ?>

                                            <option value="Warm" <?php if (isset($leads['category']) && $leads['category'] == "Warm") echo "selected"; ?>>Warm</option>
                                            <option value="Pending" <?php if (isset($leads['category']) && $leads['category'] == "Pending") echo "selected"; ?>>Pending</option>
                                            <option value="Invalid" <?php if (isset($leads['category']) && $leads['category'] == "Invalid") echo "selected"; ?>>Invalid</option>

                                        <?php } ?>

                                        <?php
                                        if (isset($leads['status']) && $leads['status'] == "Contacted") {
                                        ?>
                                            <option value="Warm" <?php if (isset($leads['category']) && $leads['category'] == "Warm") echo "selected"; ?>>Warm</option>
                                            <option value="Hot" <?php if (isset($leads['category']) && $leads['category'] == "Hot") echo "selected"; ?>>Hot</option>
                                            <option value="Pending" <?php if (isset($leads['category']) && $leads['category'] == "Pending") echo "selected"; ?>>Pending</option>
                                            <option value="Invalid" <?php if (isset($leads['category']) && $leads['category'] == "Invalid") echo "selected"; ?>>Invalid</option>
                                        <?php } ?>

                                        <?php
                                        if (isset($leads['status']) && $leads['status'] == "Visit") {
                                        ?>
                                            <option value="Warm" <?php if (isset($leads['category']) && $leads['category'] == "Warm") echo "selected"; ?>>Warm</option>
                                            <option value="Hot" <?php if (isset($leads['category']) && $leads['category'] == "Hot") echo "selected"; ?>>Hot</option>
                                            <option value="Pending" <?php if (isset($leads['category']) && $leads['category'] == "Pending") echo "selected"; ?>>Pending</option>
                                            <option value="Invalid" <?php if (isset($leads['category']) && $leads['category'] == "Invalid") echo "selected"; ?>>Invalid</option>
                                        <?php } ?>

                                        <?php
                                        if (isset($leads['status']) && $leads['status'] == "Close") {
                                        ?>
                                            <option value="Warm" <?php if (isset($leads['category']) && $leads['category'] == "Warm") echo "selected"; ?>>Warm</option>
                                            <option value="Hot" <?php if (isset($leads['category']) && $leads['category'] == "Hot") echo "selected"; ?>>Hot</option>
                                            <option value="Pending" <?php if (isset($leads['category']) && $leads['category'] == "Pending") echo "selected"; ?>>Pending</option>
                                            <option value="Invalid" <?php if (isset($leads['category']) && $leads['category'] == "Invalid") echo "selected"; ?>>Invalid</option>
                                            <option value="Reserve" <?php if (isset($leads['category']) && $leads['category'] == "Reserve") echo "selected"; ?>>Reserve</option>
                                            <option value="Booking" <?php if (isset($leads['category']) && $leads['category'] == "Booking") echo "selected"; ?>>Booking</option>
                                        <?php } ?>


                                    </select>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="form-group col-12">
                                    <label class="font-weight-semibold">
                                        <h6>Reserve</h6>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="text" id="tanpa-rupiah-reserve" class="form-control" placeholder="Reserve Amount" name="reserve" value="<?php
                                                                                                                                                                if ($leads['reserve'] == "") {
                                                                                                                                                                    echo 0;
                                                                                                                                                                } else {
                                                                                                                                                                    $number = $leads['reserve'];
                                                                                                                                                                    $formatted_number = number_format($number, 0, '.', '.');
                                                                                                                                                                    echo $formatted_number; // output: 1.234.568
                                                                                                                                                                }

                                                                                                                                                                ?>">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="font-weight-semibold">
                                        <h6>Booking</h6>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="text" id="tanpa-rupiah-booking" class="form-control" placeholder="Booking Amount" name="booking" value="<?php if ($leads['booking'] == "") {
                                                                                                                                                                    echo 0;
                                                                                                                                                                } else {
                                                                                                                                                                    $number = $leads['booking'];
                                                                                                                                                                    $formatted_number = number_format($number, 0, '.', '.');
                                                                                                                                                                    echo $formatted_number; // output: 1.234.568
                                                                                                                                                                }
                                                                                                                                                                ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body ">
                    <label class="font-weight-semibold">
                        <h6>Notes</h6>
                    </label>
                    <textarea name="note" class="form-control w-100 p-3" rows=5><?php echo $leads['note']; ?></textarea>
                </div>
            </div>
            <div class="row p-3 mb-5">
                <div class=" col-12 align-items-center ">
                    <div class="row mt-lg-0  justify-content-end ">
                        <button type="button" class="btn bg-white col-lg-2 col-6 mr-lg-2 " data-toggle="modal" data-target="#delete_leads">
                            <!-- <i class="fas fa-phone"></i>-->
                            <span>Delete</span>
                        </button>
                        <button class="btn btn-primary col-lg-2 col-6" type="submit" name="submit">
                            <!-- <i class="fab fa-whatsapp"></i>-->
                            <span>Save</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>



    </form>
<?php } ?>


<?php
/*
require 'assets/widget/footer.php';
require 'assets/widget/float_button.php';
require 'assets/widget/add_leads.php';
require 'assets/widget/delete_leads.php';
*/
?>


<script src="assets/vendors/select2/select2.min.js"></script>
<script src="assets/vendors/quill/quill.min.js"></script>
<script src="assets/js/pages/e-commerce-product-edit.js"></script>


<script>
    var tanpa_rupiah_reserve = document.getElementById('tanpa-rupiah-reserve');
    tanpa_rupiah_reserve.addEventListener('keyup', function(e) {
        tanpa_rupiah_reserve.value = formatRupiah(this.value);
    });

    var tanpa_rupiah_booking = document.getElementById('tanpa-rupiah-booking');
    tanpa_rupiah_booking.addEventListener('keyup', function(e) {
        tanpa_rupiah_booking.value = formatRupiah(this.value);
    });



    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>