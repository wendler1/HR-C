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
    'gegenstand' => 1,
    'order' => 4
  ]
]);
$body = ''.$response->getBody();
$crawler = new Crawler($body);
// gives a array with all of the 100 company results
$node_values = $crawler->filter('li > a > ul')->each(function (Crawler $node, $i) {
    return $node->html();
});
print_r($node_values);

echo '<br><br><br><br><br><br><br><br>';


// gives from each company just the name till the first comma
foreach ($node_values as $key => $value) {
  $node_values_new[] = substr($value, 0, strpos($value, ","));
}
// print_r(implode("<br>\n",$node_values_new));


echo '<br><br><br><br><br><br><br><br>';



$useful_keywords = [
  'GmbH', 'automobile', 'sdhvwjpev',
];
$not_useful_keywords = [
  'Beratung', 'consultation', 'consulting', 'Dienstleistung', 'Dienstleister', 'service provider',
  'Kanzlei', 'Agentur',
  'Friseur', 'Möbel', 'Volksbank', 'Transporte',
  'Bauunternehmer', 'Bauunternehmen', 'Gesundheitszentrum', 'Catering', 'Versorgungszentrum', 'Haustechnik',
  'Hotel', 'Versicherungsbüro', 'Finanzen', 'holding', 'service', 'Industriestore', 'Verladetechnik', 'Seniorenhaus', 'Garten- und Landschaftsbau',
  'Immobilien', 'Presse', 'Redaktion', 'Grundbesitz', 'insurance', 'Gartengestaltung',
  'Autohandel', 'Automobile', 'Pflegeteam', 'Blumenhaus', 'Tankstelle', 'Berufsausübungsgemeinschaft', 'Bauplanung', 'Solarbau',
  'Landschaftspflege', 'Malermeister',
  'e.K.', 'e. K.', 'e.Kfr', 'e.Kfm.', 'e.V.', 'e. V.',
  'ventures', 'trade ', 'construction',
  'Tagespflege', 'Real Estate', 'Windpark',
  'Zweigniederlassung', 'Restaurant', 'Ingenieure', 'Sicherheitsdienst',
  'Bohrtechnik', 'Fliesenhandwerk', 'Bauträger', 'Car Center',  'Pflegedienst', 'Blitzschutztechnik', 'gemeinnützig', 'Dachdecker', 'Gerüstbau', 'Konditorei', ' Makler', 'Bausanierung',
  'Rohbau', 'carwash ', 'Sportstudio', 'physiotherapie', 'Trockenbau', 'Spielhalle',
  'Sicherheitstechnik', 'Akademie ', 'Ingenieurbüro', 'Lüftungstechnik', 'Institut ', 'Straßenbau',
  'Cosmetics', 'Kommunikationstechnik', 'Investment', ' leasing', 'Logistik', 'logistics', 'Verwaltung', 'Solution',
  'Seniorenresidenz', 'Angiologie', 'Tierpark', 'Sanitätshaus',
  'Verkehrsplanung', 'Getränke', 'Bauprojekt', 'Eventmanagement', 'Capital', 'Architekt', 'Frischemarkt', 'Solarpark', 'Montage', 'Spedition', 'taxi ',
  'Elektrotechnik', ' Bau ', 'Agrarhandel', 'Sachverständig', 'Energie', 'Energy', 'Projekt', 'Events',


  // Rausgenommen weil doppelt vorhanden als String
  // 'Unternehmensberatung', 'Steuerberatung', 'Baudienstleistungen', 'Friseursalon', 'Aufzugsmontageservice', 'Personalleasing', 'Verwaltungs', 'Grundstücksverwaltung',  'Vermögensverwaltung',
  // 'Anlagenmontage', 'Montageprofi', 'Sachverständigengesellschaft', ' Montageteam', 'Bauprojekt',
];


