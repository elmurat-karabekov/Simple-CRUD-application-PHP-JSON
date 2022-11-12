<?php

/*
    Этот проект был написан на основе видео урока:
    https://www.youtube.com/watch?v=DWHZSkn5paQ
*/

require "users/user.php";

$users = getUsers();

include "partials/header.php";

?>

<div class="container">
    <p>
        <a class="btn btn-success" href="create.php">Create new User</a>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th><b>Image</b></th>
                <th><b>Name</b></th>
                <th><b>Username</b></th>
                <th><b>Email</b></th>
                <th><b>Phone</b></th>
                <th><b>Website</b></th>
                <th><b>Actions</b></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <?php if (isset($user['extension'])): ?>
                            <img style="width: 60px;" src="<?= "users/images/{$user['id']}.{$user['extension']}" ?>" alt="">
                        <?php endif; ?>
                    </td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['phone'] ?></td>
                    <td>
                        <a target="_blank" href="http://<?= $user['website']?>"><?= $user['website']?></a>
                    </td>
                    <td>
                        <a href="view.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                        <a href="update.php ?id=<?= $user['id']?>" class="btn btn-sm btn-outline-secondary">Update</a>
                        <form method="POST" action="delete.php">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>         
        
    </table>
</div>

<?php include "partials/footer.php"; ?>