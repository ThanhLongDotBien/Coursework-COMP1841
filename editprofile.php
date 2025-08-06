<?php 
session_start();
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunction.php';
try{
    if (isset($_POST['username'])) {
        if (!empty($_POST['password'])) {
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            $user = GetUsers($pdo, $_SESSION['userID']);
            $hashedPassword = $user['password'];
        }



        editProfile($pdo, $_POST['username'],  $_POST['email'],  $_POST['location'],  $hashedPassword,  $_SESSION['userID']);
        header('Location: profile.php');
    }else{
        $title = 'Edit your profile';
        $users = GetUsers($pdo, $_SESSION['userID']);
        ob_start();
        include 'templates/editprofile.html.php';
        $output = ob_get_clean();
    }}
    catch(PDOException $e){
    $title = 'error has occured';
    $output = 'Error editing joke' . $e->getMessage();
}
include 'templates/layout.html.php';