$gs_keywords = [
    'Artist', 'about', 'aktiv', 'amor', 'app', 'audio', 'auto', 'alliance', 'advisor', 'agent',
    'Baby', 'basic', 'beauty', 'best', 'better', 'Bildung', 'billiger', 'bill', 'bio', 'box', 'bit', 'bite', 'blink', 'blue', 'Blumen', 'butler', 'body', 'bonus', 'book',
    'brain', 'brand', 'buch', 'business', 'burger', 'beer', 'bot', 'brief', 'button', 'bestseller', 'base', 'buddy', 'blick', 'black', 'bird', 'beat', 'blau', 'builder',
    'car', 'cloud', 'crowd', 'care', 'case', 'cat', 'call', 'campus', 'connect', 'channel', 'check', 'chat', 'cheap', 'city', 'chef', 'choco', 'cine', 'Click', 'club',
    'code', 'coding', 'coffee', 'collect', 'communication', 'community', 'company', 'content', 'copy', 'couch', 'coupon', 'credit', 'craft', 'customer', 'cyber', 'cool', 'clever', 'candy',
    'challenge', 'color', 'change', 'cab', 'catcher',
    'days', 'digital', 'date', 'dog', 'drive', 'daily', 'deal', 'data', 'debit', 'Dein', 'deep', 'design', 'delikat', 'delicious', 'deliver', 'demo', 'desk', 'dental', 'desire', 'detail',
    'deutsch', 'device', 'direkt', 'discount', 'door', 'darling', 'duell',
    'economics', 'e-commerce', 'entertainment', 'essen', 'early', 'easy', 'eat', 'ebook', 'element', 'elite', 'endless', 'energy', 'energie', 'entwickler', 'experience', 'expert', 'explain', 'eye',
    'finder', 'flash', 'flower', 'friend', 'funk', 'fleisch', 'food', 'factory', 'fair', 'family', 'fashion', 'fast', 'fellow', 'flames', 'finance', 'financial', 'finanz', 'fine', 'fire', 'first',
    'fit', 'fitness', 'flight', 'foot', 'freelance', 'fresh', 'frisch',
    'games', 'game', 'gastro', 'geiz', 'genus', 'German', 'Geschenk', 'get', 'guide', 'global', 'good', 'golf', 'gold', 'green', 'grün', 'gelb', 'groupon', 'grinder', 'Gutschein',
    'Gruppe', 'generation',
    'health', 'home', 'handy', 'hallo', 'happy', 'haus', 'heart', 'heimat', 'hello', 'help', 'hemp', 'hidden', 'high', 'Hochzeit', 'Hotel', 'house', 'held', 'hero', 'hub',
    'ideal', 'idea', 'idee', 'ident', 'infinity', 'inno', 'item',
    'jerky', 'job', 'join', 'juicy', 'young', 'jung', 'just', 'jagd',
    'Koenig', 'king', 'kids', 'kaffee', 'kaputt', 'karriere', 'kauf', 'kern', 'key', 'kinder', 'kino', 'kiss', 'kitchen', 'klick', 'klima', 'koffer', 'kontakt', 'kopf', 'Kokos', 'kredit',
    'kunst', 'kommunikation',
    'laser', 'link', 'lover', 'living', 'lingerie', 'love', 'lab', 'labs', 'later', 'Lebenslauf', 'lemon', 'liefer', 'lifestyle', 'light', 'ling', 'liquid', 'little', 'lokal', 'loop', 'lucky',
    'luxus', 'level', 'lobby',
    'Markt', 'marketing', 'Medien', 'meat', 'mate', 'movement', 'medical', 'media', 'monday', 'mobility', 'mädchen', 'made', 'magazine', 'make', 'master', 'match', 'meal', 'medi', 'meet',
    'mein', 'milk', 'mister', 'mobile', 'Moebel', 'money', 'move', 'moving', 'music', 'musik', 'mute', 'My', 'muesli',
    'nerd', 'ninja', 'natur', 'nacht', 'navi', 'net', 'netz' , 'news', 'next', 'night', 'note', 'notebook', 'network',
    'office', 'ocean','online', 'open', 'order', 'original', 'outfit', 'over', 'oxygen',
    'phone', 'power', 'product', 'pilot', 'portal', 'people', 'pair', 'paper', 'papier', 'perfume', 'parfum', 'park', 'Parkplatz', 'party', 'patient', 'pay', 'peak', 'perfect', 'person',
    'pflege', 'photo', 'pixel', 'pizza', 'place', 'plan', 'podcast', 'praktikum', 'preis', 'prima', 'profi', 'project', 'promotion', 'punk', 'pure',
    'quiz',
    'Roller', 'room', 'right', 'radio', 'reload', 'Rabatt', 'rate', 'ready', 'read', 'record', 'regio', 'reise', 'response', 'rent',  'receipt', 'rezept', 'ride', 'risk',
    'robo', 'rocket',
    'scout', 'startup', 'sharing', 'supply', 'safe', 'smart', 'smartphone', 'scape', 'straps', 'school', 'service', 'sofa', 'sparen', 'size', 'spirit', 'software', 'saving', 'schwarz', 'score', 'spielzeug',
    'surf', 'stark', 'strong', 'start-up', 'scan', 'schlaf', 'sleep', 'schmuck', 'schnitt', 'schuh', 'shoes', 'schueler', 'search', 'second', 'secure', 'seed', 'share', 'ship', 'shop',
    'signal', 'simple', 'skill', 'small', 'snap', 'sober', 'social', 'sock', 'sofort', 'soft', 'solar', 'Sonntag', 'sunday', 'soul', 'sound', 'spar', 'speise', 'spiegel', 'sport', 'spread',

    'spotted', 'stage', 'store', 'strand', 'stream', 'street', 'stress', 'student', 'study', 'style', 'sugar', 'suit', 'super', 'sweet', 'switch',
    'ticket', 'thinking', 'team', 'trend', 'taxi', 'take', 'talent', 'Tarif', 'tausch', 'tee', 'tea', 'tech', 'test', 'textil',
    ' the ', 'think', 'time', 'titan', 'tomorrow', 'tour', 'toy', 'track', 'tracks', 'trade', 'traffic', 'travel', 'treasure', 'trip', 'trust',
    'uber', 'ueber', 'united', 'user', 'unser', 'Unternehmer', 'urlaub', 'used', 'university',
    'vision', 'virtuality', 'vital', 'verein', 'vergleich', 'verkehr', 'Versorgung', 'video', 'views',  'vino', 'virtual', 'visit', 'visum', 'voll', 'vorsorge',
    'wrong', 'writers', 'wedding', 'werk', 'werkstatt', 'wonder', 'wunder', 'wander', ' was ', 'watch', 'welcome', 'wellness', 'welt', 'world', 'wetter', 'wein', 'wing', 'wise', 'wolke',
    'work', 'wünsch', 'waste',
    'xpress', 'you', 'yoga', 'yellow', 'zutat', 'zimmer', 'zigarette', 'zins', 'zoo', 'zuhaus',
    'twentyfourseven', 'twentyfour', 'twenty', 'one ', 'two ', 'three', 'four', 'seven',


    'Commercial', 'concern', 'company', 'industry', 'profitability', 'corporate', 'entrepreneurs', 'marketplace', 'client', 'merchants', 'professional',
    'Engineering', 'science', 'innovation', 'computing', 'development', 'skills', 'skilled', 'data-processing', 'hi-tech', 'high-tech', 'robotics', 'system', 'solution',
    'Nutrient', 'gourmet', 'groceries', 'cooking', 'hunger', 'chow', 'lunch', 'refreshment', 'dish', 'drinking', 'dinner', 'diet',
    'Fruit', 'vegetable', 'watermelon', 'banana', 'apple', 'coconut', 'orange', 'grape', 'melon', 'peach', 'tomato', 'lettuce', 'onion', 'pumpkin', 'carrot', 'potato', 'cherry',
    'healthcare', 'vitality', 'Career', 'lifetime', 'journey', 'assignment', 'progress', 'course', 'Television', 'journalist', 'multimedia', 'communications', 'audiovisual',

    'Programming',
];

