<?php

require_once('vendor/autoload.php');

$chatkit = new Chatkit\Chatkit([
  'instance_locator' => 'v1:us1:7954c374-f491-4c08-b71e-5abfc0a3dc89',
  'key' => '495ccceb-017a-4f15-b69e-75c9a5799537:ykmJl4uSuKbKAzXKZJ5OoBdeYvMYVlJPLqt1GRWSJao='
]);


# Get JSON as a string
$json_str = file_get_contents('php://input');
$json_obj = json_decode($json_str);

$chatkit->sendSimpleMessage([
    'sender_id' => $json_obj->user_id,
    'room_id' => $json_obj->room_id,
    'text' => $json_obj->message
  ]);

header("Content-Type: application/json");
echo("");


