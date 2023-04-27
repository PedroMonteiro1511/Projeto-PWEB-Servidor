<?php
class BaseController
{
    /**
     * Redirect to another route.
     *
     * @param string $controllerPrefix The controller prefix of the route to redirect to.
     * @param string $action The action of the route to redirect to.
     * @param array $params Optional query parameters to include in the redirect URL.
     */
    protected function redirectToRoute($route, $params = []
    ){
        $controllerPrefix = dirname($route);
        $action = basename($route);

        $url = 'Location: index.php?c='.$controllerPrefix.'&a='.$action;
        foreach ($params as $paramKey => $paramValue){
            $url.='&'.$paramKey.'='.$paramValue;
        }
        header($url);
    }

    protected function renderView($view, $params = [], $layout = 'default')
    {
        extract($params);
        $viewPath = "./views/$view.php";
        $layoutPath = "./views/layouts/$layout.php";
        require_once ($layoutPath);
    }
}