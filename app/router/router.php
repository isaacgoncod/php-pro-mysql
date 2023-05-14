<?php

function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $routes = routes();

    $matchedUri = exactMatchUriInArrayRoutes($uri, $routes);

    $params = [];

    if (empty($matchedUri)) {
        $matchedUri = regularExpressionMatchArrayRoutes($uri, $routes);

        $uri = explode('/', ltrim($uri, '/'));

        $params = params($uri, $matchedUri);

        $params = paramsFormat($uri, $params);
    }

    if (!empty($matchedUri)) {
        return controller($matchedUri, $params);
    }

    throw new Exception('algo deu errado');
}

function paramsFormat($uri, $params)
{
    $paramsData = [];

    foreach ($params as $index => $param) {
        $paramsData[$uri[$index - 1]] = $param;
    }

    return $paramsData;
}

function params($uri, $matchedUri)
{
    if (!empty($matchedUri)) {
        $matchedToGetParams = array_keys($matchedUri)[0];

        return array_diff(
            explode('/', ltrim($matchedToGetParams, '/'))
        );
    }

    return [];
}

function regularExpressionMatchArrayRoutes($uri, $routes)
{
    return array_filter(
        $routes,
        function ($value) use ($uri) {
            $regex = str_replace('/', '\/', ltrim($value, '/'));

            return preg_match("/^$regex$/", ltrim($uri, '/'));
        },
        ARRAY_FILTER_USE_KEY
    );
}

function exactMatchUriInArrayRoutes($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        return  [$uri => $routes[$uri]];
    }

    return [];
}

function routes()
{
    return require 'routes.php';
}
