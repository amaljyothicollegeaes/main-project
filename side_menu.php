<script src="https://unpkg.com/feather-icons"></script>

<ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="font-weight:bold;">

    <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
        <a style="color:blue;margin-left:25%" class="nav-link " aria-current="page" href="personaldetail.php">
            <!-- <a style="color:blue;margin-left:25%" class="nav-link " aria-current="page" href="personaldetail.php?id=<?= $id ?>"> -->
            <!-- <b> -->
            <i style="color:blue" data-feather="user"></i>&nbsp;&nbsp;
            View Profile
            <!-- </b> -->
        </a>
    </li>

    <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
        <a style="color:blue;margin-left:25%" class="nav-link" href="main.php">
            <!-- <b> -->
            <i style="color:blue" data-feather="activity"></i>&nbsp;&nbsp;
            Matches
            <!-- </b> -->
        </a>
    </li>

    <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
        <a style="color:blue;margin-left:25%" class="nav-link" href="visitors.php">
            <!-- <b> -->
            <i style="color:blue" data-feather="eye"></i>&nbsp;&nbsp;
            My Visitors
            <!-- </b> -->
        </a>
    </li>

    <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
        <a style="color:blue;margin-left:25%" class="nav-link" href="my_matches.php">
            <!-- <b> -->
            <i style="color:blue" data-feather="heart"></i>&nbsp;&nbsp;
            My Matches
            <!-- </b> -->
        </a>
    </li>

    <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
        <a style="color:blue;margin-left:25%" class="nav-link" href="requests.php">
            <!-- <a style="color:blue;margin-left:25%" class="nav-link" href="requests.php?id=<?= $id ?>"> -->
                <!-- <b> -->
                <i style="color:blue" data-feather="shopping-cart"></i>&nbsp;&nbsp;
                Requests
                <!-- </b> -->
            </a>
    </li>

    <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
        <a style="color:blue;margin-left:25%" class="nav-link" href="report.php">
            <!-- <b> -->
            <i style="color:blue" data-feather="alert-triangle"></i>&nbsp;&nbsp;
            Report Account
            <!-- </b> -->
        </a>
    </li>

    <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
        <a style="color:blue;margin-left:25%" class="nav-link" href="payment.php">
            <!-- <b> -->
            <i style="color:blue" data-feather="dollar-sign"></i>
            &nbsp;&nbsp;
            Payment
            <!-- </b> -->
        </a>
    </li>

    <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
        <a style="color:blue;margin-left:25%" class="nav-link" href="settings.php">
            <!-- <b> -->
            <i style="color:blue" data-feather="settings"></i>&nbsp;&nbsp;
            Account Settings
            <!-- </b> -->
        </a>
    </li>

    <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
        <a style="color:blue;margin-left:25%" class="nav-link" href="kyc.php">
            <!-- <b> -->
            <i style="color:blue" data-feather="tag"></i>
            &nbsp;&nbsp;
            Documents
            <!-- </b> -->
        </a>
    </li>

    <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
        <a style="color:blue;margin-left:25%" class="nav-link" href="logout.php">

            <i style="color:blue" data-feather="power"></i>
            &nbsp;&nbsp;
            Logout

        </a>
    </li>


    <!-- <br>
    <div class="nav-item" style="text-align:center;color:white">
        <small> 
            Account Expires On : 
            <?php
            echo $s;
            ?>
        </small>
    </div> -->




    <br>
</ul>
<script>
    feather.replace()
</script>