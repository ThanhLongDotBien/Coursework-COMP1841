<?php
require_once __DIR__ . '/includes/userauth.php';
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunction.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['content'])) {
    try {
        
        $userID = $_SESSION['userID'];
        $contact = SendEmail($pdo, $_POST['content'], $userID);

        echo '<script>
            alert("Message has been sent!");
            window.location.href = "contact.php";
          </script>';
        exit;

    } catch(PDOException $e){
    $title = 'Error has occurred';
    $output = 'Error adding question' . $e->getMessage();

    } 
} else {
        $title = 'Send email to admin';
        ob_start();
        include 'templates/contact.html.php';
        $output = ob_get_clean();
    }
include 'templates/layout.html.php';
?>