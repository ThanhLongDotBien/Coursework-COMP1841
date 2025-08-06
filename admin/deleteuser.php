<?php
require_once __DIR__ . '/../includes/adminauth.php';
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';
try{
    $user = DeleteUser($pdo, $_POST['userID']);
    header('location: /COMP1841/coursework/admin/listuser.php');
    exit;

}catch(PDOException $e){
    $title = 'An error has occurred';
    $output = 'Unable to connect to delete user: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';