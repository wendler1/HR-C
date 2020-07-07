<?php

ini_set(‘display_errors’, ‘On’);
ini_set(‘display_startup_errors’, ‘On’);

require 'vendor/autoload.php';
require_once("db_config.inc.php");

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

$useful_keywords = [
  'Artist', 'about', 'aktiv', 'amor', 'app', 'audio', 'auto', 'alliance', 'advisor', 'agent', 'challenge', 'color', 'change', 'cab', 'catcher', 'Gruppe', 'generation',
  'Baby', 'basic', 'beauty', 'best', 'better', 'Bildung', 'billiger', 'bill', 'bio', 'box', 'bit', 'bite', 'blink', 'blue', 'Blumen', 'butler', 'body', 'bonus', 'book',
  'brain', 'brand', 'buch', 'business', 'burger', 'beer', 'bot', 'brief', 'button', 'bestseller', 'base', 'buddy', 'blick', 'black', 'bird', 'beat', 'blau', 'builder',
  'car', 'cloud', 'crowd', 'care', 'case', 'cat', 'call', 'campus', 'connect', 'channel', 'check', 'chat', 'cheap', 'city', 'chef', 'choco', 'cine', 'Click', 'club',
  'code', 'coding', 'coffee', 'collect', 'communication', 'community', 'company', 'content', 'copy', 'couch', 'coupon', 'credit', 'craft', 'customer', 'cyber', 'cool', 'clever', 'candy',
  'days', 'digital', 'date', 'dog', 'drive', 'daily', 'deal', 'data', 'debit', 'Dein', 'deep', 'design', 'delikat', 'delicious', 'deliver', 'demo', 'desk', 'dental', 'desire', 'detail',
  'deutsch', 'device', 'direkt', 'discount', 'door', 'darling', 'duell', 'fit', 'fitness', 'flight', 'foot', 'freelance', 'fresh', 'frisch', 'kunst', 'kommunikation',
  'economics', 'e-commerce', 'entertainment', 'essen', 'early', 'easy', 'eat', 'ebook', 'element', 'elite', 'endless', 'energy', 'energie', 'entwickler', 'experience', 'expert', 'explain', 'eye',
  'finder', 'flash', 'flower', 'friend', 'funk', 'fleisch', 'food', 'factory', 'fair', 'family', 'fashion', 'fast', 'fellow', 'flames', 'finance', 'financial', 'finanz', 'fine', 'fire', 'first',
  'games', 'game', 'gastro', 'geiz', 'genus', 'German', 'Geschenk', 'get', 'guide', 'global', 'good', 'golf', 'gold', 'green', 'grün', 'gelb', 'groupon', 'grinder', 'Gutschein',
  'health', 'home', 'handy', 'hallo', 'happy', 'haus', 'heart', 'heimat', 'hello', 'help', 'hemp', 'hidden', 'high', 'Hochzeit', 'Hotel', 'house', 'held', 'hero', 'hub',
  'ideal', 'idea', 'idee', 'ident', 'infinity', 'inno', 'item', 'jerky', 'job', 'join', 'juicy', 'young', 'jung', 'just', 'jagd', 'quiz', 'luxus', 'level', 'lobby', 'robo',
  'Koenig', 'king', 'kids', 'kaffee', 'kaputt', 'karriere', 'kauf', 'kern', 'key', 'kinder', 'kino', 'kiss', 'kitchen', 'klick', 'klima', 'koffer', 'kontakt', 'kopf', 'Kokos', 'kredit',
  'laser', 'link', 'lover', 'living', 'lingerie', 'love', 'lab', 'labs', 'later', 'Lebenslauf', 'lemon', 'liefer', 'lifestyle', 'light', 'ling', 'liquid', 'little', 'lokal', 'loop', 'lucky',
  'Markt', 'marketing', 'Medien', 'meat', 'mate', 'movement', 'medical', 'media', 'monday', 'mobility', 'mädchen', 'made', 'magazine', 'make', 'master', 'match', 'meal', 'medi', 'meet',
  'mein', 'milk', 'mister', 'mobile', 'Moebel', 'money', 'move', 'moving', 'music', 'musik', 'mute', 'My', 'muesli', 'rocket', 'work', 'wünsch', 'waste', 'genius', 'active', 'parcel',
  'nerd', 'ninja', 'natur', 'nacht', 'navi', 'net', 'netz' , 'news', 'next', 'night', 'note', 'notebook', 'network', 'future', 'tribe', 'urban', 'brother', 'Programming', 'four', 'seven',
  'office', 'ocean','online', 'open', 'order', 'original', 'outfit', 'over', 'oxygen', 'charge', 'grow', 'sharp', 'flow', 'twentyfourseven', 'twentyfour', 'twenty', 'one ', 'two ', 'three',
  'phone', 'power', 'product', 'pilot', 'portal', 'people', 'pair', 'paper', 'papier', 'perfume', 'parfum', 'park', 'Parkplatz', 'party', 'patient', 'pay', 'peak', 'perfect', 'person',
  'pflege', 'photo', 'pixel', 'pizza', 'place', 'plan', 'podcast', 'praktikum', 'preis', 'prima', 'profi', 'project', 'promotion', 'punk', 'pure', 'Tarif', 'tausch', 'tee', 'tea', 'tech',
  'Roller', 'room', 'right', 'radio', 'reload', 'Rabatt', 'rate', 'ready', 'read', 'record', 'regio', 'reise', 'response', 'rent',  'receipt', 'rezept', 'ride', 'risk', 'test', 'textil',
  'scout', 'startup', 'sharing', 'supply', 'safe', 'smart', 'smartphone', 'scape', 'straps', 'school', 'service', 'sofa', 'sparen', 'size', 'spirit', 'software', 'saving', 'schwarz', 'score', 'spielzeug',
  'surf', 'stark', 'strong', 'start-up', 'scan', 'schlaf', 'sleep', 'schmuck', 'schnitt', 'schuh', 'shoes', 'schueler', 'search', 'second', 'secure', 'seed', 'share', 'ship', 'shop',
  'signal', 'simple', 'skill', 'small', 'snap', 'sober', 'social', 'sock', 'sofort', 'soft', 'solar', 'Sonntag', 'sunday', 'soul', 'sound', 'spar', 'speise', 'spiegel', 'sport', 'spread',
  'spotted', 'stage', 'store', 'strand', 'stream', 'street', 'stress', 'student', 'study', 'style', 'sugar', 'suit', 'super', 'sweet', 'switch','ticket', 'thinking', 'team',
  ' the ', 'think', 'time', 'titan', 'tomorrow', 'tour', 'toy', 'track', 'tracks', 'trade', 'traffic', 'travel', 'treasure', 'trip', 'trust', 'trend', 'taxi', 'take', 'talent',
  'uber', 'ueber', 'united', 'user', 'unser', 'Unternehmer', 'urlaub', 'used', 'university', 'xpress', 'you', 'yoga', 'yellow', 'zutat', 'zimmer', 'zigarette', 'zins', 'zoo', 'zuhaus',
  'vision', 'virtuality', 'vital', 'verein', 'vergleich', 'verkehr', 'Versorgung', 'video', 'views',  'vino', 'virtual', 'visit', 'visum', 'voll', 'vorsorge',
  'wrong', 'writers', 'wedding', 'werk', 'werkstatt', 'wonder', 'wunder', 'wander', ' was ', 'watch', 'welcome', 'wellness', 'welt', 'world', 'wetter', 'wein', 'wing', 'wise', 'wolke',
  'Commercial', 'concern', 'company', 'industry', 'profitability', 'corporate', 'entrepreneurs', 'marketplace', 'client', 'merchants', 'professional',
  'Engineering', 'science', 'innovation', 'computing', 'development', 'skills', 'skilled', 'data-processing', 'hi-tech', 'high-tech', 'robotics', 'system', 'solution',
  'Nutrient', 'gourmet', 'groceries', 'cooking', 'hunger', 'chow', 'lunch', 'refreshment', 'dish', 'drinking', 'dinner', 'diet',
  'Fruit', 'vegetable', 'watermelon', 'banana', 'apple', 'coconut', 'orange', 'grape', 'melon', 'peach', 'tomato', 'lettuce', 'onion', 'pumpkin', 'carrot', 'potato', 'cherry',
  'healthcare', 'vitality', 'Career', 'lifetime', 'journey', 'assignment', 'progress', 'course', 'Television', 'journalist', 'multimedia', 'communications', 'audiovisual',
];
$not_useful_keywords = [
  'Beratung', 'consultation', 'consulting', 'Dienstleistung', 'Dienstleister', 'service provider', 'Friseur', 'Möbel', 'Volksbank', 'Transporte', 'Kanzlei', 'Agentur',
  'Bauunternehmer', 'Bauunternehmen', 'Gesundheitszentrum', 'Catering', 'Versorgungszentrum', 'Haustechnik', 'Landschaftspflege', 'Malermeister',
  'Hotel', 'Versicherungsbüro', 'Finanzen', 'holding', 'service', 'Industriestore', 'Verladetechnik', 'Seniorenhaus', 'Garten- und Landschaftsbau',
  'Immobilien', 'Presse', 'Redaktion', 'Grundbesitz', 'insurance', 'Gartengestaltung', 'ventures', 'trade ', 'construction', 'Tagespflege', 'Real Estate', 'Windpark',
  'Autohandel', 'Automobile', 'Pflegeteam', 'Blumenhaus', 'Tankstelle', 'Berufsausübungsgemeinschaft', 'Bauplanung', 'Solarbau', 'Schallschutz', 'Baumpflege', 'Glashandel',
  'e.K.', 'e. K.', 'e.Kfr', 'e.Kfm.', 'e.V.', 'e. V.', 'e. Kfr.', 'Zweigniederlassung', 'Restaurant', 'Ingenieure', 'Sicherheitsdienst',
  'Bohrtechnik', 'Fliesenhandwerk', 'Bauträger', 'Car Center',  'Pflegedienst', 'Blitzschutztechnik', 'gemeinnützig', 'Dachdecker', 'Gerüstbau', 'Konditorei', ' Makler', 'Bausanierung',
  'Rohbau', 'carwash ', 'Sportstudio', 'physiotherapie', 'Trockenbau', 'Spielhalle', 'Qualitätsmanagement', 'Leichtbau', 'Massivbau', 'Augenoptik', 'Seniorenheim',
  'Sicherheitstechnik', 'Akademie ', 'Ingenieurbüro', 'Lüftungstechnik', 'Institut ', 'Straßenbau', 'Gebäudemanagement', 'Fürsorge ', 'Steuerberater', 'Zentrum ',
  'Cosmetics', 'Kommunikationstechnik', 'Investment', ' leasing', 'Logistik', 'logistics', 'Verwaltung', 'Solution', 'Radio ', 'Maschinenbau', 'Schlachterei', ' Personal ',
  'Seniorenresidenz', 'Angiologie', 'Tierpark', 'Sanitätshaus', 'Tagebau', 'Betreuung', ' Suiten ', 'Systembau', 'Villa ', 'Stukkateur', 'Sanitär ',
  'Verkehrsplanung', 'Getränke', 'Bauprojekt', 'Eventmanagement', 'Capital', 'Architekt', 'Frischemarkt', 'Solarpark', 'Montage', 'Spedition', 'taxi ',
  'Elektrotechnik', ' Bau ', 'Agrarhandel', 'Sachverständig', 'Energie', 'Energy', 'Projekt', 'Events', 'Baudekoration', 'Hausbau ', 'Klinik', 'Betreuungsdienst', 'Osteopathie',
  'Augenzentrum', 'Invest', 'Landbau', 'Vertrieb', 'Kommunikation', 'Atelier', ' Agar ', 'Fahrschule', 'Hilfen', 'Vermögen', 'Bauelemente', 'Haus ',
  'Gebäudetechnik', 'Baumanagement', 'Bauausrüstungen', 'Bestattung', 'Werksvertretungen', 'Bäckerei', 'Forsthaus', 'Beteiligungs', '-Bau', 'Werbetechnik', 'Allgemeinmedizin', 'Bootswerft',
  'Landtechnik', ' Pflege ', 'Zimmerei', 'Planungsbüro', ' Forst ', 'Autohaus', 'Schauspielhaus', 'Betreutes', 'Kapitalanlagevermittlung', 'Anlagenbau', 'Stahlbau',
  'Dönerproduktion', 'Döner_Produktion', 'Grundstück', ' Agrar ', 'Autozentrum', ' Fitness ', ' accounting ',  'Wohnbau', ' Cafe ',
  'Kraftbau', 'Residenz', 'Elektroinstallation', 'Fernmeldetechnik', 'Bauausführung', ' Ausbau ', 'Wohneigentum', 'Café ', 'Holzhandel', 'Sanierung', 'Warenhandel', ' Import ',
  'Industrietransport', 'Zahnarzt', 'Gastronomiebetrieb', 'Implantologie', 'Chirurgie', 'Ferienpark', 'Chauffeur', 'Chirurg', 'Personalleasing', 'Fischmanufaktur', 'Depotstrategien',
  'Kfz', 'Wassertechnik', 'Dichttechnik', 'REWE ', ' Fracht', 'Pflegezeit', ' Logistic ', 'Makler ', 'Tiefbau', 'Pflegezentrum', 'Johanniter ', 'Luftrettung', 'Nutzfahrzeug',
  'Vermietung', 'Stuckateur', 'Baugesellschaft', 'Restaurator', 'Solartechnik', ' Dental ', 'Döner ', 'Verw.', 'Planungs', 'Solarkraftwerk', 'Facility Management',
  'Handballclub', 'Fußballclub', ' Travel ', 'Bauunternehmung', 'Klempner', 'Erdarbeiten', 'Einrichtungen', 'Vermittlung', ' transport ', ' Gastro ',
];

