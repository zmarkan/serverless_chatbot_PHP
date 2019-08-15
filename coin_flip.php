<?php

function coinFlip(){
    if(rand(0, 1)){
        return "Heads";
    }
    else return "Tails";
}