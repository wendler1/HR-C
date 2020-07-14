<?php

ini_set(‘display_errors’, ‘On’);
ini_set(‘display_startup_errors’, ‘On’);

require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\UriResolver;

$client = new \GuzzleHttp\Client([
  'base_uri' => 'https://www.handelsregisterbekanntmachungen.de/'
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
    'gegenstand' => 1,
    'order' => 4
  ]
]);
$body = ''.$response->getBody();
$crawler = new Crawler($body);

// print_r($body);

// $link = $crawler->filter('li > a')->link();
// $absoluteUrl = UriResolver::resolve('$link', 'https://www.handelsregisterbekanntmachungen.de/skripte/hrb.php?');



echo '<br><br><br><br><br><br><br><br>';




// // gives from each company just the name till the first comma
// foreach ($node_values as $key => $value) {
//   $node_values_new[] = substr($value, 0, strpos($value, ","));
// }
// // print_r(implode("<br>\n",$node_values_new));
