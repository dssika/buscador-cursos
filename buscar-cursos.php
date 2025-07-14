<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['verify' => false]);

$response = $client->request('GET', 'http://alura.com.br/cursos-online-programacao/php');

$html = $response->getBody();

$crawler = new Crawler();
$crawler->addHtmlContent($html);

$cursos = $crawler->filter('span.card-curso__nome');

foreach ($cursos as $curso) {
    echo $curso->textContent . PHP_EOL;
}



// echo $response->getStatusCode(); // 200
// echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
// echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

// // Send an asynchronous request.
// $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
// $promise = $client->sendAsync($request)->then(function ($response) {
//     echo 'I completed! ' . $response->getBody();
// });

// $promise->wait();
