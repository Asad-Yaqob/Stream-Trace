<?php
session_start();
include("connection.php");


// signup

if (isset($_POST['signup'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $status = 1;
    $role = 1;
    $query = $pdo->prepare("insert into user (username,email, password,status,role) values (:name,:email, :password,:status,:role)");
    $query->bindParam('name', $name);
    $query->bindParam('email', $email);
    $query->bindParam('password', $pass);
    $query->bindParam('status', $status);
    $query->bindParam('role', $role);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $_SESSION['username'] = $result['username'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['status'] = $result['status'];
        $_SESSION['role'] = $result['role'];
    } else {
        session_start();
        header('location:index.php');
    }
}


// login 

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['pass'];
    $query = $pdo->prepare('select * from user where username = :name && password = :pass');
    $query->bindParam('name', $name);
    $query->bindParam('pass', $password);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $_SESSION['id'] = $result['user_id'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['password'] = $result['password'];
        header('Location:index.php');
    }
}

// Audio to Database

if (isset($_POST['add_music'])) {
    $m_name = $_POST['m_name'];
    $a_name = $_POST['a_name'];
    $adminName = $_SESSION['username'];
    $p_img = $_FILES['p_image']['name'];
    $p_img_size = $_FILES['p_image']['size'];
    $p_img_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_img_extension = pathinfo($p_img, PATHINFO_EXTENSION);
    $destination = "images/" . $p_img;
    $m_audio = $_FILES['m_audio']['name'];
    $m_audio_size = $_FILES['m_audio']['size'];
    $m_audio_tmp_name = $_FILES['m_audio']['tmp_name'];
    $m_audio_extension = pathinfo($m_audio, PATHINFO_EXTENSION);
    $music_destination = "music/" . $m_audio;

    list($width, $height) = getimagesize($p_img_tmp_name);
    $expectedWidth = 679;
    $expectedHeight = 452;

    if ($width != $expectedWidth || $height != $expectedHeight) {
        echo "<script>alert('Image dimensions should be 679x452 pixels. Please upload a valid image.')</script>";
    } else {
        if ($m_audio_size <= 48000000 && $p_img_size <= 48000000) {
            if ($m_audio_extension == "mp4" || $m_audio_extension == "mp3" || $p_img_extension == "jpg" || $p_img_extension == "jpeg") {
                if (move_uploaded_file($m_audio_tmp_name, $music_destination) && move_uploaded_file($p_img_tmp_name, $destination)) {
                    $query = $pdo->prepare("INSERT INTO music (name, Artist, m_image, added_by, Music) VALUES (:mname, :aname, :image, :admin, :music)");
                    $query->bindParam(':mname', $m_name);
                    $query->bindParam(':aname', $a_name);
                    $query->bindParam(':music', $m_audio);
                    $query->bindParam(':image', $p_img);
                    $query->bindParam(':admin', $adminName);
                    $query->execute();
                    echo "<script>alert('Category added successfully')</script>";
                }
            } else {
                echo "<script>alert('Not a valid file extension')</script>";
            }
        } else {
            echo "File size is greater than the allowed limit (48 MB).";
        }
    }
}

if (isset($_POST['add_Video'])) {
    $m_name = $_POST['m_name'];
    $m_Video = $_FILES['m_Video']['name'];
    $m_Video_size = $_FILES['m_Video']['size'];
    $m_Video_tmp_name = $_FILES['m_Video']['tmp_name'];
    $m_Video_extension = pathinfo($m_Video, PATHINFO_EXTENSION);
    $Video_destination = "Video/" . $m_Video;

    // Validate file types
    $allowedVideoExtensions = array('mp4', 'mp3');

    if (!in_array($m_Video_extension, $allowedVideoExtensions)) {
        echo "<script>alert('Invalid file extension. Only mp4 and mp3 files are allowed.')</script>";
    } else {
        // Validate file size
        $maxFileSize = 48000000; // 48 MB
        if ($m_Video_size > $maxFileSize) {
            echo "File size is greater than the allowed limit (48 MB).";
        } else {
            // Move the uploaded video to its destination
            if (move_uploaded_file($m_Video_tmp_name, $Video_destination)) {
                $query = $pdo->prepare("INSERT INTO video (name, Video) VALUES (:mname, :Video)");
                $query->bindParam(':mname', $m_name);
                $query->bindParam(':Video', $m_Video);
                $query->execute();
                echo "<script>alert('Category added successfully')</script>";
            }
        }
    }
}

// add service

if (isset($_POST['add_provider'])) {
    $c_name = $_POST['s_name'];
    $c_image_name = $_FILES['logo']['name'];
    $c_image_size = $_FILES['logo']['size'];
    $c_image_tmp_name = $_FILES['logo']['tmp_name'];
    $c_image_extension = pathinfo($c_image_name, PATHINFO_EXTENSION);
    $c_destination = "assets/images/" . $c_image_name;


    if ($c_image_size <= 48000000) {
        if ($c_image_extension == 'png' || $c_image_extension == 'jpg' || $c_image_extension == 'jpeg') {
            if (move_uploaded_file($c_image_tmp_name, $c_destination)) {
                $query = $pdo->prepare("insert into service_p(service_name,logo) values(:name,:image)");
                $query->bindParam("name", $c_name);
                $query->bindParam("image", $c_image_name);
                $query->execute();
                echo "<script>alert('Service provider added successfully')
            location.assign('Services.php');</script>";
                // header("location:product.php");

            }
        } else {
            echo "<script>alert('not valid extension')
        </script>";
        }
    } else {
        echo "file size is greater";
    }

}

// update services

if (isset($_GET['id'])) {
    $id_c = $_GET['id'];
    $query = $pdo->prepare("select * from service_p where service_id = :p_id");
    $query->bindParam('p_id', $id_c);
    $query->execute();
    $data_c = $query->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['update_service'])) {
    $name_c = $_POST['name'];
    $image_name_c = $_FILES['image']['name'];
    $image_size_c = $_FILES['image']['size'];
    $image_tmp_name_c = $_FILES['image']['tmp_name'];
    $image_extension_c = pathinfo($image_name_c, PATHINFO_EXTENSION);
    $destination_c = "assets/images/" . $image_name_c;


    if ($image_size_c <= 48000000) {
        if ($image_extension_c == 'png' || $image_extension_c == 'jpg' || $image_extension_c == 'jpeg') {
            if (move_uploaded_file($image_tmp_name_c, $destination_c)) {
                $query = $pdo->prepare("update service_p set service_name = :name , logo = :image  where service_id = :c_id");
                $query->bindParam("c_id", $id_c);
                $query->bindParam("name", $name_c);
                $query->bindParam("image", $image_name_c);
                $query->execute();
                echo "<script>alert('Services updated successfully')
                location.assign('services.php');</script>";

            }
        } else {
            echo "<script>alert('not valid extension')
            </script>";
        }
    } else {
        echo "file size is greater";
    }

}


