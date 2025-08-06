<?php
session_start();
require 'includes/DatabaseConnection.php';
require 'includes/DatabaseFunction.php';

$search = trim($_GET['search'] ?? '');
$title = 'Search';

$questions      = fetchQuestions($pdo, $search);
$totalQuestions = countQuestions($pdo, $search);

ob_start();
include 'templates/listquestion.html.php';
$output = ob_get_clean();
include 'templates/layout.html.php';
