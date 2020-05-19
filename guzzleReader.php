<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Title of the document</title>
</head>
</head>
<body>
  <form>
    Enter feed here: <input name="feed_url"/>
    <input type="submit" value="Read"/>
  </form>

  <?php
    if (isset($_REQUEST['feed_url'])) {
      require 'vendor/autoload.php';

      $myClient = new \GuzzleHttp\Client([
        'headers' => ['User_Agent' => 'MyReader']
      ]);

      $feed_response = $myClient->request('GET', $_REQUEST['feed_url']);
      if ($feed_response->getStatusCode() == 200) {
        if($feed_response->hasHeader('content-length')) {
          $content_length = $feed_response->getHeader('content-length')[0];
          echo "<p> Downloaded $content_length bytes of data </p>";
        }
        $body = $feed_response->getBody();
        $xml = new SimpleXMLElement($body);

        foreach ($xml->channel->item as $item) {
          echo "<h3>" . $item->title . "</h3>";
        }
      }
    }
   ?>

</body>

</html>
