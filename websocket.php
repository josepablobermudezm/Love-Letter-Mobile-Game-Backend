<?php 

$curl = curl_init();

$post_fields = [
    "key" => "dwRO3yR7VvymQk1HfYHqJBK22coq0TnEW90aqcN4", //Demo key,  get yours at https://piesocket.com
    "secret" => "IAdCK4FsBv1YO2jPYoYF3mpGMzzADOIy", //Demo secret, get yours at https://piesocket.com
    "channelId" => 1,
    "message" => ["text" => "ASDF!"]
];
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.piesocket.com/api/publish",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($post_fields),
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json"
  ),
));


$response = curl_exec($curl);
print_r($response)



?>