// checks if a keyword in the $useful_keywords and $not_useful_keywords array is given in the $node_values array and prints it out
function checkCompanyBigSearch() {
  global $node_values_new;
  global $not_useful_keywords;
  global $conn;

  foreach ($node_values_new as $key => $value) {
    foreach ($not_useful_keywords as $keyword) {
      if (stripos($value, $keyword) !== false) {
        unset($node_values_new[$key]);
      }
    }
  }
  // möglichkeit zum testen nur für ausfilterung mit $not_useful_keywords
  print_r(count($node_values_new));
  // $counter = count($node_values_new);
  print_r(' Ergebnise nur durch check des not_useful_keywords arrays: ');
  echo '<br><br>';
  print_r(implode("<br>\n",$node_values_new));
  // $fp = fopen('/Library/WebServer/Documents/handelsregister/HR-C/one_array/daten.csv', 'w');
  // fwrite($fp, "durch die Ausfilterung des ersten Arrays bleiben $counter mögliche Unternehmen übrig \n\n ");
  // fputcsv($fp, $node_values_new, "\n");
  // fclose($fp);
  foreach ($node_values_new as $key => $value) {
    $statement = $conn->prepare("INSERT IGNORE INTO bigsearch (company) VALUES('$value')");
    $statement->execute();
  }
}
echo checkCompanyBigSearch();
echo '<br><br><br><br><br><br><br><br>';