// add movie/shows

if (isset($_POST['add_movie'])) {
    $c_name = $_POST['m_name'];
    $detail = $_POST['m_detail'];
    $services_s = $_POST['ss_id'];
    $c_image_name = $_FILES['m_video']['name'];
    $c_image_size = $_FILES['m_video']['size'];
    $c_image_tmp_name = $_FILES['m_video']['tmp_name'];
    $c_image_extension = pathinfo($c_image_name, PATHINFO_EXTENSION);
    $c_destination = "assets/images/" . $c_image_name;

    if ($c_image_size <= 48000000) {
        if (in_array($c_image_extension, ['png', 'jpg', 'jpeg'])) {
            if (move_uploaded_file($c_image_tmp_name, $c_destination)) {
                $insertQuery = $pdo->prepare("INSERT INTO shows (name, detail, image, services_id) VALUES (:name, :detail, :image, :service)");
                $insertQuery->bindParam(":name", $c_name);
                $insertQuery->bindParam(":detail", $detail);
                $insertQuery->bindParam(":image", $c_image_name);
                $insertQuery->bindParam(":service", $services_s);
                if ($insertQuery->execute()) {
                    $log = $c_name . " has been added";
                    $mssgQuery = $pdo->prepare("INSERT INTO message (mssg, m_img, m_name) VALUES (:mssg, :m_img, :m_name)");
                    $mssgQuery->bindParam(":mssg", $log);
                    $mssgQuery->bindParam(":m_img", $c_image_name);
                    $mssgQuery->bindParam(":m_name", $c_name);
                    if ($mssgQuery->execute()) {
                        $_SESSION['mesg'] = "Movie added successfully";
                        header("Location: movies_shows.php");
                        exit();
                    }
                } else {
                    echo "Error inserting movie information into the database.";
                }
            } else {
                echo "Error moving uploaded file.";
            }
        } else {
            echo "Invalid file extension. Only PNG, JPG, and JPEG are allowed.";
        }
    } else {
        echo "File size is too large. Maximum size is 48MB.";
    }
}


