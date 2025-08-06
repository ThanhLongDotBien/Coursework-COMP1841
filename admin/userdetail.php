<?php 
session_start();
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';

$user = getUserByID($pdo, $_GET['id']);
$questions = GetQuestionByUser($pdo,  $_GET['id']);
$title = 'User Detail';
ob_start();
include '../templates/admin_userdetail.php';
$output = ob_get_clean();
include '../templates/admin_layout.html.php';
