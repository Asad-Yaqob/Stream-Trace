<?php
include("query.php");
if (!isset($_SESSION['check'])) {
    header("location:subscribtion.php");
}
if (isset($_POST['reminder'])) {
    $name = $_POST['name'];
    $image = $_POST['image'];
    $query = $pdo->prepare("insert into reminder(name,image) values(:name, :image)");
    $query->bindParam(':name', $name);
    $query->bindParam(':image', $image);
    $query->execute();
    echo "<script>alert('Added to list')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Custom css link -->
    <!-- <link rel="stylesheet" href="index.c"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://unpkg.com/feather-icons"></script>

    <title>Document</title>
    <style>
        * {
            margin: 0%;
            font-family: 'Poppins', sans-serif !important;
            padding: 0%;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #000;
            color: white;
        }

        header {
            position: relative;
        }

        hr {
            border: none;
            height: 1px;
            background-color: #000;
            margin: 20px 0;
            color: white;
        }

        hr {
            color: blue;
            height: 2px;
            /* width: 50%; */
        }

        .col-xl-2 {
            position: relative;
            transition: transform 0.3s;
        }

        .col-xl-2:hover {
            transform: scale(1.1);
            /* Adjust the scale factor as needed */
        }

        #btn {
            background-color: rgb(56, 52, 52);
            color: white;
        }

        #btn:hover {
            background-color: white;
            color: black;
        }

        .navbar {
            background-color: transparent;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 1;
        }

        /* .card {
            border:none ;
        } */
        .nav-link {
            color: white;
        }

        .nav-link:hover {
            color: red;
        }

        .navbar-brand {
            color: white;
        }

        .navbar-brand:hover {
            color: red;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu {
            position: relative;
            right: 5px;
        }

        .h1 {
            color: white;
        }

        #form {
            background-color: black;


            color: white;
            border: 1px solid white;
            border-radius: 5px;


        }

        #h4 {
            color: white;
            font-family: sans-serif;

        }

        .para {
            color: white;
        }

        #coming {
            color: white;
        }

        .hr2 {
            background-color: white;
        }

        .u_name {
            color: white;
        }

        .u_p {
            color: white;
        }

        .watch-now-btn {
            background-color: red;
            color: white;
            border: none;
        }

        .watch-now-btn:hover {
            background-color: white;
            color: red;
        }

        .pro {
            border: none;
            width: 100%;
        }

        .slider {
            height: 500px;
            position: relative;
            overflow: hidden;
        }

        .slide {
            width: 100%;
            height: 100%;
            position: absolute;
            transition: opacity 0.5s ease-in-out;
            opacity: 0;
        }

        .slider .slide.active {
            opacity: 1;
        }

        /* Previous and Next buttons */
        .prev-next-btns {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            color: aliceblue;
        }

        .prev-next-btns button {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .prev-next-btns button.prev {
            margin-left: 20px;
        }

        .prev-next-btns button.next {
            margin-right: 20px;
        }

        .next,
        .prev {
            color: white;
        }

        .slide {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;

        }

        #slider_i {
            position: relative;
            top: 230px;
            right: 100px;
        }

        #venom {
            font-family: sans-serif;
            position: relative;
            top: -100px;
            right: 40px;
            font-size: 80px
        }

        #venom2 {
            font-family: sans-serif;
            position: relative;
            top: -100px;
            left: 25px;
            /* font-size:80px */
        }

        #a {
            font-family: sans-serif;
            position: relative;
            top: -100px;
            right: 70px;
            font-size: 80px
        }

        #a2 {
            font-family: sans-serif;
            position: relative;
            top: -100px;
            left: 25px;
            /* font-size:80px */
        }

        #UPCOMING {
            font-family: sans-serif;
            color: white;
        }

        #footer {
            background-color: rgb(56, 52, 52);
            /* color: white; */
        }

        #row {
            background-image: url(assets/images/c.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .fh {
            font-family: sans-serif;
            color: white;

        }

        .fh a {
            text-decoration: none;

        }

        .fp {
            font-family: sans-serif;
            color: white;


        }

        .fp a {
            text-decoration: none;
            color: white;
            text-decoration: none;
        }

        #j {
            font-family: sans-serif;
            position: relative;
            top: -100px;
            right: 120px;
            font-size: 80px
        }

        #j2 {
            font-family: sans-serif;
            position: relative;
            top: -100px;
            left: 25px;
            /* font-size:80px */
        }

        .sch {
            display: flex;
        }
    </style>

</head>

