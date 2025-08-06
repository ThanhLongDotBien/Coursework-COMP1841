<?php 
require_once __DIR__ . '/../includes/adminauth.php';
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';

if (isset($_POST['Modulename'])) {
    try {
        addModule($pdo, $_POST['Modulename']);
        header('Location: listmodule.php');
    exit;
} catch(PDOException $e){
    $title = 'Error has occurred';
    $output = 'Error adding module' . $e->getMessage();
} 
} else {
    $title = 'Add a new module';
    ob_start();
    include '../templates/addmodule.html.php';
    $output = ob_get_clean();
}

include '../templates/admin_layout.html.php';
?>