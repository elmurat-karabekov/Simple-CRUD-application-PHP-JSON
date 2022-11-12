<?php 

/*
    Этот проект был написан на основе видео урока:
    https://www.youtube.com/watch?v=DWHZSkn5paQ
*/

function getUsers(){
    return json_decode(file_get_contents(__DIR__."/users.json"), true);
}

function getUserById($id){
    $users = getusers();
    foreach ($users as $user){
        if($user['id'] == $id){
            return $user;
        }
    }
}

function updateUser($data, $id){
    $updateUser = [];
    $users = getUsers();

    foreach ($users as $i => $user){
        if ($user['id'] == $id){
            $users[$i] =  $updateUser = array_merge($user, $data);
        }
    }

    putJson($users);

    return $updateUser;
}

function createUser($data){
    $users = getUsers();

    $data['id'] = rand(100000, 200000);

    $users[] = $data;
    
    putJson($users);

    return $data;
}

function deleteUser($id){
    $users = getUsers();
    foreach ($users as $i => $user){
        if ($user['id'] == $id){
            array_splice($users, $i, 1);
        }
    }
    
    putJson($users);
}

function uploadImage($file, $user){
    if (!is_dir(__DIR__."/images")){
        mkdir(__DIR__."/images");
    }

    $fileName = $file['name'];
    $dotPosition = strpos($fileName, '.');
    $extension = substr($fileName, $dotPosition + 1);


    move_uploaded_file($file['tmp_name'], __DIR__."/images/{$user['id']}.$extension");

    $user['extension'] = $extension;
    updateUser($user, $user['id']);
}

function putJson($users){
    file_put_contents(__DIR__."/users.json", json_encode($users, JSON_PRETTY_PRINT));
}

function validateUser($user, &$errors){
    $isValid = true;

    if (!$user['name']){
        $isValid = false;
        $errors['name'] = 'Name is mandatory';
    }

    if (!$user['username'] || strlen($user['username']) < 6 || strlen($user['username']) > 16) {
        $isValid = false;
        $errors['username'] = 'Username is mandatory and must be more than 6 and less than 16 characters';
    }

    if ($user['email'] && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $errors['email'] = 'This must be a valid email address';
    }

    if (!filter_var($user['phone'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['phone'] = 'This must be a valid phone number';
    }

    if ($user['website'] && !filter_var("http://".$user['website'], FILTER_VALIDATE_URL)) {
        $isValid = false;
        $errors['website'] = 'This must be valid url';
    }

    return $isValid;
}