// var_dump(count($gs_keywords));exit();





// checks if a keyword in the $useful_keywords and $not_useful_keywords array is given in the $node_values array and prints it out
function checkCompanyArrayOnArray() {
  global $node_values;
  global $node_values_new;
  global $useful_keywords;
  global $not_useful_keywords;
  global $gs_keywords;


  foreach ($node_values_new as $key => $value) {
    foreach ($not_useful_keywords as $keyword) {
      if (stripos($value, $keyword) !== false) {
        unset($node_values_new[$key]);
      }
    }
  }
  foreach ($node_values_new as $key => $value) {
    foreach ($gs_keywords as $keyword) {
      if (stripos($value, $keyword) !== false) {
        $results[] = $node_values_new[$key];
      }
    }
  }
  $new_array_results = array_unique($results);
  print_r(count($new_array_results));
  print_r(' Ergebnise durch check beider arrays: ');
  echo '<br><br>';
  print_r(implode("<br>\n",$new_array_results));

  // möglichkeit zum testen nur für ausfilterung mit $not_useful_keywords
  // print_r(count($node_values_new));
  // print_r($node_values_new);
}
echo checkCompanyArrayOnArray();




echo '<br><br><br><br><br><br><br><br>';



// checks if a keyword in the $useful_keywords and $not_useful_keywords array is given in the $node_values array and prints it out
function checkCompanyArrayOnArray2() {
  global $node_values;
  global $node_values_new;
  global $useful_keywords;
  global $not_useful_keywords;
  global $gs_keywords;


  foreach ($node_values_new as $key => $value) {
    foreach ($not_useful_keywords as $keyword) {
      if (stripos($value, $keyword) !== false) {
        unset($node_values_new[$key]);
      }
    }
  }
  // möglichkeit zum testen nur für ausfilterung mit $not_useful_keywords
  print_r(count($node_values_new));
  print_r(' Ergebnise nur durch check des not_useful_keywords arrays: ');
  echo '<br><br>';
  print_r(implode("<br>\n",$node_values_new));
}
echo checkCompanyArrayOnArray2();




echo '<br><br><br><br><br><br><br><br>';

// giving the header information
$headers = $response->getHeaders();
foreach($headers as $name => $value) {
  $value = implode(', ', $value);
  echo "{$name}: {$value}\r\n";
}


echo '<br><br><br><br><br><br><br><br>';


// checks if a keword in the $useful_keywords array is given in the $node_values array and prints it out
// array_filter($useful_keywords, function($w) use($node_values){
//   $matches =  preg_grep("#\b" . $w . "\b#i", $node_values);
//   // print_r($matches);
//   foreach($matches as $match){
//     if(empty($matches)){
//       unset($matches);
//     }
//     echo $match,"<br />";
//
//   }
// });


// checks if a given keyword is in the company array and prints it out
// in this case "GmbH" (justfor testing)
// function checkCompanySingleKeyword() {
//   global $node_values;
//   $matches = preg_grep("#\bgmbh\b#i", $node_values);
//   print_r($matches);
// }
// echo checkCompanySingleKeyword();
// echo '<br><br><br><br><br><br><br><br>';
