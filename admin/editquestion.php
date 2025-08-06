<?php 
session_start();
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userID = $_SESSION['userID'];

        $question = GetQuestion($pdo, $_POST['questionID']);
        if ($question['userID'] != $userID) {
            die();
        }

        $newImage = !empty($_FILES['fileToUpload']['name']) ? $_FILES['fileToUpload']['name'] : $question['image'];
        EditQuestion($pdo, $_POST['Title'], $_POST['content'], $newImage, $_POST['ModuleID'], $_POST['questionID'], $userID);

        if (!empty($_FILES['fileToUpload']['name'])) {
            include '../includes/uploadFile.php';
        }

        header('location: listquestion.php');
        exit;

    } else {
        $title = 'Edit a question';
        $questions = GetQuestion($pdo, $_GET['id']);

        
        if ($questions['userID'] != $_SESSION['userID']) {
            die();
        }

        $modules = GetAllModules($pdo);
        ob_start();
        include '../templates/editquestion.html.php';
        $output = ob_get_clean();
    }

} catch(PDOException $e){
    $title = 'Error has occurred';
    $output = 'Error editing question: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
