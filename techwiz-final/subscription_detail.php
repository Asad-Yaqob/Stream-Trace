<?php 
include('query.php');
if (!isset($_SESSION['username'])) {
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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #1a1a1a;
            color: #fff;
        }
        .navbar {
            background-color: #121212;
        }
        .navbar-brand img {
            
        }
        .container {
            margin-top: 20px;
        }
        label {
            color: #ddd;
        }
        .form-control {
            background-color: #222;
            border: 1px solid #333;
            color: #fff;
        }
        .form-control:hover {
            border: 1px solid red;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .card {
            background-color: #222;
            border: none;
        }
        .card-title, .card-subtitle {
            color: #fff;
        }
        ul {
            padding-left: 20px;
        }
        ul li {
            color: #ccc;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a href="./index.html" class="logo navbar-brand ms-3">
            <img src="./assets/images/logo.svg" width="140" height="32" alt="TvFlix Home">
        </a>
    </nav>

    <div class="container mt-3">
        <div class="row">
        <?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query=$pdo->prepare("select * from subcription_plane where sub_id = :id");
    $query->bindParam('id',$id);
    $query->execute();
    $data_c=$query->fetch(PDO::FETCH_ASSOC);
}
?>
            <h2 class="text-center mt-3 mb-5">Card Details</h2>
            <div class="col-lg-8 col-md-6 mt-3">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Card number</label>
                        <input type="number" class="form-control" placeholder="Enter card number" name="card_number">
                    </div>
                    <div class="mb-3">
                        <label for="">Name on card</label>
                        <input type="text" class="form-control" placeholder="Enter name on card" name="card_name">
                    </div>
                    <div class="mb-4">
                        <label for="">Expiration date</label>
                        <input type="date" class="form-control" name="expiration_date">
                    </div>
                    <div class="mb-3">
                        <label for="">CVV</label>
                        <input type="text" class="form-control" placeholder="Enter CVV" name="cvv">
                    </div>
                    <button type="submit" class="btn btn-danger w-100" name="pay">Subscribe</button>
                    <input type="hidden" name="payment" value="<?php echo $data_c['price'] ?>
                                                ">
                                        <input type="hidden" name="name" value="<?php echo $data_c['subscription']?>
                                                ">
                                        <input type="hidden" name="id" value="<?php echo $data_c['sub_id']?>
                                                ">
                </form>
            </div>
          
            <div class="col-lg-4">
                <h3 class="">Selected Package</h3>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-3"><?php echo $data_c['subscription'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-center fs-3"><?php echo $data_c['price'] ?></h6>
                        <h4>Includes</h4>
                        <ul class="mt-3">
                            <li><i class="fa-solid fa-check"></i> Netflix</li>
                            <li><i class="fa-solid fa-check"></i> Amazon Prime Video</li>
                            <li><i class="fa-solid fa-check"></i> Access to All TV-Shows/Movies</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>














