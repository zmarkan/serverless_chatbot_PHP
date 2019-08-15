<?php
require_once('jokes.php');
require_once('dice.php');
require_once('coin_flip.php');
require_once('vendor/autoload.php');

$chatkit = new Chatkit\Chatkit([
    'instance_locator' => 'YOUR_INSTANCE_LOCATOR',
    'key' => 'YOUR_SECRET_KEY'
]);

//Make sure it's a POST request and we have some input
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("HTTP/1.0 404 Not Found");
    echo("Not found");
    exit();
}

$json_str = file_get_contents('php://input');
if(!isset($json_str) || strlen($json_str) <= 0) {
    header("HTTP/1.0 400 Bad Request");
    echo("Bad Request");
    exit();
}

$json_obj = json_decode($json_str);
header("Status: 200");

$message = $json_obj->payload->messages[0];
$messageIsText = $message->parts[0]->type === "text/plain";

if($messageIsText){
    $content = $message->parts[0]->content;
    error_log($message->user_id);
    error_log($content);


    if(preg_match('/^@bot tell me a joke/', $content)){
        $chatkit->sendSimpleMessage([
            'sender_id' => "greeter_bot",
            'room_id' => $message->room_id,
            'text' => randomJoke()
        ]);
    }
    elseif(preg_match('/^@bot roll the dice/', $content)){
        $chatkit->sendSimpleMessage([
            'sender_id' => "greeter_bot",
            'room_id' => $message->room_id,
            'text' => "I threw the dice and the value was: " . throwDice()
        ]);
    }
    elseif(preg_match('/^@bot flip a coin/', $content)){
        $chatkit->sendSimpleMessage([
            'sender_id' => "greeter_bot",
            'room_id' => $message->room_id,
            'text' => coinFlip()
        ]);
    }
    elseif(preg_match('/^@bot/', $content)){
        $chatkit->sendSimpleMessage([
            'sender_id' => "greeter_bot",
            'room_id' => $message->room_id,
            'text' => "Sorry, I don't know how to help you with this yet!"
        ]);
    }
}

