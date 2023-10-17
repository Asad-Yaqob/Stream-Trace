<?php
include("connection.php");

session_start();
//  User Register
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['re-password'];
    if (!empty($username) && !empty($email) && !empty($password) && !empty($confirmPassword)) {
        if ($password == $confirmPassword) {
            $register = $pdo->prepare("INSERT INTO user(username, email, password, sub_id) VALUES(:username, :email, :password, 4)");
            $register->bindParam(':username', $username);
            $register->bindParam(':email', $email);
            $register->bindParam(':password', $password);
            if ($register->execute()) {
                $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
                $query->bindParam(':email', $email);
                $query->execute();
                $user = $query->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['password'] = $user['password'];
                    $_SESSION['sub_id'] = $user['sub_id'];

                    header("location:subscribtion.php");

                } else {
                    echo "<script>alert('Fields');</script>";

                }
            }
        }
    } elseif (empty($username && $email && $password && $confirmPassword)) {
        echo "<script>alert('Fields is Required');</script>";
    }
}

    // user login System

if (isset($_POST['login'])) {
    $mail = $_POST['email'];
    $pass = $_POST['pass'];

    if (!empty($mail) && !empty($pass)) {
        $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $query->bindParam(':email', $mail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['sub_id'] = $user['sub_id'];
            if ($_SESSION['sub_id'] != 4 && !isset($_SESSION['check'])) {
                $_SESSION['check'] = $user['sub_id'];
                header("location:index.php");
            } elseif ($_SESSION['sub_id'] == 4) {
                header("location:subscribtion.php");
            }
        } else {
            echo "<script>alert('Invalid email or password');</script>";
        }
    } elseif (empty($mail) && !empty($pass)) {
        echo "<script>alert('Email is Required');</script>";
    } elseif (!empty($mail) && empty($pass)) {
        echo "<script>alert('Password is Required');</script>";
    } else {
        echo "<script>alert('Fields are Required');</script>";
    }
}

    // user subscription payment System


