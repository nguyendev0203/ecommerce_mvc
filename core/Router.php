<?php

class Router
{
    public static function route($url)
    {

        //Controller
        $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
        $controller_name = $controller;
        array_shift($url);

        //action
        $action = (isset($url[0]) && $url[0] != '') ? $url[0].'Action' : 'indexAction';
        $action_name = $controller;
        array_shift($url);
       
        //params
        $quyeryParams = $url;
        $dispatch = new $controller($controller_name,$action);
        if(method_exists($controller, $action)){
            call_user_func_array([$dispatch,$action], $quyeryParams);
        } else {
            die('That method does not exits in the controller \"'.$controller . '\"');
        }
    }
}
