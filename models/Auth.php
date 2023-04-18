<?php

class Auth
{

    public function __construct()
    {
        session_start();
    }

    public function checkAuth($username, $password): bool
    {
        $users = User::all();

        foreach ($users as $user){

            $usernameDB = $user->username;
            $passwordDB = $user->password;

            if ($username == $usernameDB && $password == $passwordDB) {
                $_SESSION["username"] = $user->username;
                $_SESSION["active_user_id"] = $user->id;
                return true;
            }
            else{
                return false;
            }
        }
        return false;
    }

    public function isLoggedIn(): bool
    {
        if (isset($_SESSION["active_user_id"])) {
            return true;
        }

        return false;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }
}
