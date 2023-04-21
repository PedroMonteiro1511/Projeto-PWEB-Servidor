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
            $_SESSION['active_user_password'] = $user->password;
            $_SESSION['active_user_username'] = $user->username;
            $_SESSION['active_user_email'] = $user->email;
            $_SESSION['active_user_telefone'] = $user->telefone;
            $_SESSION['active_user_nif'] = $user->nif;
            $_SESSION['active_user_morada'] = $user->morada;
            $_SESSION['active_user_codpostal'] = $user->codpostal;
            $_SESSION['active_user_localidade'] = $user->localidade;

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
