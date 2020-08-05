<h1>Login</h1>

<form action="<?= URLROOT ?>/login" method="POST">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="name" required> 
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" name="password" id="password" placeholder="name" required> 
    </div>
   
    <input type="submit" value="Login" class="btn btn-secondary">
</form>