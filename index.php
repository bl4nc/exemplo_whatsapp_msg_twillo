<?php

require __DIR__ . "/vendor/autoload.php";

use Twilio\Rest\Client;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$twilioSid    = $_ENV['TWILIO_SID'];
$twilioToken  = $_ENV['TWILIO_TOKEN'];
$accountSid  = $_ENV['ACCOUNT_SID'];
$NumDestino = $_ENV['NUM_DESTINO'];
$NumTwillo = $_ENV['NUM_TWILIO'];
$twilio = new Client($twilioSid, $twilioToken,$accountSid);
$mensagem = "Essa é a mensagem enviado";
$message = $twilio->messages
    ->create(
        "whatsapp:$NumDestino", 
        array(
            "from" => "whatsapp:$NumTwillo",
            "body" =>$mensagem
        )
    );
