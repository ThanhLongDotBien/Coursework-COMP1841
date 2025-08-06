<?php 

require_once __DIR__ . '/../includes/adminauth.php';
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';
try {
    $contacts = ListEmail($pdo);
    $title = 'List of email';
    $totalContacts = totalContacts($pdo);
    ob_start();
    include '../templates/listemail.html.php';
    $output = ob_get_clean();
} catch(PDOException  $e){
    $title = 'Error has occurred';
    $output = 'Error adding question' . $e->getMessage();
}
include '../templates/admin_layout.html.php';