<?php
require_once __DIR__ . '/../includes/adminauth.php';
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';
try{
    
    $row = GetQuestion($pdo, $_POST['id']);
    unlink('../uploads/'.$row['image']);
    DeleteQuestion($pdo, $_POST['questionid']);
    header('location: listquestion.php');

}catch(PDOException $e){
    $title = 'An error has occurred';
    $output = 'Unable to connect to delete question: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>