<?php
include("connection.php");
session_start();
if (isset($_GET['id']) && isset($_GET['status'])) {
    $userId = $_GET['id'];
    $user = $pdo->prepare('select username,status from user WHERE id = :id');
    $user->bindParam(':id', $userId);
    $user->execute();
    $username = $user->fetch(PDO::FETCH_ASSOC);
    if ($username) {
        $name = $_SESSION['username'];
        $profle = $_SESSION['pic'];
        $log = $_SESSION['username'] . " change status into " . ($username['status'] == 1 ? "Block of " : "Active of ") . $username['username'];
        $query = $pdo->prepare("insert into log (admin_name,logs, profile_img) values (:name,:log, :profile)");
        $query->bindParam('name', $name);
        $query->bindParam('log', $log);
        $query->bindParam('profile', $profle);
        if ($query->execute()) {

            $status = $_GET['status'];

            $query = $pdo->prepare('UPDATE user SET status = :status WHERE id = :id');
            $query->bindParam(':status', $status);
            $query->bindParam(':id', $userId);
            $query->execute();
            header('Location: total.php');
        }
    }
}
if (isset($_GET['id']) && isset($_GET['role'])) {
    $userId = $_GET['id'];
    $user = $pdo->prepare('select username from user WHERE id = :id');
    $user->bindParam(':id', $userId);
    $user->execute();
    $username = $user->fetch(PDO::FETCH_ASSOC);
    if ($username) {
        $name = $_SESSION['username'];
        $profle = $_SESSION['pic'];
        $log = $_SESSION['username'] . " change role of " . $username['username'];
        $query = $pdo->prepare("insert into log (admin_name,logs, profile_img) values (:name,:log, :profile)");
        $query->bindParam('name', $name);
        $query->bindParam('log', $log);
        $query->bindParam('profile', $profle);
        if ($query->execute()) {
            $role = $_GET['role'];
            $query = $pdo->prepare('UPDATE user SET role = :role WHERE id = :id');
            $query->bindParam(':role', $role);
            $query->bindParam(':id', $userId);
            $query->execute();
            header('Location: total.php');
        }
    }



}
?>