if (isset($_POST['pay'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $amount = $_POST['payment'];
        $sub_name = $_POST['name'];
        $user_name = $_SESSION['username'];
        $query = $pdo->prepare("INSERT INTO subscription (user_id, billing_amount,user_name,subscription_name) VALUES (:user, :payment , :u_name,:sum_name)");
        $query->bindParam(':sum_name', $sub_name);
        $query->bindParam(':u_name', $user_name);
        $query->bindParam(':user', $user_id);
        $query->bindParam(':payment', $amount);
        if ($query->execute()) {
            $subscriptionQuery = $pdo->prepare("SELECT subscription_start FROM subscription WHERE user_id = :id");
            $subscriptionQuery->bindParam(':id', $user_id);
            $subscriptionQuery->execute();
            $currentTime = $subscriptionQuery->fetchColumn();
            if ($currentTime) {
                $currentDateTime = new DateTime($currentTime);
                $expiryDateTime = clone $currentDateTime; // Clone the current datetime to avoid modifying it directly
                $expiryDateTime->add(new DateInterval('P1M'));
                if ($expiryDateTime->format('j') !== $currentDateTime->format('j')) {
                    $expiryDateTime->modify('last day of +1 month');
                }
                $expiryDate = $expiryDateTime->format('Y-m-d');
                $updateQuery = $pdo->prepare("UPDATE subscription SET subscription_end = :expiry WHERE user_id = :id");
                $updateQuery->bindParam(':expiry', $expiryDate);
                $updateQuery->bindParam(':id', $user_id);
                if ($updateQuery->execute()) {
                    $card_number = $_POST['card_number'];
                    $sub_id = $_POST['id'];
                    $name_c = $_POST['card_name'];
                    $cvv = $_POST['cvv'];
                    $subscription_price = $_POST['payment'];
                    $subscription_name = $_POST['name'];
                    $query = $pdo->prepare("insert into payment_details(card_number,name_on_card,expiry_date,cvv,subscription_name,subscription_id,subscription_price,user_id) values(:card_n,:name_c,:exp_date,:cv,:subs_name,:sub_id,:sub_price,:user)");
                    $query->bindParam(':card_n', $card_number);
                    $query->bindParam(':name_c', $name_c);
                    $query->bindParam(':sub_id', $sub_id);
                    $query->bindParam(':user', $user_id);
                    $query->bindParam(':exp_date', $expiryDate); // Added this line
                    $query->bindParam(':cv', $cvv);
                    $query->bindParam(':subs_name', $subscription_name);
                    $query->bindParam(':sub_price', $subscription_price);
                    if ($query->execute()) {
                        $data = $pdo->prepare("select * from payment_details where user_id = :user_id");
                        $data->bindParam(':user_id', $user_id);
                        $data->execute();
                        $check = $data->fetch(PDO::FETCH_ASSOC);
                        if ($check) {
                            $_SESSION['check'] = $check['subscription_id'];
                            $_SESSION['sub_id'] = $check['subscription_id'];
                            $_SESSION['sub_n'] = $check['subscription_name'];
                            if ($_SESSION['check'] === $check['subscription_id']) {
                                $update_subscription = $_SESSION['check'];
                                $update = $pdo->prepare("update user set sub_id = :sub_id where user_id = :user_id");
                                $update->bindParam('user_id', $user_id);
                                $update->bindParam('sub_id', $update_subscription);
                                if ($update->execute()) {
                                    header("location:index.php");
                                } else {
                                    echo "<script>alert('script not run');</script>";

                                }
                            }

                        } else {
                            echo "<script>alert(' not run');</script>";

                        }
                    }

                }
            }
        }
    }
}


// if (isset($_POST['pay'])) {
//     if (isset($_SESSION['user_id'])) {
//         $user_id = $_SESSION['user_id'];
//         $amount = $_POST['payment'];
//         $query = $pdo->prepare("INSERT INTO subscription (user_id, billing_amount) VALUES (:user, :payment)");
//         $query->bindParam(':user', $user_id);
//         $query->bindParam(':payment', $amount);
//         if ($query->execute()) {
//             $subscriptionQuery = $pdo->prepare("SELECT subscription_start FROM subscription WHERE user_id = :id");
//             $subscriptionQuery->bindParam(':id', $user_id);
//             $subscriptionQuery->execute();
//             $currentTime = $subscriptionQuery->fetchColumn();
//             if ($currentTime) {
//                 $currentDateTime = new DateTime($currentTime);
//                 $expiryDateTime = $currentDateTime->add(new DateInterval('P1M'));
//                 $expiryDate = $expiryDateTime->format('Y-m-d');
//                 $updateQuery = $pdo->prepare("UPDATE subscription SET subscription_end = :expiry WHERE user_id = :id");
//                 $updateQuery->bindParam(':expiry', $expiryDate);
//                 $updateQuery->bindParam(':id', $user_id);
//                 $updateQuery->execute();
//             } else {
//                echo "error"
//             }
//         } else {
//             echo "Error inserting payment information.";
//         }
//     } else {
//         echo "User session not found.";
//     }
// } 


if (isset($_POST['update'])) {
    $id = $_SESSION['user_id'];
    $name = $_POST['username'];
    $email = $_POST['email'];
    $query = $pdo->prepare("update user set username = :name ,email = :email where user_id = :e_id");
    $query->bindParam('e_id', $id);
    $query->bindParam('name', $name);
    $query->bindParam('email', $email);
    if ($query->execute()) {
        $id = $_SESSION['user_id'];
        $query = $pdo->prepare('select * from user where user_id = :e_id');
        $query->bindParam('e_id', $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['password'] = $result['password'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['check'] = $result['sub_id'];
        }

        if ($_SESSION['email'] = $result['email']) {
            echo "<script>alert('Email Update Successfully');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
    }

}





if (isset($_POST['change_pass'])) {
    $id = $_SESSION['user_id'];

    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $rePass = $_POST['rePass'];


    if ($oldPass == $_SESSION['password'] && $newPass == $rePass) {
        $query = $pdo->prepare("update user set password = :pass where user_id = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':pass', $newPass);
        if ($query->execute()) {
            $id = $_SESSION['user_id'];
            $query = $pdo->prepare('select * from user where user_id = :e_id');
            $query->bindParam('e_id', $id);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
        }
    }
}

if(isset($_POST['yes'])){
    $id = $_SESSION['user_id'];
    $cancle = 4;
    $query = $pdo->prepare("update user set sub_id = :yes where user_id = :id");
    $query->bindParam(':id', $id);
    $query->bindParam(':yes', $cancle);
    if ($query->execute()) {
        unset($_SESSION['sub_id']);
        header("location:subscribtion.php");
    }
}
if(isset($_POST['yes_can'])){
    $id = $_SESSION['user_id'];
    $cancle = 4;
    $query = $pdo->prepare("update user set sub_id = :yes where user_id = :id");
    $query->bindParam(':id', $id);
    $query->bindParam(':yes', $cancle);
    if ($query->execute()) {
        session_unset();
        header("location:login.php");
    }
}

?>