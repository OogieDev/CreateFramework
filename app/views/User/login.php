<div class="com-md-6">
    <form method="post" action="/user/login">
        <div class="form-group">
            <label for="login">Login</label>
            <input type="login" name="login" class="form-control" id="login" placeholder="Login">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Вход</button>
    </form>

    <?php debug($_SESSION) ?>
</div>