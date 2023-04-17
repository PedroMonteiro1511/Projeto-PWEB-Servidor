<?php
class BaseController
{
    public function redirectToRoute($route)
    {
        header("Location: views/$route.php");
        exit();
    }

    public function renderView($view, $params = [])
    {
        extract($params);
        require_once "./views/layouts/header.php";
        require_once "./views/$view.php";
        require_once "./views/layouts/footer.php";
    }
}