<?php

session_start();
if (!isset($_SESSION['userID'])) {
    echo '<script>
            alert("Please log in!");
            window.location.href = "login.php";
          </script>';
    exit;
}

include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunction.php';

$user = getUserByID($pdo, $_SESSION['userID']);
$questions =  GetQuestionByUser($pdo, $_SESSION['userID']);
$title = 'Your Profile';
ob_start();
include 'templates/profile.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php';
