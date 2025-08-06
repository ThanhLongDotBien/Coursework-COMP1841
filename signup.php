<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunction.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    SignUp($pdo, $_POST['username'], $_POST['email'], $_POST['location'], $hashedPassword);

    echo '<script>
            alert("Your account has been created successfully!");
            window.location.href = "Login.php";
          </script>';;
}
$title = 'Sign up';
ob_start();
include 'templates/signup.html.php';
$output = ob_get_clean();
include 'templates/layout.html.php';
?>