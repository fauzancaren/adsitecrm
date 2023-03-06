<?php

$id = $_GET['id'];

$data = $this->db->query("SELECT * FROM user WHERE id='$id' ")->result_array();

foreach ($data as $leads) {

?>

    <form action="process/update_user.php" method="post">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <!-- Page Container START -->


        <div class="container-fluid">
            <div class="card  p-2">
                <div class="card-body">
                    <div class="row align-items-center ">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-lg-0 mb-4 align-items-center ">
                            <div class=" d-flex align-items-center ">
                                <div>
                                    <div class="avatar avatar-text bg-default m-r-15 pt-3" style="width: 70px; height: 70px;">
                                        <span class="text-primary font-size-30  ">
                                            <?php
                                            $initial = $leads['name'];
                                            echo $initial[0];
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="p-l-lg-30 mb-lg-0 mb-3 align-items-center">
                                    <h3 class=" m-b-5 mt-3"><?php echo $leads['name']; ?></h3>
                                    <p class="text-opacity font-size-13"><?php echo $leads['city']; ?></p>
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
                                                <i class="m-r-10 text-primary anticon anticon-compass"></i>
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
                <div class="col-lg-8 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-6 col-12">

                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="productName">
                                            <h6>Username</h6>
                                        </label>
                                        <input type="text" class="form-control" value="<?php echo $leads['username']; ?>" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="productPrice">
                                            <h6>Name</h6>
                                        </label>
                                        <input type="text" class="form-control" id="productPrice" placeholder="Price" value="<?php echo $leads['name']; ?>" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="productPrice">
                                            <h6>city</h6>
                                        </label>
                                        <input type="text" class="form-control" id="productPrice" placeholder="Price" value="<?php echo $leads['city']; ?>" name="city">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="productPrice">
                                            <h6>Address</h6>
                                        </label>
                                        <input type="text" class="form-control" id="productPrice" placeholder="Price" value="<?php echo $leads['address']; ?>" name="address">
                                    </div>


                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="productPrice">
                                            <h6>Contact</h6>
                                        </label>
                                        <input type="text" class="form-control" id="productPrice" placeholder="Price" value="<?php echo $leads['contact']; ?>" name="contact">
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="productName">
                                            <h6>Email</h6>
                                        </label>
                                        <input type="text" class="form-control" value="<?php echo $leads['email']; ?>" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="productPrice">
                                            <h6>Password</h6>
                                        </label>
                                        <input type="password" class="form-control" id="productPrice" placeholder="Price" value="<?php echo $leads['password']; ?>" name="password">
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-12 d-flex align-items-stretch ">
                    <div class="card w-100 ">
                        <div class="card-body">

                            <div class="form-group mb-5">
                                <label class="font-weight-semibold" for="productStatus">
                                    <h6>Level</h6>
                                </label>
                                <select class="custom-select" id="productStatus" name="level">

                                    <option <?php if (isset($leads['level']) && $leads['level'] == "Admin") echo "selected"; ?> value="Admin">Admin</option>
                                    <option <?php if (isset($leads['level']) && $leads['level'] == "Agent") echo "selected"; ?> value="Agent">Agent</option>
                                    <option <?php if (isset($leads['level']) && $leads['level'] == "Agent Manager") echo "selected"; ?> value="Agent Manager">Agent Manager</option>
                                    <option <?php if (isset($leads['level']) && $leads['level'] == "Management") echo "selected"; ?> value="Management">Management</option>

                                </select>
                            </div>

                            <div class="form-group mb-5">
                                <label class="font-weight-semibold" for="productStatus">
                                    <h6>Management</h6>
                                </label>
                                <select class="custom-select" id="productStatus" name="management">
                                    <option value="<?php echo $leads['management']; ?>"><?php echo $leads['management']; ?></option>
                                </select>
                            </div>
                            <div class="form-group mb-5">
                                <label class="font-weight-semibold" for="productStatus">
                                    <h6>Agent Manager</h6>
                                </label>
                                <select class="custom-select" id="productStatus" name="agent_manager">
                                    <option value="<?php echo $leads['agent_manager']; ?>"><?php echo $leads['agent_manager']; ?></option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3 mb-5 d-flex justify-content-end ">
            <button type="button" class="btn btn-light col-lg-2 col-6 " data-toggle="modal" data-target="#delete_account">
                <!-- <i class="fas fa-phone"></i>-->
                <span>Delete</span>
            </button>
            <button class="btn btn-primary col-lg-2 col-6" type="submit" name="submit">
                <!-- <i class="fab fa-whatsapp"></i>-->
                <span>Save</span>
            </button>
        </div>

        <!-- Page Container END -->
    </form>



<?php } ?>


<script src="assets/vendors/select2/select2.min.js"></script>
<script src="assets/vendors/quill/quill.min.js"></script>
<script src="assets/js/pages/e-commerce-product-edit.js"></script>