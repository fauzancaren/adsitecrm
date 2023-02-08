<!-- Side Nav START -->
<div class="side-nav text-white" style="background:#5d77c5;">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown mt-4 mb-1">
                <a href="index.php">
                    <span class="icon-holder">
                        <i class="anticon anticon-appstore font-size-20"></i>
                    </span>
                    <span class="title">Home</span>
                </a>

            </li>
            <li class="nav-item dropdown mb-1"> <!-- open -->
                <a href="leads.php">
                    <span class="icon-holder">
                        <i class="anticon anticon-idcard font-size-20"></i>
                    </span>
                    <span class="title">Leads</span>
                </a>

            </li>
            <!--
            <li class="nav-item dropdown mb-1">
                <a href="">
                    <span class="icon-holder">
                        <i class="anticon anticon-schedule font-size-20"></i>
                    </span>
                    <span class="title">Task/Schedule</span>
                </a>
            </li>
-->
            <li class="nav-item dropdown mb-1">
                <a href="report.php">
                    <span class="icon-holder">
                        <i class="anticon anticon-pie-chart font-size-20"></i>
                    </span>
                    <span class="title">Report</span>
                </a>
            </li>

            <li class="nav-item dropdown mb-1">
                <a href="account.php">
                    <span class="icon-holder">
                        <i class="anticon anticon-team font-size-20"></i>
                    </span>
                    <span class="title">Account</span>
                </a>
            </li>
            <!--
            <li class="nav-item dropdown mb-1">
                <a href="">
                    <span class="icon-holder">
                        <i class="anticon anticon-appstore font-size-20"></i>
                    </span>
                    <span class="title">CMS</span>
                </a>
            </li>
-->
            <li class="nav-item dropdown mb-1">

                <?php
                require 'process/db_config.php';

                $email = $_SESSION['email'];

                $query =  mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' ");
                $row = mysqli_fetch_assoc($query)

                ?>
                <a href="profile.php?id=<?php echo $row['id']; ?>">
                    <span class="icon-holder">
                        <i class="anticon anticon-setting font-size-20"></i>
                    </span>
                    <span class="title">Setting</span>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- Side Nav END -->