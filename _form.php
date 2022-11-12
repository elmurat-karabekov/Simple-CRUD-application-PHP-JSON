
    <!-- Этот проект был написан на основе видео урока:
         https://www.youtube.com/watch?v=DWHZSkn5paQ -->

<div class="container">
    <div class="card">
        <?php if ($user['id']): ?>
        <div class="card-header">
            <h3>Update User <b><?= $user['name'] ?></b></h3>
        </div>
        <?php else: ?>
        <div class="card-header">
            <h3>Create new user</h3>
        </div>
        <?php endif; ?>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" type="text" value="<?= $user['name'] ?>" class="form-control <?php echo $errors['name'] ? 'is-invalid' : ''?>">
                    <div class="invalid-feedback">
                        <?= $errors['name'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input name="username" type="text" value="<?= $user['username'] ?>" class="form-control <?php echo $errors['username'] ? 'is-invalid' : ''?>">
                    <div class="invalid-feedback">
                        <?= $errors['username'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" type="text" value="<?= $user['email'] ?>" class="form-control <?php echo $errors['email'] ? 'is-invalid' : ''?>">
                    <div class="invalid-feedback">
                        <?= $errors['email'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input name="phone" type="text" value="<?= $user['phone'] ?>" class="form-control <?php echo $errors['phone'] ? 'is-invalid' : ''?>">
                    <div class="invalid-feedback">
                        <?= $errors['phone'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Website</label>
                    <input name="website" type="text" value="<?= $user['website'] ?>" class="form-control <?php echo $errors['website'] ? 'is-invalid' : ''?>">
                    <div class="invalid-feedback">
                        <?= $errors['website'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input name="picture" type="file" class="form-control-file">
                </div>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>