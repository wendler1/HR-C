<?php

ini_set(‘display_errors’, ‘On’);
ini_set(‘display_startup_errors’, ‘On’);

require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;
// use Symfony\Component\BrowserKit\HttpBrowser;
// use Symfony\Component\HttpClient\HttpClient;


$client = new \GuzzleHttp\Client([
  'base_uri' => 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche'
]);

$response = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'be',
    'button' => 'Suche starten',
    'gericht' => null,
    'gericht_name' => null,
    'seite' => null,
    'l' => null,
    'r' => null,
    'all' => false,
    'vt' => null,
    'vm' => null,
    'vj' => null,
    'bt' => null,
    'bm' => null,
    'bj' => null,
    'fname' => null,
    'fsitz' => null,
    'rubrik' => null,
    'az' => null,
    'gegenstand' => 0,
    'order' => 4
  ]
]);
$body = ''.$response->getBody();

$crawler = new Crawler($body);

$nodeValues = $crawler->filter('li > a > ul')->each(function (Crawler $node, $i) {
    echo $node->html();
});

echo '<br><br><br><br>';
echo '<br><br><br><br>';echo '<br><br><br><br>';


$headers = $response->getHeaders();
foreach($headers as $name => $value) {
  $value = implode(', ', $value);
  echo "{$name}: {$value}\r\n";
}
