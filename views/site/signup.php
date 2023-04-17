<?php

if(isset($message)){
    var_dump($message);
}

?>

<html>
    <div class="container">
        <form action="index.php?c=site&a=signup" method="post">
            <div class="form-group">
                <label for="inputName">Name:</label>
                <input type="text" class="form-control" id="inputName" aria-describedby="emailHelp" placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label for="inputEmail">Email:</label>
                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="inputPassword">Password:</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Registar</button>
        </form>
    </div>
</html>
