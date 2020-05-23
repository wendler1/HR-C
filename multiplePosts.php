<?php

ini_set(‘display_errors’, ‘On’);
ini_set(‘display_startup_errors’, ‘On’);

require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;


$client = new \GuzzleHttp\Client([
  'base_uri' => 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche'
]);

$bw = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'bw',
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

$by = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'by',
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

$be = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
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

$br = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'br',
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

$hb = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'hb',
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

$hh = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'hh',
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

$he = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'he',
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

$mv = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'mv',
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

$ni = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'ni',
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

$nw = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'nw',
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

$rp = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'rp',
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

$sl = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'sl',
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

$sn = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'sn',
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

$st = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'st',
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

$sh = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'sh',
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

$th = $client->request('POST', 'https://www.handelsregisterbekanntmachungen.de/?aktion=suche', [
  'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
  ],
  'form_params' => [
    'suchart' => 'uneingeschr',
    'land' => 'th',
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


$states = [$bw, $by, $be, $br, $hb, $hh, $he, $mv, $ni, $nw, $rp, $sl, $sn, $st, $sh, $th];

$useful_keywords = [
  'GmbH'
];
$not_useful_keywords = [
  'Beratung', 'consultation', 'Dienstleistung', 'Dienstleister', 'service provider',
  'Kanzlei', 'Agentur'
];

// checks if a keword in the $useful_keywords array is given in the $node_values array and prints it out
function checkCompanyArrayOnArray() {
  global $node_values;
  global $useful_keywords;
  $matched_words_array = array_filter($useful_keywords, function($w) use($node_values){
    $matches =  preg_grep("#\b" . $w . "\b#i", $node_values);
    print_r($matches);
  });
}

foreach ($states as $state) {
  echo '<br><br><br><br>';
  $body = ''.$state->getBody();
  $crawler = new Crawler($body);
  // gives a array with all of the 100 company results
  $node_values = $crawler->filter('li > a > ul')->each(function (Crawler $node, $i) {
      return $node->html();
  });
  print_r($node_values);
  //checkCompanyArrayOnArray();
}
