<?php
namespace XTC\Core;

session_start();

// Set up jwt tokens
use \Firebase\JWT\JWT;

class JWT_Token {

  public function __construct($privateKey, $publicKey) {

    if (!isset($_SESSION['jwt_token'])) { $this->generate_token($publicKey, $privateKey); }
    else { $this->validate_token($publicKey,$privateKey); }

  }
  private function validate_token($publicKey, $privateKey) {
    try {
        $jwt = JWT::decode($_SESSION['jwt_token'], $publicKey, ['RS256']);
    } catch (\Exception $e) {
      /*
      * the token was not able to be decoded.
      * this is likely because the signature was not able to be verified (tampered token)
      */
      $message = $e->getMessage();
      if ($message == 'Expired token') { $this->generate_token($publicKey, $privateKey); }
      //die($e->getMessage());
      return false;
    }
  }
  private function generate_token($publicKey, $privateKey) {
    $iat = time();
    $exp = $iat + 3600;

    $token = array(
        "iss" => "xTupleCommerceID",
        "prn" => "admin",
        "scope" => "https://willapi.xtuplecloud.com/erp_demo/auth",
        "aud" => "https://willapi.xtuplecloud.com/erp_demo/oauth/token",
        "iat" => $iat,
        "exp" => $exp
    );

    $jwt = JWT::encode($token, $privateKey, 'RS256');
    $_SESSION['jwt_token'] = $jwt;

    //set POST variables
    $url = 'https://willapi.xtuplecloud.com/erp_demo/oauth/token';
    $fields = array(
        'grant_type' => 'assertion',
        'assertion' => $jwt
    );
    $fields_string = '';

    //url-ify the data for the POST
    foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    rtrim($fields_string, '&');

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, count($fields));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    //execute post
    $result = curl_exec($ch);

    //close connection
    curl_close($ch);

    $decode = json_decode($result, true);

    $_SESSION['jwt_access_token'] = $decode["access_token"];
  }

  public function query($url) {
      $ch = curl_init();

      // Set query data here with the URL
      curl_setopt($ch, CURLOPT_URL, $url); 
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_TIMEOUT, 3);

      $result = curl_exec($ch);
      return json_decode($result, true);

      curl_close($ch);
  }

  public function json($url) {
      $ch = curl_init();

      // Set query data here with the URL
      curl_setopt($ch, CURLOPT_URL, $url); 
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_TIMEOUT, 3);

      $result = curl_exec($ch);
      return $result;

      curl_close($ch);
  }
  public function catalog($id) {
      global $api_call;
      $token = $_SESSION['jwt_access_token'];
      $catalog_url = $api_call . '/api/v1alpha1/resources/xd-catalog?query[id][EQUALS]=' . $id . '&access_token=' . $token;
      return $this->query($catalog_url);
  }
  public function get_token(){
    if (isset($_SESSION['jwt_access_token'])) { 
      return $_SESSION['jwt_access_token'];
    }
  }
}