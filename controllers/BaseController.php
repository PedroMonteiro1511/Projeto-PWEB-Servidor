<?php
class BaseController
{

    public function redirectToRoute($route)
    {
        $view = dirname($route);
        $action = basename($route);

        header("Location: index.php?c=$view&a=$action");
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