<?php
require_once __DIR__ . '/../includes/adminauth.php';
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';
try{
    DeleteModule($pdo, $_POST['ModuleID']);
    header('location: listmodule.php');
    exit;

}catch(PDOException $e){
    $title = 'An error has occurred';
    $output = 'Unable to connect to delete user: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';