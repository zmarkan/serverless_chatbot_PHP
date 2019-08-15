<?php

function randomJoke(): String
{
    $jokes = array(
        "What’s the best thing about Switzerland? I don't know, but the flag is a big plus.",
        "I invented a new word! Plagiarism!",
        "Did you hear about the mathematician who's afraid of negative numbers? He'll stop at nothing to avoid them.",
        "Why do we tell actors to 'break a leg'? Because every play has a cast.",
        "Helvetica and Times New Roman walk into a bar. 'Get out of here!' shouts the bartender. 'We don't serve your type.'",
        "Yesterday I saw a guy spill all his Scrabble letters on the road. I asked him - 'What's the word on the street?'"
    );

    return $jokes[rand(0, count($jokes) - 1)];
}
