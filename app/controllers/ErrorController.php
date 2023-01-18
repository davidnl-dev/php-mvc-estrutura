<?php

namespace app\controllers;

class ErrorController extends Controller
{

    public function index()
    {
        $this->view('404');
    }
    
}
