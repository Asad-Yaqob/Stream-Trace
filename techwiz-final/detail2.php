<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title>TvFlix</title>
    <meta title="title" content="TvFlix">
    <meta name="description" content="TvFlix is a movie app made by Joy Brar">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

    <!-- Google Fonts Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom css link -->
    <link rel="stylesheet" href="./assets/css/detail.css">

    <!-- Custom Js link -->
    <script defer src="./assets/js/global.js"></script>
    <!-- <script src="./assets/js/detail.js" type="module"></script> -->
    <style>
        *{
    font-family: 'Poppins', sans-serif !important;
}
        #save{
            border: 1px solid whitesmoke;
            border-radius: 50%;
            height: 26px;
            width: 26px;
            display: flex;
            justify-content: center;
        }
        #save:hover{
            background-color: whitesmoke;
            color: black;
        }
    </style>    
  
</head>

<body>

    <!-- Header -->

    <header class="header">

        <a href="./index.html" class="logo">
            <img src="./assets//images/logo.svg" width="140" height="32" alt="TvFlix Home">
        </a>

        <div class="search-box" search-box>
            <div class="search-wrapper" search-wrapper>
                <input type="text" name="search" aria-label="search movies" placeholder="Search any movie..."
                    class="search-field" autocomplete="off" search-field>

                <img src="./assets/images/search.png" width="24" height="24" alt="search" class="leading-icon">

            </div>

            <button class="search-btn" search-toggler>
                <img src="assets/images/close.png" width="24" height="24" alt="close search box">
            </button>
        </div>

        <div class="search-btn" search-toggler menu-close>
            <img src="./assets/images/search.png" width="24" height="24" alt="open search box">
        </div>

        <button class="menu-btn" menu-btn menu-toggler>
            <img src="./assets/images/menu.png" width="24" height="24" alt="open menu" class="menu">
            <img src="./assets/images/menu-close.png" width="24" height="24" alt="close menu" class="close">
        </button>

    </header>
    <main>


        <!-- Sidebar -->
        <nav class="sidebar" sidebar>
            <div class="sidebar-inner">

                <div class="sidebar-list">

                    <p class="title">Genre</p>

                    <a href="./movie-list.html" menu-close class="sidebar-link">Action</a>

                    <a href="./movie-list.html" menu-close class="sidebar-link">Horror</a>

                    <a href="./movie-list.html" menu-close class="sidebar-link">Comedy</a>

                    <a href="./movie-list.html" menu-close class="sidebar-link">Adventure</a>

                    <a href="./movie-list.html" menu-close class="sidebar-link">Drama</a>

                    <a href="./movie-list.html" menu-close class="sidebar-link">Sci-Fi</a>

                </div>

                <div class="sidebar-list">

                    <p class="title">Language</p>

                    <a href="./movie-list.html" menu-close class="sidebar-link">English</a>

                    <a href="./movie-list.html" menu-close class="sidebar-link">Hindi</a>

                    <a href="./movie-list.html" menu-close class="sidebar-link">Bengali</a>

                </div>

                <div class="sidebar-footer">
                    <p class="copyright">
                        Copyright 2023 <a href="https://github.com/JoyBrar2001" class="link">Joy Brar</a>
                    </p>

                    <img src="./assets/images/tmdb-logo.svg" width="130" height="17" alt="the move database logo">
                </div>

            </div>
        </nav>

        <div class="overlay" overlay menu-toggler></div>

      
        <article class="container" page-content>
           <div class="movie-detail">
            <div class="backdrop-image" ></div>
            <?php
            
            
            if (isset($_GET['ids'])) {
                $id = $_GET['ids'];
                $query = $pdo->prepare("select * from fav_list where id = :id");
                $query->bindParam(':id', $id);
                $query->execute();
                $show = $query->fetch(PDO::FETCH_ASSOC);
                
            }
            ?>
            
            <figure class="poster-box movie-poster">
                <img src="./assets/images/<?php echo $show['image'] ?>" alt="${title}" class="img-cover">
            </figure>
            
            <div class="detail-box">
        
                <div class="detail-content">
                    <h1 class="heading"><?php echo $show['name'] ?></h1> 
        
                    <div class="meta-list">
        
                        <div class="meta-item">
                        
        
                            <span class="span"><?php echo $show['type'] ?></span>
        
                        </div>
                        
                        <div class="separator"></div>
        
                        <!-- <div class="meta-item">${runtime}</div> -->
        
                        <div class="separator"></div>
                        
                        <!-- <div class="meta-item">${release_date.split("-")[0]}</div> -->
                        <form action="" method="post">
                        <div class="meta-item  " id="sav"><button class="btn btn-danger" type="submit" class="btn btn-danger" name="deletelist">Unlist</button></a>
                        </i></div>
                        </form>
                      <?php
                      if(isset($_POST['deletelist'])){
                        $query=$pdo->prepare("delete from fav_list where id = :id");
                        $query->bindParam('id',$id);
                        $query->execute();
                        echo "<script>alert('unlist successfully')
                        location.assign('add_list.php')</script>";
                      }
                      ?>
                        <!-- <div class="meta-item card-badge"></div> -->
        
                    </div>
        
                    <!-- <p class="genre">${getGenres(genres)}</p> -->
        
                    <p class="overview" style="margin-top:15px;"><?php echo $show['detail'] ?>   </p>
        
                    <ul class="detail-list">
        
                        <div class="list-item">
                            <p class="list-name">Starring</p>
                        
                            <p><?php echo $show['duration'] ?></p>
                        </div>
        
                        <div class="list-item">
                            <p class="list-name">Directed By</p>
                        
                            <p><?php echo $show['directer'] ?></p>
                        </div>
        
                    </ul>
        
                </div>
        
                <div class="title-wrapper">
                    <h3 class="title-large">Trailer and Clips</h3>
                </div>
        
                <div class="slider-list">
                    <div class="slider-inner"></div>
                </div>
        
            </div>
            
           </div>

            <!-- Movie List -->



        </article>

    </main>

</body>

</html>