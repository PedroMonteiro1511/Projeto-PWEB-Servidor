<?php

class Auth
{
    public function __construct()
    {
        session_start();
    }

    public function checkAuth($username, $password): bool
    {
        $usernameDB = "t";
        $passwordDB = "t";

        if ($username == $usernameDB && $password == $passwordDB) {
            $_SESSION["username"] = $username;
            return true;
        }
        return false;
    }

    public function isLoggedIn(): bool
    {
        if (isset($_SESSION["username"])) {
            return true;
        }

        return false;
    }

    public function Logout()
    {
        session_destroy();
    }
}
