<?php 
session_start();

include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunction.php';
try {
    $modules = listModules($pdo);
    $title = 'List of modules';
    $totalModules = totalModules($pdo);
    ob_start();
    include 'templates/listmodule.html.php';
    $output = ob_get_clean();
}catch(PDOException $e) {
    $title = 'Error has occurred';
    $output = 'Error listing modules: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>