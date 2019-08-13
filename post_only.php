<?php

class Result {
    public $success = "foo";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Content-Type: application/json");

    $result = new Result();
    $result->success = "baz";
    echo(json_encode($result));

}

else {
    header("HTTP/1.1 404 NOT FOUND");
    echo("Wrong method, didn't find ya!");
}