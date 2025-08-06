<?php 
require_once __DIR__ . '/../includes/adminauth.php';
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';
try {
    $modules = listModules($pdo);
    $title = 'List of modules';
    $totalModules = totalModules($pdo);
    ob_start();
    include '../templates/admin_listmodule.html.php';
    $output = ob_get_clean();
}catch(PDOException $e) {
    $title = 'Error has occurred';
    $output = 'Error listing modules: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>