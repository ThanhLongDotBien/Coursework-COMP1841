<?php 
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';
try{
    if (isset($_POST['Modulename'])) {
        editModule($pdo, $_POST['Modulename'], $_POST['ModuleID']);
        header('location: listmodule.php');
    } else {
        $title = 'Edit a module';
        $Module = GetModules($pdo, $_GET['id']);
        ob_start();
        include '../templates/editmodule.html.php';
        $output = ob_get_clean();
    } 
} catch(PDOException $e){
    $title = 'Error has occurred';
    $output = 'Error adding question' . $e->getMessage();
}
include '../templates/admin_layout.html.php';