<?php

function request($method , $parameters) {
    if (!$init = curl_init()) {
        return ["result" => NULL , "error" => ["code" => NULL, "message" => "Initalize a cURL session"]]; //bir curl oturumu başlat diyoruz
    }
    $option = [
        CURLOPT_PROTOCOLS => CURLPROTO_HTTP,
        CURLOPT_URL => "127.0.0.1",
        CURLOPT_PORT => "18332",
        CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
        CURLOPT_USERPWD => "__cookie__:3417819821c663a726679cef029d070a6ce7c59d8dd70a1a1d87c9a3f977bb41", //her girişte değişen username and password
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => ["Content_Type: application/json"],
        CURLOPT_POST => TRUE,
        CURLOPT_POSTFIELDS => json_encode(["method" => $method, "params" => $parameters])
    ];
    if (!curl_setopt_array($init , $option)) { //Belirtilen cURL oturumuna çok sayıda seçenek atar
        return ["result" => NULL, "error" => ["code" => NULL, "message" => "Set multiple options for a cURL transfer"]]; //Bir cURL aktarımı için birden çok seçenek belirle
    }
    if (!$exec = curl_exec($init)) {
        echo curl_error($init);
        return ["result" => NULL, "error" => ["code" => NULL, "message" => "Perform a cURL session"]];//Bir cURL oturumu gerçekleştir
    }
    curl_close($init);
    return json_decode($exec, TRUE);
}
    $txid = $_POST["txid"];
    $gettransaction = request("gettransaction",[$txid]);
    echo json_encode($gettransaction);
    //cüzdan bakiyesi sorma

// $address = $_POST["address"];
// $amount = $_POST["amount"];
// $sendbtc = request("sendtoaddress",["$address","$amount"]);
// $response = json_encode(["result" => $sendbtc, "error" => ["code" => NUll, "message" => NULL]]);
// echo $response;

// $address = $_POST["send"];
// $amount = $_POST["amount"];
// $send=request("sendtoaddress",["$send", "$amount"]);
// echo "send çıktısı =" .  json_encode($send);
//btc gönderme
