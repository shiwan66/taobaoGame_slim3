<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);
namespace My;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Middleware
{
    function __invoke(Request $req,  Response $res, callable $next) {
        // Do stuff before passing along
        $newResponse = $next($req, $res);
        $res->write('hllo');
        // Do stuff after route is rendered
        return $newResponse; // continue
    }
}


// Register
$app->add(new Middleware());