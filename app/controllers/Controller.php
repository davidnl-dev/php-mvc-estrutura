<?php

namespace app\controllers;

abstract class Controller
{


    public function __construct()
    {
    }

    public static function view($page, $params = null)
    {

        $loader = new \Twig\Loader\FilesystemLoader(dirname(__FILE__, 2) . '/views/');
        $twig = new \Twig\Environment($loader);

        if ($params == null) :
            $params = array();
        endif;

        $template = $twig->load($page . '.html');
        $content = $template->render($params);
        echo $content;
    }
}