// checks if a keyword in the $useful_keywords and $not_useful_keywords array is given in the $node_values array and prints it out
function checkCompanySmallSearch() {
  global $node_values_new;
  global $not_useful_keywords;
  global $useful_keywords;
  global $conn;

  foreach ($node_values_new as $key => $value) {
    foreach ($not_useful_keywords as $keyword) {
      if (stripos($value, $keyword) !== false) {
        unset($node_values_new[$key]);
      }
    }
  }
  foreach ($node_values_new as $key => $value) {
    foreach ($useful_keywords as $keyword) {
      if (stripos($value, $keyword) !== false) {
        $results[] = $node_values_new[$key];
      }
    }
  }
  $new_array_results = array_unique($results);
  print_r(count($new_array_results));
  // $counter = count($new_array_results);
  print_r(' Ergebnise durch check beider arrays: ');
  echo '<br><br>';
  print_r(implode("<br>\n",$new_array_results));
  // $fp = fopen('/Library/WebServer/Documents/handelsregister/HR-C/two_arrays/daten.csv', 'w');
  // fwrite($fp, "durch die Ausfilterung und Filterung beider Arrays bleiben $counter mögliche Unternehmen übrig \n\n ");
  // fputcsv($fp, $new_array_results, "\n");
  // fclose($fp);
  foreach ($new_array_results as $key => $value) {
    $statement = $conn->prepare("INSERT IGNORE INTO smallsearch (company) VALUES('$value')");
    $statement->execute();
  }
}
echo checkCompanySmallSearch();
echo '<br><br><br><br><br><br><br><br>';

// giving the header information
$headers = $response->getHeaders();
foreach($headers as $name => $value) {
  $value = implode(', ', $value);
  echo "{$name}: {$value}\r\n";
}
