<?php

ini_set(‘display_errors’, ‘On’);
ini_set(‘display_startup_errors’, ‘On’);

require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;


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

// gives a array with all of the 100 company results
$nodeValues = $crawler->filter('li > a > ul')->each(function (Crawler $node, $i) {
    return $node->html();
});
print_r($nodeValues);

echo '<br><br><br><br>';

// checks if a given keyword is in the company array and prints it out
function checkCompany() {
  global $nodeValues;
  $matches = preg_grep("/Brillant/", $nodeValues);
  print_r($matches);
}
echo checkCompany();


echo '<br><br><br><br>';


// giving the header information
$headers = $response->getHeaders();
foreach($headers as $name => $value) {
  $value = implode(', ', $value);
  echo "{$name}: {$value}\r\n";
}
