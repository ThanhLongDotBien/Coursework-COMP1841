<?php
require_once __DIR__ . '/../includes/adminauth.php';
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';
try{
    DeleteMail($pdo, $_POST['contactID']);
    header('location: listemail.php');
    exit;

}catch(PDOException $e){
    $title = 'An error has occurred';
    $output = 'Unable to connect to delete user: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';