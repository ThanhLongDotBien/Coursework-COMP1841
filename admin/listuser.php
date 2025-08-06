<?php 
require_once __DIR__ . '/../includes/adminauth.php';
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';
try {
    $users = listUsers($pdo);
    $title = 'List of users';
    $totalUsers = totalUsers($pdo);
    ob_start();
    include '../templates/admin_listuser.html.php';
    $output = ob_get_clean();
}catch(PDOException $e) {
    $title = 'Error has occurred';
    $output = 'Error listing users: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>