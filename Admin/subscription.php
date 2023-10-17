<?php
include("query.php");
if (!isset($_SESSION['username'])) {
    header("location:signin.php");
}
include("header.php")
    ?>
<!-- [ Header ] end -->



<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Users</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Users</a></li>
                            <li class="breadcrumb-item"><a href="#!">Total Users</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User ID</th>
                                <th>Service ID</th>
                                <th>Subscription Start</th>
                                <th>Subscription End</th>
                                <th>Billing amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = $pdo->query("select * from subscription");
                            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $user) {
                                ?>
                                <tr>
                                <td>
                                <?php echo $user['subscription_id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $user['user_id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $user['service_id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $user['subscription_start'] ?>
                                    </td>
                                    <td>
                                        <?php echo $user['subscription_end'] ?>
                                    </td>
                                    <td>
                                        <?php echo $user['billing_amount'] ?>
                                    </td>
            
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

</section>
<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>



</body>

</html>