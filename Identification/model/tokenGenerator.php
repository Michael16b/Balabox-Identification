<?php
use Firebase\JWT\JWT;
//use Firebase\JWT\Key;


function generateToken($id, $username, $password){
    $theKey = 'moodle';

    // create header
    $header = [
        "alg" => "HS256",
        "typ" => "JWT"
    ];

    // create payload
    $playload = [
        "id" => $id,
        "username" => $username,
        "password" => $password,
        "iat" => time(),
        "exp" => time() + (60*60)
    ];
    $token = JWT::encode($playload, $theKey);
    return $token;
}

$token = generateToken(1, 'admin', 'admin');
echo $token;
?>