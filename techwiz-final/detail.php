<?php
include("connection.php");
session_start();

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom css link -->
    <link rel="stylesheet" href="./assets/css/detail.css">

    <!-- Custom Js link -->
    <script defer src="./assets/js/global.js"></script>
    <!-- <script src="./assets/js/detail.js" type="module"></script> -->
    <style>
        * {
            font-family: 'Poppins', sans-serif !important;
        }

        .play-button{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
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
        .play-button {
      width: 70px;
      height: 70px;
      background-color: #e74c3c; /* Custom color */
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background-color 0.3s;
    }

    .play-button:hover {
      background-color: #c0392b; /* Darker shade on hover */
    }
    .logo h2{
    color: white !important; 
    font-family: 'Poppins', sans-serif !important;
    font-weight: 600;
    display: flex;
    font-size: 25px;
}
.logo-name{
    color: red;
}
.login {
	padding-top: 130px;
	padding-bottom: 120px;
}

    </style>    
  
</head>

<body>

    <!-- Header -->

    <header class="header">

        <a href="./index.html" class="logo">
        <strong>
                                <h2>Stream<span class="logo-name">Trace</span></h2>
                            </strong>        </a>

        


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


                    <a href="index.php" menu-close class="sidebar-link mt-4">Home</a>

                    <a href="contact.php" menu-close class="sidebar-link mt-4">Contact Us</a>

                    <a href="history.php" menu-close class="sidebar-link mt-4">History</a>

                    <a href="add_list.php" menu-close class="sidebar-link mt-4">My List</a>

                   
                </div>

              
              

            </div>
        </nav>

        <div class="overlay" overlay menu-toggler></div>

      
        <article class="container" page-content>
           <div class="movie-detail">
            <div class="backdrop-image" ></div>
            <?php
            // Assuming you've initialized $pdo and handled database connection
            
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = $pdo->prepare("SELECT * FROM shows WHERE id = :id");
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
                $show = $query->fetch(PDO::FETCH_ASSOC);
                
            }
            ?>
            
            <figure class="poster-box movie-poster">
            <?php
// Assuming $pdo is your database connection object

if (isset($_POST['watch'])) {
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $image = $_POST['image'];
    $query = $pdo->prepare("insert into watch_history (name, image, detail) VALUES (:name, :image, :detail)");
    $query->bindParam('name', $name);
    $query->bindParam('detail', $detail);
    $query->bindParam('image', $image);
    $query->execute();
}
?>

<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $show['id'] ?>">
    <input type="hidden" name="name" value="<?php echo $show['name'] ?>">
    <input type="hidden" name="detail" value="<?php echo $show['detail'] ?>">
    <input type="hidden" name="image" value="<?php echo $show['image'] ?>">
    <div class="meta-item">
        <button type="submit" class="play-button" name="watch">
            <i class="fas fa-play" style="font-size: 2rem; color: white; "></i>
        </button>
    </div>
</form>

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
                        <input type="hidden" name="id" value="<?php echo $show['id'] ?>">
							<input type="hidden" name="name" value="<?php echo $show['name'] ?>">
							<input type="hidden" name="detail" value="$<?php echo $show['detail'] ?>">
							<input type="hidden" name="image" value="<?php echo $show['image'] ?>">
							<input type="hidden" name="type" value="<?php echo $show['type'] ?>">
							<input type="hidden" name="directer" value="<?php echo $show['directer'] ?>">
							<input type="hidden" name="duration" value="<?php echo $show['duration'] ?>">
                        <div class="meta-item "><button class="btn btn-outline-danger"  data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" name="addtolist">Add To List</button></a>
                        </div>
                  </form>
                          <?php
                            if(isset($_POST['addtolist'])){
                                
                                $name = $_POST['name'];
                                $detail = $_POST['detail'];
                                $image = $_POST['image'];
                                $type = $_POST['type'];
                                $movie_id = $_POST['id'];
                                $directer = $_POST['directer'];
                                $duration = $_POST['duration'];
                                $query = $pdo->prepare("insert into fav_list(name,detail,image,type,directer,duration,movie_id)values(:name,:detail,:image,:type,:directer,:duration, :id)");
                                $query->bindParam('id', $movie_id);
                                $query->bindParam('name', $name);
                                $query->bindParam('detail', $detail);
                                $query->bindParam('image', $image);
                                $query->bindParam('type', $type);
                                $query->bindParam('directer', $directer);
                                $query->bindParam('duration', $duration);
                                $query->execute();
                                exit;
                               
                            }
                            ?>
        
                    </div>
        
        
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

<script>
     
        

      // Function to add event listeners to multiple elements
function addEventOnElements(elements, eventType, callback) {
    for (const element of elements) {
        element.addEventListener(eventType, callback);
    }
}

// Your sidebar toggling function
const toggleSidebar = function(sidebar) {
    // Toggle Sidebar in Mobile

    const sidebarBtn = document.querySelector("[menu-btn]");
    const sidebarTogglers = document.querySelectorAll("[menu-toggler]");
    const sidebarClose = document.querySelectorAll("[menu-close]");
    const overlay = document.querySelector("[overlay]");

    addEventOnElements(sidebarTogglers, "click", function() {
        sidebar.classList.toggle("active");
        sidebarBtn.classList.toggle("active");
        overlay.classList.toggle("active");
    });

    addEventOnElements(sidebarClose, "click", function() {
        sidebar.classList.remove("active");
        sidebarBtn.classList.remove("active");
        overlay.classList.remove("active");
    });
};

// Assuming you have a sidebar element with the class "sidebar"
const sidebar = document.querySelector(".sidebar");

// Initialize the sidebar toggle functionality
toggleSidebar(sidebar);

            feather.replace()

</script>
</body>

</html>