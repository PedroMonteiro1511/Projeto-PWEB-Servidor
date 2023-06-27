<h1>Login!</h1>

<div class="container">
    <form action="index.php?c=auth&a=login" method="post">
        <div class="form-group mt-4">
            <label for="inputName">Username:</label>
            <input type="text" class="form-control" id="inputusername" aria-describedby="usernameHelp" placeholder="Username" name="username">
        </div>
        <div class="form-group mt-4">
            <label for="exampleInputPassword1">Password:</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
        </div>
        <?php if(isset($errorMessage)):?>
        <p style="color: red">
            <?= $errorMessage ?>
        </p>
        <?php endif;?>
        <button type="submit" class="btn btn-primary mt-4" style="margin-top: 10px;">Login</button>
        <p class="mt-2">

           Já tem conta?
        <a href="index.php?c=site&a=signup">Registar</a>
        </p>
    </form>
</div>