// update movies/shows

if (isset($_GET['id'])) {
    $id_s = $_GET['id'];
    $query = $pdo->prepare("select * from shows where id = :p_id");
    $query->bindParam('p_id', $id_s);
    $query->execute();
    $data_c = $query->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['update_movie'])) {
    $name_s = $_POST['name_s'];
    $service_s = $_POST['s_id'];
    $image_name_c = $_FILES['image_s']['name'];
    $image_size_c = $_FILES['image_s']['size'];
    $image_tmp_name_c = $_FILES['image_s']['tmp_name'];
    $image_extension_c = pathinfo($image_name_c, PATHINFO_EXTENSION);
    $destination_c = "assets/images/" . $image_name_c;


    if ($image_size_c <= 48000000) {
        if ($image_extension_c == 'png' || $image_extension_c == 'jpg' || $image_extension_c == 'jpeg') {
            if (move_uploaded_file($image_tmp_name_c, $destination_c)) {
                $query = $pdo->prepare("update shows set name = :name , image= :image ,services_id = :s_id  where id = :c_id");
                $query->bindParam("c_id", $id_c);
                $query->bindParam("s_id", $service_s);
                $query->bindParam("name", $name_s);
                $query->bindParam("image", $image_name_c);
                $query->execute();
                $_SESSION['mes'] = "Movie updated successfully";
                echo "<script>
                location.assign('movies_shows.php');</script>";

            }
        } else {
            echo "<script>alert('not valid extension')
            </script>";
        }
    } else {
        echo "file size is greater";
    }

}

// add package

if (isset($_POST['add_package'])) {
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];

    $query = $pdo->prepare("insert into subcription_plane(subscription,price) values(:name,:price)");
    $query->bindParam("name", $p_name);
    $query->bindParam("price", $p_price);
    $query->execute();
    $_SESSION['package_add'] = "Subscription added successfully";
    echo "<script>
            location.assign('package.php');</script>";


}


// update package

if (isset($_GET['id'])) {
    $id_c = $_GET['id'];
    $query = $pdo->prepare("select * from subcription_plane where sub_id = :p_id");
    $query->bindParam('p_id', $id_c);
    $query->execute();
    $data_p = $query->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['update_package'])) {
    $p_Name_c = $_POST['p_name'];
    $p_Price_c = $_POST['p_price'];
    $query = $pdo->prepare("update subcription_plane set subscription = :name , price = :price  where sub_id = :c_id");
    $query->bindParam("c_id", $id_c);
    $query->bindParam("name", $p_Name_c);
    $query->bindParam("price", $p_Price_c);
    $query->execute();
    $_SESSION['package_update'] = "Subscription updated successfully";
    echo "<script>
                    location.assign('package.php');</script>";

}

?>