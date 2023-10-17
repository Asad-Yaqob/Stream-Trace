<?php
include("connection.php");

if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    $query = $pdo->prepare("delete from watch_history where id = :id");
    $query->bindParam(":id", $id);
    if ($query->execute()) {
        header("location: history.php"); 
    }
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>Black Theme</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                background-color: black;
                font-family: sans-serif;
                color: white;
            }
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 25px;
                font-family: sans-serif;
                color: #fff; /* White font color */
                margin-bottom: 20px;
            }
            p {
                font-size: 15px;
                font-family: sans-serif;
            }
            .img-thumbnail {
                border: none;
            }
            .row {
                margin-bottom: 30px;
            }
            #h1 {
                font-size: 25px;
                font-family: sans-serif;
                color: #fff; /* White font color */
                /* margin-top: 100px; */
            }
            #btn{
                position: relative;
                top: -305px;
                left: 420px;
                font-size: 12px;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <h1 class="h1" id="h1">Watch history</h1>
            </div>
            <div class="col-md-6 text-end">
    

            </div>
        </div>
        <?php
        $query = $pdo->query("SELECT * FROM watch_history LIMIT 6");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($result as $history) {
        ?>
        <div class="row mt-5">
        <div class="col-md-6">
            <div class="row mb-4">
                <div class="col-md-4">
                    <a href="detail.php?id=<?php echo  $history['id']; ?>">
                        <img src="<?php echo "./assets/images/" . $history['image'] ?>" class="img-thumbnail" alt="">
                    </a>
                </div>
                <div class="col-md-8">
                    <h1><?php echo $history['name']; ?></a></h1>
                    <p><?php echo $history['detail']; ?></p>
                </div>
                <a href="?remove=<?php echo $history['id']; ?>">
        <button class="btn btn-danger" id="btn" type="submit">
        <i class="fa-solid fa-x"></i>
        </button>
    </a>
            </div>
            
        </div>
    </div>

        <?php
        }
        ?>
    </div>
    </body>
    </html>