<body>
    <header>
        <div class="slider" id="main">
            <div class="slide active"
                style="background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('assets/images/Venom\ Wallpaper.jpg');">
                <div class="container mt-5">
                    <div class="row p-5 " id="slider_i">
                        <div class="col-xl-6 ">
                           

                        </div>
                        <div class="col-xl-6">
                            <h1 id="venom">VENOM</h1>
                            <p id="venom2">Jun 18 2018 IMAX 3D</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide"
                style="background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('assets/images/ArrangedLove-banner.avif');">
                <div class="container mt-5">
                    <div class="row p-5 " id="slider_i">
                        <div class="col-xl-6 col-sm-12">
                            

                        </div>
                        <div class="col-xl-6 col-sm-12">
                            <h1 id="a">ARRANGE</h1>
                            <p id="a2">July 17 2015 IMAX 4D</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide"
                style="background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('assets/images/blacklotus-banner.jpg');">
                <div class="container mt-5">
                    <div class="row p-5 " id="slider_i">
                        <div class="col-xl-6 col-sm-12">
                            

                        </div>
                        <div class="col-xl-6">
                            <h1 id="j">JOHN WICK</h1>
                            <p id="j2">Jan 18 2023 IMAX 3D</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="slide"
                style="background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('assets/images/ArrangedLove-banner.avif');">
            </div>
            <div class="slide"
                style="background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('assets/images/blacklotus-banner.jpg');">
            </div> -->


        </div>


        <nav class="navbar navbar-expand-lg  p-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Stream<span style="color:red;">Trace</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto gap-5">
                        <a class="nav-link" href="index.php">Home</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                $counter = 1;
                                if (isset($_SESSION['check']) && $_SESSION['check'] == 1) {
                                    $query = $pdo->query("SELECT * FROM service_p");
                                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($data as $service) {
                                        if ($counter <= 2) { // Changed "<" to "<=" to display the first two services
                                            ?>
                                            <li><a class="dropdown-item"
                                                    href="service.php?ids=<?php echo $service['service_id']; ?>"><?php echo $service['service_name']; ?></a></li>
                                            <?php
                                            $counter++;

                                        }
                                    }
                                } elseif (isset($_SESSION['check']) && $_SESSION['check'] == 2) {
                                    $query = $pdo->query("SELECT * FROM service_p");
                                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($data as $service) {
                                        if ($counter <= 4) { // Changed "<" to "<=" to display the first two services
                                            ?>
                                            <li><a class="dropdown-item"
                                                    href="service.php?ids=<?php echo $service['service_id']; ?>"><?php echo $service['service_name']; ?></a></li>
                                            <?php
                                            $counter++;
                                        }
                                    }
                                } else {
                                    if (isset($_SESSION['check']) && $_SESSION['check'] == 3) {
                                        $query = $pdo->query("SELECT * FROM service_p");
                                        $data = $query->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($data as $service) {
                                            if ($counter <= 6) { // Changed "<" to "<=" to display the first two services
                                                ?>
                                                <li><a class="dropdown-item"
                                                        href="service.php?ids=<?php echo $service['service_id']; ?>"><?php echo $service['service_name']; ?></a></li>
                                                <?php
                                                $counter++;
                                            }
                                        }
                                    }
                                }
                                ?>



                            </ul>
                        </li>
                        <a class="nav-link" href="contact.php">Contact Us</a>
                        <a class="nav-link" href="history.php">History</a>
                        <a class="nav-link" href="add_list.php">My List</a>
                        <div class="dropdown">
                            <a class="nav-link" href="#">
                                <i data-feather="bell"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <div class="container mt-5">
                                    <?php
                                    $query = $pdo->prepare("SELECT * FROM message");
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($results as $result) {
                                        ?>
                                        <div class="row">
                                            <p class="dropdown-item">
                                                <?php echo $result['mssg']; ?>
                                            </p>
                                            
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- <a class="nav-link" href="#"><i class="fa-solid fa-bell"></i></a> -->
                        <div class="dropdown ">
                            <a class="nav-link" href="#">
                                <i data-feather="user"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    href="#">Profile</a>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalPass"
                                    href="#">Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">logout</a>
                            </div>
                        </div>
                    </div>
                </div>
        </nav>



        <!-- Add more slides as needed -->

        <!-- Previous and Next buttons -->




        <!-- modal start -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:#000;">Subscription:
                            <?php if ($_SESSION['sub_id'] == 1) {
                                echo "Basic";
                            } elseif ($_SESSION['sub_id'] == 2) {
                                echo "Premium";
                            } elseif ($_SESSION['sub_id'] == 3) {
                                echo "Advance";
                            } ?>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Username</label>
                                <input name="username" type="text" value="<?php echo $_SESSION['username'] ?>"
                                    class="form-control" id="exampleFormControlInput1" placeholder="Username" Required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">email</label>
                                <input name="email" type="email" value="<?php echo $_SESSION['email'] ?>"
                                    class="form-control" id="exampleFormControlInput1" placeholder="Email" Required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">email</label>
                                <input readonly name="email" type="email" value="<?php if ($_SESSION['sub_id'] == 1) {
                                    echo "Basic";
                                } elseif ($_SESSION['sub_id'] == 2) {
                                    echo "Premium";
                                } elseif ($_SESSION['sub_id'] == 3) {
                                    echo "Advance";
                                } ?>" class="form-control" id="exampleFormControlInput1" placeholder="Email"><a href=""
                                    data-bs-toggle="modal" data-bs-target="#warnModal" class="btn"
                                    style="color:red; float:right;">Update Subscription</a></button>
                                <a href="" data-bs-toggle="modal" data-bs-target="#canModal" class="btn"
                                    style="color:red; float:right;">Cancle Subscription</a></button>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button name="update" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="modal fade" id="warnModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:#000;">Update Subscription
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <p style="color:#000;">If you want to update your subscribtion your previouly
                                    subscribtion will be cancle, Do you realy want to update</p>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button name="yes" class="btn btn-danger">Yes</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                            aria-label="Close">No</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="canModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:#000;">Update Subscription
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <p style="color:#000;">Do you really want to Cancle your Subscription</p>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button name="yes_can" class="btn btn-danger">Yes</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                            aria-label="Close">No</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>




        <div class="modal fade" id="ModalPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:#000;">Subscription:
                            <?php if ($_SESSION['sub_id'] == 1) {
                                echo "Basic";
                            } elseif ($_SESSION['sub_id'] == 2) {
                                echo "Premium";
                            } elseif ($_SESSION['sub_id'] == 3) {
                                echo "Advance";
                            } ?>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Old Password</label>
                                <input name="oldPass" type="password" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Old Password">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">New Password</label>
                                <input name="newPass" type="password" class="form-control" id="exampleFormControlInput1"
                                    placeholder="New Password">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">New Password</label>
                                <input name="rePass" type="password" class="form-control" id="exampleFormControlInput1"
                                    placeholder="New Password">
                            </div>

                            <div class="modal-footer">
                                <button name="change_pass" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




        </div>
        <!-- modal end  -->
    </header>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <h4 class="start-0 mt-5" style="color:white">OPENING THIS WEEK</h4>
                </div>
                <div class="col-xl-4 mt-4 pt-3 d-flex">
                    <form action="search_result.php" method="post">
                        <div class="sch">
                            <input type="text" name="search" class="form-control" id="form" placeholder="Search...">
                            <button type="submit" name="search_pro" class="btn btn-danger">Search</button>
                        </div>
                    </form>
                </div>
                <hr style="background-color:white" class="mt-4"> <!-- This creates the horizontal line -->
            </div>
        </div>
        <div class="container ">
            <?php
            $query = $pdo->prepare("select * from category");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $results) {
                ?>
                <a href="service.php?id=<?php echo $results['c_id'] ?>" <button type="submit" class="btn  m-3" id="btn">
                    <?php echo $results['category_name'] ?></button>
                </a>
                <?php
            }
            ?>
        </div>
        <div class="container">
            <div class="row">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = $pdo->prepare("SELECT * FROM shows WHERE ca_id = :id");
                    $query->bindParam(':id', $id);
                    $query->execute();
                    $show = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($show as $service) {
                        ?>
                        <div class="col-xl-2 mt-5">
                            <div class="position-relative">
                                <a href="detail.php?id=<?php echo $service['id']; ?>" class="d-block">
                                    <img src="<?php echo "./assets/images/" . $service['image']; ?>" alt="Image"
                                        class="img-fluid">
                                    <div class="position-absolute bottom-0 end-0"></div>
                                </a>
                            </div>
                            <h4 class="mt-2" id="h4">
                                <?php echo $service['name']; ?>

                            </h4>
                            <p class="para">
                                <?php echo $service['duration']; ?> <span
                                    style="font-size:12px; font-family: sans-serif; color:white;"> |
                                    <?php echo $service['type']; ?>
                                </span>
                            </p>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>


        <!-- netflix -->


        <div class="container">
            <div class="row">
                <?php
                if (isset($_GET['ids'])) {
                    $id = $_GET['ids'];
                    $query = $pdo->prepare("SELECT * FROM shows WHERE services_id = :id");
                    $query->bindParam(':id', $id);
                    $query->execute();
                    $show = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($show as $service) {
                        ?>
                        <div class="col-xl-2 mt-5">
                            <div class="position-relative">
                                <a href="detail.php?id=<?php echo $service['id']; ?>" class="d-block">
                                    <img src="<?php echo "./assets/images/" . $service['image']; ?>" alt="Image"
                                        class="img-fluid">
                                    <div class="position-absolute bottom-0 end-0"></div>
                                </a>
                            </div>
                            <h4 class="mt-2" id="h4">
                                <?php echo $service['name']; ?>

                            </h4>
                            <p class="para">
                                <?php echo $service['duration']; ?> <span
                                    style="font-size:12px; font-family: sans-serif; color:white;"> |
                                    <?php echo $service['type']; ?>
                                </span>
                            </p>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>












        <!-- end -->



        <!--  SUGGESTION -->





        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <h4 class="start-0 mt-5" id="coming">SUGGESTION</h4>
                </div>

                <hr class="mt-4 hr2" color="blue" size="2" width="50%">



            </div>

            <!-- upcoming -->

            <div class="row">

                <?php
                $query = $pdo->query("select * from shows order by rand() limit 6 ");
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $show) {
                    ?>
                    <div class="col-xl-2">
                        <div class="position-relative">
                            <a href="detail.php?id=<?php echo $show['id'] ?>" class="d-block">
                                <img src="<?php echo " ./assets/images/" . $show['image'] ?>" alt="Image" class="img-fluid">
                                <div class="position-absolute bottom-0 end-0"></div>
                            </a>
                        </div>
                        <h4 class="mt-2" id="h4">
                            <?php echo $show['name']; ?>
                        </h4>
                        <p class="para">
                            <?php echo $show['duration']; ?> <span
                                style="font-size:12px; font-family: sans-serif; color:white;"> |
                                <?php echo $show['type']; ?>
                            </span>
                        </p>
                        <!-- Rest of your form code for reminder -->
                    </div>
                <?php } ?>
            </div>


            <!--  TREANDING -->


            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <h4 class="start-0 mt-5" id="coming">TREANDING</h4>
                    </div>

                    <hr class="mt-4 hr2" color="blue" size="2" width="50%">



                </div>

                <!-- upcoming -->

                <div class="row">

                    <?php
                    $query = $pdo->query("select * from shows limit 6 ");
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $show) {
                        ?>
                        <div class="col-xl-2">
                            <div class="position-relative">
                                <a href="detail.php?id=<?php echo $show['id'] ?>" class="d-block">
                                    <img src="<?php echo " ./assets/images/" . $show['image'] ?>" alt="Image"
                                        class="img-fluid">
                                    <div class="position-absolute bottom-0 end-0"></div>
                                </a>
                            </div>
                            <h4 class="mt-2" id="h4">
                                <?php echo $show['name']; ?>
                            </h4>
                            <p class="para">
                                <?php echo $show['duration']; ?> <span
                                    style="font-size:12px; font-family: sans-serif; color:white;"> |
                                    <?php echo $show['type']; ?>
                                </span>
                            </p>
                            <!-- Rest of your form code for reminder -->
                        </div>
                    <?php } ?>
                </div>


                <!--  NETFLIX -->


                <div class="container">
                    <div class="row">
                        <div class="col-xl-8">
                            <h4 class="start-0 mt-5" id="coming">NETFLIX</h4>
                        </div>

                        <hr class="mt-4 hr2" color="blue" size="2" width="50%">



                    </div>

                    <!-- upcoming -->

                    <div class="row">

                        <?php
                        $query = $pdo->query("select * from shows ORDER BY rand() limit 6 ");
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $show) {
                            ?>
                            <div class="col-xl-2">
                                <div class="position-relative">
                                    <a href="detail.php?id=<?php echo $show['id'] ?>" class="d-block">
                                        <img src="<?php echo " ./assets/images/" . $show['image'] ?>" alt="Image"
                                            class="img-fluid">
                                        <div class="position-absolute bottom-0 end-0"></div>
                                    </a>
                                </div>
                                <h4 class="mt-2" id="h4">
                                    <?php echo $show['name']; ?>
                                </h4>
                                <p class="para">
                                    <?php echo $show['duration']; ?> <span
                                        style="font-size:12px; font-family: sans-serif; color:white;"> |
                                        <?php echo $show['type']; ?>
                                    </span>
                                </p>
                                <!-- Rest of your form code for reminder -->
                            </div>
                        <?php } ?>
                    </div>





                     <!--  NETFLIX -->


                <div class="container">
                    <div class="row">
                        <div class="col-xl-8">
                            <h4 class="start-0 mt-5" id="coming">AMAZON PRIME VIDEO</h4>
                        </div>

                        <hr class="mt-4 hr2" color="blue" size="2" width="50%">



                    </div>

                    <!-- upcoming -->

                    <div class="row">

                        <?php
                        
                        $query = $pdo->query("select * from shows ORDER BY rand() limit 6");
                     
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $show) {
                            ?>
                            <div class="col-xl-2">
                                <div class="position-relative">
                                    <a href="detail.php?id=<?php echo $show['id'] ?>" class="d-block">
                                        <img src="<?php echo " ./assets/images/" . $show['image'] ?>" alt="Image"
                                            class="img-fluid">
                                        <div class="position-absolute bottom-0 end-0"></div>
                                    </a>
                                </div>
                                <h4 class="mt-2" id="h4">
                                    <?php echo $show['name']; ?>
                                </h4>
                                <p class="para">
                                    <?php echo $show['duration']; ?> <span
                                        style="font-size:12px; font-family: sans-serif; color:white;"> |
                                        <?php echo $show['type']; ?>
                                    </span>
                                </p>
                                <!-- Rest of your form code for reminder -->
                            </div>
                        <?php } ?>
                    </div>


                    <!-- end -->


                </div>
            </div>
    </section>
    <section>
        <div class="container">
            <div class="row" id="row">
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-xl-6"></div>
                        <div class="col-xl-6">
                            <h4 class="mt-5" id="heading">GO AHEAD LIVE <br> YOUR BEST<br> LIFE .</h4>
                            <p id="para">Lorem ipsum dolor sit amet consectetur <br> adipisicing elit. Vitae iste
                                quisquam <br>s officiis. Deserunt, dolore tenetur!</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <iframe width="560" height="315" class="mt-3" src="https://www.youtube.com/embed/dug56u8NN7g"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <h3 class="mt-2" id="UPCOMING">UPCOMING TRAILER</h3>
                </div>
            </div>
        </div>
    </section>
    <section>
        <footer>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-xl-2">
                        <h3 class="mt-3 fh">Streamstrace</h3>
                    </div>
                    <div class="col-xl-2">
                        <p class="fp"><a href="">Audio and subtitle</a></p>
                        <p class="fp"><a href="">Media center</a></p>
                        <p class="fp"><a href="">Privacy</a></p>
                        <p class="fp"><a href="">Contact Us</a></p>
                    </div>
                    <div class="col-xl-2">
                        <p class="fp"><a href="">Media description</a></p>
                        <p class="fp"><a href="">Inventory </a></p>
                        <p class="fp"><a href="">Legal notice</a></p>
                    </div>
                    <div class="col-xl-2">
                        <p class="fp"><a href="" class="fp">Terms of Use</a></p>
                    </div>
                    <div class="col-xl-4 d-flex" id="f">
                        <div class="col-xl-4 w-25">
                            <p><i data-feather="facebook"></i></p>
                        </div>
                        <div class="col-xl-4 w-25">
                            <p><i data-feather="instagram"></i></p>
                        </div>
                        <div class="col-xl-4 w-25">
                            <p><i data-feather="twitter"></i></p>
                        </div>
                        <div class="col-xl-4 w-25">
                            <p><i data-feather="youtube"></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>


    <script>
        // JavaScript to control the slider
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const autoSlideInterval = 5000; // Adjust the interval (in milliseconds)

        function showSlide(slideIndex) {
            slides.forEach(slide => slide.classList.remove('active'));
            slides[slideIndex].classList.add('active');
            currentSlide = slideIndex;
        }

        function changeSlide(n) {
            currentSlide += n;
            if (currentSlide >= slides.length) {
                currentSlide = 0;
            } else if (currentSlide < 0) {
                currentSlide = slides.length - 1;
            }
            showSlide(currentSlide);
        }

        // Auto-slide function
        function autoSlide() {
            changeSlide(1);
        }

        // Start the slider and auto-slide
        showSlide(currentSlide);
        setInterval(autoSlide, autoSlideInterval);
        feather.replace()

    </script>






</body>

</html>