<?php

/*
    Этот проект был написан на основе видео урока:
    https://www.youtube.com/watch?v=DWHZSkn5paQ
*/

require_once "users/user.php";
include "partials/header.php";

if (!isset($_GET['id'])) {
    include "partials/not_found.php";
    exit;
}

$userId = $_GET['id'];

$user = getUserById($userId);

if (!$user) {
    include "partials/not_found.php";
    exit;
}

$errors = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => "",
];
 
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $user = array_merge($user, $_POST);   

    $isValid = validateUser($user, $errors);

    if ($isValid){
        $user = updateUser($_POST, $userId);
        updateUser($_POST, $userId);

        if (isset($_FILES['picture'])){
            uploadImage($_FILES['picture'], $user);
        }

        header("Location: index.php");
    }
}

?>


<?php include "_form.php" ?>


<?php include "partials/footer.php"; ?>