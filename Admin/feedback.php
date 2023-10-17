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

        <h1>User Feedback</h1>

        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th> 
                                <th>Email</th>
                                <th>Message</th>
                                <th>Contact</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = $pdo->query("select * from feed");
                            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $user) {
                                ?>
                                <tr>
                                <td>
                                    <?php echo $user['id'] ?> 
                                    </td>
                                    <td>
                                    <?php echo $user['first'] . ' ' . $user['last'] ?> 
                                    </td>
                                    <td>
                                        <?php echo $user['email'] ?>
                                    </td>
                                    <td>
                                        <?php echo $user['msg'] ?>
                                    </td>
                                    <td>
                                    <?php echo $user['contact'] ?>
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