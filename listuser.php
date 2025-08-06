<?php 
session_start();

include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunction.php';
try {
    $users = listUsers($pdo);
    $title = 'List of users';
    $totalUsers = totalUsers($pdo);
    ob_start();
    include 'templates/listuser.html.php';
    $output = ob_get_clean();
}catch(PDOException $e) {
    $title = 'Error has occurred';
    $output = 'Error listing users: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>