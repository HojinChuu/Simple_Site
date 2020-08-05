<?php if(isset($_SESSION['errors'])) : ?>
    <?php foreach($_SESSION['errors'] as $errorsArray) : ?>
        <?php foreach($errorsArray as $errors) : ?>
            <div class="alert alert-danger mt-3">
                <?php foreach($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </div>
        <?php endforeach ?>
    <?php endforeach ?>
<?php endif ?>
<?php session_destroy() ?>

<h1>Login</h1>

<form action="<?= URLROOT ?>/login" method="POST">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="name" > 
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" name="password" id="password" placeholder="name" > 
    </div>
   
    <input type="submit" value="Login" class="btn btn-secondary">
</form>