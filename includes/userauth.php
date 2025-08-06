<?php
session_start();
if (!isset($_SESSION['userID'])) {
    echo '<script>
            alert("Please log in!");
            window.location.href = "login.php";
          </script>';
    exit;
    
}
