
<?php 
session_start();
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunction.php';

try{
  
  $questions = listQuestions($pdo);
  $title = 'List of questions';
  $totalQuestions = totalQuestions($pdo);
  ob_start();
  include 'templates/listquestion.html.php';
  $output = ob_get_clean();

}catch(PDOException $e){
    $title = 'Error has occurred';
    $output = 'Error adding question' . $e->getMessage();
}
include 'templates/layout.html.php';
?>