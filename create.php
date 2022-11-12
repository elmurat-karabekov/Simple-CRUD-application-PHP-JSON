<?php

/*
    Этот проект был написан на основе видео урока:
    https://www.youtube.com/watch?v=DWHZSkn5paQ
*/

require_once "users/user.php";
include "partials/header.php";

$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
];

$errors = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => "",
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = array_merge($user, $_POST);

    $isValid = validateUser($user, $errors);

    if ($isValid){
        $user = createUser($_POST);

        if (isset($_FILES['picture'])){
            uploadImage($_FILES['picture'], $user);
        }

        header("Location: index.php");
    }
    
}


?>

<?php include "_form.php" ?>

<?php include "partials/footer.php"; ?>