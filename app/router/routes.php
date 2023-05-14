<?php

return [
    '/' => 'HomeController@index',
    '/user/create' => 'UserController@teste',
    '/user/[0-9]+' => 'UserController@index',
    '/user/[0-9]+/name/[a-z]+' => 'UserController@create',
];
