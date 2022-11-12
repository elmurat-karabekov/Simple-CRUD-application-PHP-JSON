<?php 

/*
    Этот проект был написан на основе видео урока:
    https://www.youtube.com/watch?v=DWHZSkn5paQ
*/

require_once "users/user.php";
include "partials/header.php";

if (!isset($_POST['id'])) {
    include "partials/not_found.php";
    exit;
}

$userId = $_POST['id'];

deleteUser($userId);

header("Location: index.php"); 