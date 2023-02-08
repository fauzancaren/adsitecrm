<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
</button>
-->

<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="add_user">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add User</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!-- content modal add leads--------------------------------------------------------------------------------------------------------------------- -->

                <script src="assets/vendors/jquery-validation/jquery.validate.min.js"></script>

                <form action="process/add_user.php" method="post" id="form-validation_account">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <div class="form-group row">
                                <label class="col-2 col-form-label control-label">Name</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label control-label">Username</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="usernname" placeholder="Enter username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label control-label">Adress</label>

                                <div class="col-lg-3 col-12 mb-lg mb-2">
                                    <input type="text" class="form-control" name="city" placeholder="Enter City">
                                </div>

                                <div class="col-lg-7 col-12">
                                    <input type="text" class="form-control" name="address" placeholder="Enter Full Address">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" placeholder="Enter a valid email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label control-label">Contact</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="contact" placeholder="Enter max 18 characters">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label control-label">Level</label>
                                <div class="col-sm-10">
                                    <select class="form-control " name="level">
                                        <option value="" selected>- Select Level -</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Agent">Sales/Agent</option>
                                        <option value="Agent Manager">Agent Manager</option>
                                        <option value="General Manager">General Manager</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label control-label">Product</label>
                                <div class="col-sm-10">
                                    <select class="form-control " name="product">
                                        <option value="" selected>- Product -</option>
                                        <option value="test">test</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label control-label">GM</label>
                                <div class="col-sm-10">
                                    <select class="form-control " name="management" required>
                                        <option value="" selected>- General Manager -</option>
                                        <?php
                                        $dtuser = mysqli_query($conn, "SELECT * FROM user /* WHERE level = 'management' */ ORDER BY id DESC ");
                                        while ($user = mysqli_fetch_assoc($dtuser)) {
                                        ?>
                                            <option value="<?php echo $user['name'] ?>"><?php echo $user['name'] ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label control-label">Manager</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="agent_manager" required>
                                        <option value="" selected>- Manager -</option>
                                        <?php
                                        $dtuser = mysqli_query($conn, "SELECT * FROM user /* WHERE level = 'agent_manager' */ ORDER BY id DESC ");
                                        while ($user = mysqli_fetch_assoc($dtuser)) {
                                        ?>
                                            <option value="<?php echo $user['name'] ?>"><?php echo $user['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label control-label">Password</label>
                                <div class="col-sm-5">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Enter password">
                                </div>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                                </div>
                            </div>

                        </div>
                    </div>






                    <!-- end of content modal leads -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script>
    $("#form-validation_account").validate({
        ignore: ':hidden:not(:checkbox)',
        errorElement: 'label',
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        rules: {
            inputRequired: {
                required: true
            },
            name: {
                required: true
            },
            username: {
                required: true
            },
            city: {
                required: true
            },
            address: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            contact: {
                required: true,
                rangelength: [2, 18]
            },
            source: {
                required: true
            },
            product: {
                required: true
            },
            agent_manager: {
                required: true
            },

            agent: {
                required: true
            },
            status: {
                required: true
            },
            category: {
                required: true
            },
            inputMinLength: {
                required: true,
                minlength: 3
            },
            inputMaxLength: {
                required: true,
                minlength: 8
            },
            inputUrl: {
                required: true,
                url: true
            },

            inputMinValue: {
                required: true,
                min: 8
            },
            inputMaxValue: {
                required: true,
                max: 6
            },
            inputRangeValue: {
                required: true,
                max: 6,
                range: [6, 12]
            },

            password: {
                required: true
            },
            confirm_password: {
                required: true,
                equalTo: '#password'
            },
            inputDigit: {
                required: true,
                digits: true
            },

            inputValidCheckbox: {
                required: true
            }
        }
    });
</script>