<?php
use Slim\Http\Stream;
// Routes

// $app->get('/[{name}]', function ($request, $response, $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");

//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });

$app->get('/info', function($request, $response, $args) {
    return $this->renderer->render($response, 'Script1.php', $args);
});

$app->get('/', function($req, $res, $args) {
    $id= $req->getParam('id');
    return $res->withStatus(200)->write($id);
});

$app->get('/redirect', function($req, $res, $args) {
    return $res->withStatus(302)->withHeader('Location', '/');
});

$app->get('/homes', function ($request, $response, $args) {
    $url = $this->router->pathFor('homes');
    $response->write("<a href='$url'>Home</a>");
    return $response;
})->setName('homes');

$app->get('/imgs', function($req, $response, $args) {
    $image = __DIR__.'/public/img/demo.jpg';
    $body = new Stream($image);
    // $response = (new Response())
    //      ->withStatus(200, 'OK')
    //      ->withHeader('Content-Type', 'image/jpeg')
    //      ->withHeader('Content-Length', filesize($image))
    //      ->withBody($body);
    return $response->write($image);
});