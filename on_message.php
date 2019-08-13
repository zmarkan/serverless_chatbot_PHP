<?php

# Get JSON as a string
$json_str = file_get_contents('php://input');
$json_obj = json_decode($json_str);

error_log($json_obj->name);

header("Content-Type: application/json");
echo json_encode($json_obj);