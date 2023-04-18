<?php

if(isset($errorMessage)){
    var_dump($errorMessage);
}

?>

<div class="container">
    <form action="index.php?c=auth&a=login" method="post">
        <div class="form-group">
            <label for="inputName">Username:</label>
            <input type="text" class="form-control" id="inputusername" aria-describedby="usernameHelp" placeholder="Username" name="username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password:</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
        </div>

        <p>
        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Login</button>
            Já tem conta?
        <a href="index.php?c=site&a=signup">Registar</a>
        </p>
    </form>
</div>