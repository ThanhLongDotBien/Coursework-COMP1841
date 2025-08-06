<?php 
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';

if (isset($_POST['Title']) && isset($_POST['content'])) {

    try{
        session_start();
        $userID = $_SESSION['userID'];
        $questions = addContent($pdo, $_POST['Title'], $_POST['content'], $_FILES['fileToUpload']['name'], $userID, $_POST['modules']);
        include 'includes/uploadFilePublic.php';
        header('location: listquestion.php');
        exit;
    } catch(PDOException $e){
    $title = 'Error has occurred';
    $output = 'Error adding question' . $e->getMessage();
}
} else {
        $title = 'Ask a new question';
        $modules = GetAllModules($pdo);
        $users = GetAllUsers($pdo);


        ob_start();
        include '../templates/addquestion.html.php';
        $output = ob_get_clean();
    }
include '../templates/admin_layout.html.php';
?>