<?php 

require_once __DIR__ . '/../includes/adminauth.php';
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';

try{
  $questions = listQuestions($pdo);
  $title = 'List of questions';
  $totalQuestions = totalQuestions($pdo);
  ob_start();
  include '../templates/admin_listquestion.html.php';
  $output = ob_get_clean();

}catch(PDOException $e){
    $title = 'Error has occurred';
    $output = 'Error adding question' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>