<?php

function connect()
{
    return new PDO('mysql:host=localhost:3306;dbname=lumem', 'root', 'MySQL_2002', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ]);
}
