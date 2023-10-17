<?php 
include('query.php');
if (!isset($_SESSION['user_id'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Page</title>

    <!--  bootstrape link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;600;700;800&display=swap"
        rel="stylesheet">
        <script src="https://unpkg.com/feather-icons"></script>



    <!-- Primary Meta Tags -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

    <!-- Google Fonts Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif !important;
        }
        body {
           background-color:  hsla(250, 13%, 11%, 1);
        }
        .body{
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 90vh;
            justify-content: center;
        }
        ul li {
            list-style: none;
        }
        .buy-btn{
            width: 100%;
            height: 50px;
            border-radius: 10px;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            background-color: black;
            transition: all 0.3s ease-in-out;
        }
        .buy-btn a {
            text-decoration: none;
            color: #fff;
            transition: all 0.3s ease-in-out;

        }
        .buy-btn:hover{
            background-color: #fff !important;
            border: 1px solid black;
        }
        .buy-btn:hover a{
            color: black !important;
        }
        .logo{
            font-weight: 500;
            font-size: 30px;
        }
        .logo span {
            color: red;
        }
    </style>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="./index.html" class="logo navbar-brand ms-3">
            <strong><h1  class="logo">Stream<span>Trace</span></h1></strong>
        </a>
    </nav>

    <!-- cards  -->
    <div class="container mt-3 body">
        <h2 class="text-center text-light">Subscription Plan</h2>
        <div class="row justify-content-center mt-5">
            <?php
            $query = $pdo->query("select * from subcription_plane");
            $result = $query->fetchALL(PDO::FETCH_ASSOC);
            $counter = 0;
            foreach ($result as $item) {
                if ($counter < 3) {
                    $counter++;

                    ?>
                    <div class="col-lg-4 ">
                        <div class="card" style="width: 20rem;">
                            <form action="" method="post">
                                <div class="card-body ">
                                    <h5 class="card-title text-center mb-3">
                                        <?php echo $item['subscription'] ?>
                                    </h5>
                                    <h6  class="card-subtitle mb-2 text-body-secondary text-center fs-3">
                                        <?php echo $item['price'] ?>
                                    </h6>
                                    <h4>Includes</h4>
                                    <ul class="mt-3 mb-3">
                                        <?php
                                        $service_query = $pdo->prepare("SELECT * FROM service_p");
                                        $service_query->execute();
                                        $services = $service_query->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($services as $provider) {

                                            ?>
                                            <li><i data-feather="check"></i>
                                                    <?php echo $provider['service_name'] ?>
                                                </li>
                                            <?php

                                        }

                                        ?>
                                    </ul>
                                    <div class="button text-center">
                                        <button class="btn buy-btn btn-outline-dark"><a
                                               name="up" href="subscription_detail.php?id=<?php echo $item['sub_id'] ?>"> Buy
                                                Now</a></button>
                                    </div>

                                </div>
                                </form>
                        </div>
                    </div>
                    <?php
                }
            }

            ?>
        </div>
    </div>
    <script>
        feather.replace()
    </script>
</body>

</html>