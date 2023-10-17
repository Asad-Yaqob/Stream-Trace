<?php
include("query.php");
if (!isset($_SESSION['username'])) {
    header("location:signin.php");
}
include("header.php")

    ?>
    <!-- [ Header ] end -->
    
    

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- table card-1 start -->
            <div class="col-md-12 col-xl-4">
                <div class="card flat-card">
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-users text-c-green mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <?php
                                    $query = $pdo->query("SELECT COUNT(*) as total_users FROM user");
                                    $result = $query->fetch(PDO::FETCH_ASSOC);
                                    if ($result) {
                                        $totalUsers = $result['total_users'];
                                        ?>
                                    <h5><?php echo $totalUsers ?></h5>

                                    </tr>
                                    <?php
                                    }
                                    ?>
                                   
                                    <span>User</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-video text-c-red mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                <?php
                                $query = $pdo->query("SELECT COUNT(*) as total_users FROM tv_shows");
                                $result = $query->fetch(PDO::FETCH_ASSOC);
                                if ($result) {
                                    $totalUsers = $result['total_users'];
                                    ?>
                                    <h5><?php echo $totalUsers ?></h5>

                                    </tr>
                                    <?php
                                }
                                ?>
                                    <span>TV Shows</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-file-text text-c-blue mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                <?php
                                $query = $pdo->query("SELECT COUNT(*) as total_users FROM service_p");
                                $result = $query->fetch(PDO::FETCH_ASSOC);
                                if ($result) {
                                    $totalUsers = $result['total_users'];
                                    ?>
                                    <h5><?php echo $totalUsers ?></h5>

                                    </tr>
                                    <?php
                                }
                                ?>
                                    <span>Services</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-film text-c-yellow mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <?php
                                    $query = $pdo->query("SELECT COUNT(*) as total_users FROM shows");
                                    $result = $query->fetch(PDO::FETCH_ASSOC);
                                    if ($result) {
                                        $totalUsers = $result['total_users'];
                                        ?>
                                    <h5><?php echo $totalUsers ?></h5>

                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    <span>Movies</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- widget primary card start -->
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-radio"></i>
                        </div>
                        <div class="col-sm-9">
                        <?php
                        $query = $pdo->query("SELECT COUNT(*) as total_users FROM shows,tv_shows");
                        $result = $query->fetch(PDO::FETCH_ASSOC);
                        if ($result) {
                            $totalUsers = $result['total_users'];
                            ?>
                                    <h4><?php echo $totalUsers ?></h4>

                                    </tr>
                                    <?php
                        }
                        ?>                              <h6>Total Movies</h6>
                        </div>
                    </div>
                </div>
                <!-- widget primary card end -->
            </div>
            <!-- table card-1 end -->
            <!-- table card-2 start -->
            <div class="col-md-12 col-xl-4">
                <div class="card flat-card">
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-user-check text-c-blue mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                <?php
                                $query = $pdo->query("SELECT COUNT(*) as total_users FROM payment_details");
                                $result = $query->fetch(PDO::FETCH_ASSOC);
                                if ($result) {
                                    $totalUsers = $result['total_users'];
                                    ?>
                                    <h5><?php echo $totalUsers ?></h5>

                                    </tr>
                                    <?php
                                }
                                ?>                                    <span>Active Subscriptions</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-message-circle text-c-blue mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                <?php
                                $query = $pdo->query("SELECT COUNT(*) as total_users FROM feed");
                                $result = $query->fetch(PDO::FETCH_ASSOC);
                                if ($result) {
                                    $totalUsers = $result['total_users'];
                                    ?>
                                    <h5><?php echo $totalUsers ?></h5>

                                    </tr>
                                    <?php
                                }
                                ?> 
                            <span>Total Feedback</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-film text-c-blue mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                <?php
                                $query = $pdo->query("SELECT COUNT(*) as total_users FROM message");
                                $result = $query->fetch(PDO::FETCH_ASSOC);
                                if ($result) {
                                    $totalUsers = $result['total_users'];
                                    ?>
                                    <h5><?php echo $totalUsers ?></h5>

                                    </tr>
                                    <?php
                                }
                                ?>                                    <span>New Movies</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-file text-c-blue mb-1 d-blockz"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                <?php
                                $query = $pdo->query("SELECT COUNT(*) as total_users FROM subcription_plane");
                                $result = $query->fetch(PDO::FETCH_ASSOC);
                                if ($result) {
                                    $totalUsers = $result['total_users'];
                                    ?>
                                    <h5><?php echo $totalUsers ?></h5>

                                    </tr>
                                    <?php
                                }
                                ?>
                                    <span>Total Subscriptions</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- widget-success-card start -->
                <div class="card flat-card widget-purple-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="col-sm-9">
                        <?php
                                $query = $pdo->query("SELECT COUNT(*) as total_users FROM user");
                                $result = $query->fetch(PDO::FETCH_ASSOC);
                                if ($result) {
                                    $totalUsers = $result['total_users'];
                                    ?>
                                    <h4><?php echo $totalUsers ?></h4>

                                    </tr>
                                    <?php
                                }
                                ?>                            <h6>Community</h6>
                        </div>
                    </div>
                </div>
                <!-- widget-success-card end -->
            </div>
            <!-- table card-2 end -->
            <!-- Widget primary-success card start -->
            <div class="col-md-12 col-xl-4">
                <div class="card support-bar overflow-hidden">
                    <div class="card-body pb-0">
                    <?php
                    $query = $pdo->query("SELECT COUNT(*) as total_feedback FROM feed");
                    $result = $query->fetch(PDO::FETCH_ASSOC);
                    if ($result) {
                        $total_feedback = $result['total_feedback'];
                        ?>
                                    <h2><?php echo $total_feedback ?></h2>

                                    </tr>
                                    <?php
                    }
                    ?>
                        <span class="text-c-blue">Feedbacks</span>
                        <p class="mb-3 mt-3">Total number of Feedback that come in.</p>
                    </div>
                    <div id="support-chart"></div>
                    <div class="card-footer bg-primary text-white">
                        <div class="row text-center">
                            <div class="col">
                                <h4 class="m-0 text-white">10</h4>
                                <span>Open</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0 text-white">5</h4>
                                <span>Running</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0 text-white">3</h4>
                                <span>Solved</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widget primary-success card end -->

            <!-- prject ,team member start -->
            <div class="col-xl-6 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>Recent Join</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="chk-option">
                                                <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                                                    <input type="checkbox" class="custom-control-input">
                                                    <span class="custom-control-label"></span>
                                                </label>
                                            </div>
                                            Name
                                        </th>
                                        <th>Email</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $pdo->query("select * from user ORDER BY user_id  DESC
                                    LIMIT 4");
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $user) {
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="chk-option">
                                                    <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </div>
                                                <div class="d-inline-block align-middle">
                                                    <div class="d-inline-block">
                                                        <h6><?php echo $user['username'] ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                           
                                            <td><?php echo $user['email'] ?></td>
                                            
                                        </tr>
                                            <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="card latest-update-card">
                    <div class="card-header">
                        <h5>Latest Updates</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="latest-update-box">
                            <div class="row p-t-30 p-b-30">
                                <div class="col-auto text-right update-meta">
                                    <p class="text-muted m-b-0 d-inline-flex">2 hrs ago</p>
                                    <i class="feather icon-twitter bg-twitter update-icon"></i>
                                </div>
                                <div class="col">
                                    <a href="#!">
                                        <h6>+ 1652 Followers</h6>
                                    </a>
                                    <p class="text-muted m-b-0">You’re getting more and more followers, keep it up!</p>
                                </div>
                            </div>
                            <div class="row p-b-30">
                                <div class="col-auto text-right update-meta">
                                    <p class="text-muted m-b-0 d-inline-flex">4 hrs ago</p>
                                    <i class="feather icon-briefcase bg-c-red update-icon"></i>
                                </div>
                                <div class="col">
                                    <a href="#!">
                                        <h6>+ 5 New Products were added!</h6>
                                    </a>
                                    <p class="text-muted m-b-0">Congratulations!</p>
                                </div>
                            </div>
                            <div class="row p-b-0">
                                <div class="col-auto text-right update-meta">
                                    <p class="text-muted m-b-0 d-inline-flex">2 day ago</p>
                                    <i class="feather icon-facebook bg-facebook update-icon"></i>
                                </div>
                                <div class="col">
                                    <a href="#!">
                                        <h6>+1 Friend Requests</h6>
                                    </a>
                                    <p class="text-muted m-b-10">This is great, keep it up!</p>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tr>
                                                <td class="b-none">
                                                    <a href="#!" class="align-middle">
                                                        <img src="assets/images/user/avatar-2.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                        <div class="d-inline-block">
                                                            <h6>Jeny William</h6>
                                                            <p class="text-muted m-b-0">Graphic Designer</p>
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#!" class="b-b-primary text-primary">View all Projects</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- prject ,team member start -->
            <!-- seo start -->
         
            <!-- seo end -->

            <!-- Latest Customers start -->
            <div class="col-lg-12 col-md-12">
                <div class="card table-card review-card">
                    <div class="card-header borderless ">
                        <h5>User Feedbacks</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="review-block">
                        <?php
                                    $query = $pdo->query("select * from feed order by id desc limit 4");
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $user) {
                                        ?>
                                        <div class="row">
                                
                                <div class="col">
                                    <h6 class="m-b-15"><?php echo $user['first'] ?> <span class="float-right f-13 text-muted"> <?php echo $user['email'] ?></span></h6>
                                    <p class="m-t-15 m-b-15 text-muted"><?php echo $user['msg'] ?></p>
                                    
                                </div>
                            </div>
                                        <?php
                                    }
                                    ?>



                            
                           
                        </div>
                    </div>
                </div>
                
            </div>
           
            <!-- Latest Customers end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="assets/js/pages/dashboard-main.js"></script>
</body>

</html>
