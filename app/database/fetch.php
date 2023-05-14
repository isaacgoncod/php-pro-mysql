<?php

function all($table, $fields = '*')
{
    try {
        $connect = connect();

        $query = $connect->query("SELECT {$fields} FROM {$table}");

        return $query->fetchAll();
    } catch (\PDOException $e) {
        var_dump($e->getMessage());
    }
}
