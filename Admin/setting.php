<?php
include("query.php");
if (!isset($_SESSION['username'])) {
    header("location:signin.php");
}
include("header.php")
    ?>
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
                <div class="setting">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">

                            <div class="form-group pt-5">
                                <input type="text" name="username" value="<?php echo $_SESSION['username'] ?>"
                                    class="form-control" id="Username" placeholder="Username">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="email" value="<?php echo $_SESSION['email'] ?>"
                                    class="form-control" id="Email" placeholder="Email address">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="oldPass" class="form-control" id="Password"
                                    placeholder="Old-Password">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="newPass" class="form-control" id="Password"
                                    placeholder="New-Password">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="rePass" class="form-control" id="Password"
                                    placeholder="Confirm-Password">
                            </div>
                        </div>
                        <button name="update" class="btn btn-primary btn-block mb-4">Update</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <?php


    if (isset($_POST['update'])) {
        $id = $_SESSION['user_id'];
        $name = $_POST['username'];
        $email = $_POST['email'];
        if (empty($oldPass) && empty($newPass) && empty($rePass)) {
            $oldPass = $_SESSION['password'];
            $newPass = $_SESSION['password'];
            $rePass = $_SESSION['password'];

        } else {
            $oldPass = $_POST['oldPass'];
            $newPass = $_POST['newPass'];
            $rePass = $_POST['rePass'];
        }


        if ($oldPass == $_SESSION['password'] && $newPass == $rePass) {
            $query = $pdo->prepare("update user set profile_img = :img, username = :name, email = :email, password = :password where user_id = :id");
            $query->bindParam('e_id', $id);
            $query->bindParam("img", $p_img);
            $query->bindParam('name', $name);
            $query->bindParam('email', $email);
            $query->bindParam('pass', $newPass);
            if ($query->execute()) {
                $id = $_SESSION['id'];
                $query = $pdo->prepare('select * from user where id = :e_id');
                $query->bindParam('e_id', $id);
                $query->execute();
                $result = $query->fetch(PDO::FETCH_ASSOC);
            }
        } else {
            echo "<script>alert('not valid extension')
                                    </script>";
        }


   
    $query = $pdo->prepare("update user set username = :name ,email = :email, password = :pass where user_id = :e_id");
    $query->bindParam('e_id', $id);
    $query->bindParam('name', $name);
    $query->bindParam('email', $email);
    $query->bindParam('pass', $newPass);
    if ($query->execute()) {
        $id = $_SESSION['user_id'];
        $query = $pdo->prepare('select * from user where user_id = :e_id');
        $query->bindParam('e_id', $id);
        if ($query->execute()) {
            echo "<script>alert('Update Successfully');</script>";
            echo "<script>window.location.href='setting.php';</script>";
        }

    }
}



    ?>
</section>
<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>



</body>

</html>