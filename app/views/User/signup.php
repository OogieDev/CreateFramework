<div class="com-md-6">
    <form method="post" action="/user/signup">
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" value="<?=isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : ''; ?>" name="login" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Enter login">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" value="<?=isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : ''; ?>" name="name" class="form-control" id="name" placeholder="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" value="<?=isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : ''; ?>" name="email" class="form-control" id="email" placeholder="email">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
</div>