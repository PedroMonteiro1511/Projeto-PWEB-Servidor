<?php
function checkAuth($username, $password) : bool
{
    $usernameDB = "t";
    $passwordDB = "t";

    if ($username == $usernameDB && $password == $passwordDB) {
        session_start();
        $_SESSION["username"] = "testeUser";

        return true;
    }

    return false;
}

function isLoggedIn(): bool{

    session_start();
    if(isset($_SESSION["username"])){
        return true;
    }

    return false;
}

function Logout()
{
    session_destroy();
}