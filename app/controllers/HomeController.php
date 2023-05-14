<?php

namespace app\controllers;

class HomeController
{
    public function index($params)
    {
        $users = all('users');

        return[
            'view' => 'home.php',
            'data' => ['users' => $users],
        ];
    }
}
