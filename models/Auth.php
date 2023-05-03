<?php

class Auth
{
    public function __construct()
    {
        session_start();
    }

    public function checkAuth($username, $password): bool
    {
        $user = User::find('one', array('conditions' => "username LIKE '$username' and password LIKE '$password'"));

        if ($user) {

            $_SESSION['active_user_id'] = $user->id;
            $_SESSION['active_user_username'] = $user->username;
            $_SESSION['active_user_role'] = $user->role;

            return true;
        } else {
            return false;
        }

        return false;
    }

    public static function get_active_user($id)
    {
        $user = User::find([$id]);

        return $user->username;
    }

    public static function isLoggedIn(): bool
    {
        if (isset($_SESSION["active_user_id"])) {
            return true;
        }

        return false;
    }

    public function get_active_role(){
        if (isset($_SESSION['active_user_role'])){
            return $_SESSION['active_user_role'];
        }
        else
            return null;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }
}
