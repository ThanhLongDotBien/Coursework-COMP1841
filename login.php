<?php
session_start();
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunction.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['email'], $_POST['password'])
) {
    $user = Login($pdo, $_POST['email']);
    if ($user && password_verify($_POST['password'], $user['password'])) {
  
        $_SESSION['userID']   = $user['userID'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role']     = $user['role'] ?? 'user';  

    
        if ($_SESSION['role'] === 'admin') {
            header('Location: admin/listquestion.php');
        } else {
            header('Location: index.php');
    
        }
        exit;
    } else {
        $_SESSION['error'] = 'Wrong email or password, please try again.';
        header('Location: login.php');
        exit;
    }
}


$title = 'Log in';
ob_start();
include 'templates/login.html.php';
$output = ob_get_clean();
include 'templates/layout.html.php';
