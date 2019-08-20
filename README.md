# Serverless chat bot, written PHP

This demo consists of a single lambda function that executes when a webhook is received from [Pusher Chatkit](https://pusher.com/chatkit), and sends a message to that room.
It is able to tell a joke, roll the dice, and flip a coin.

## Requirements

Pusher Chatkit account and instance: pusher.com/chatkit
A working Chatkit app. One can be found [here](https://github.com/zmarkan/chatkit-sample-client).
Zeit now account - zeit.co

## Usage

- Fill in Chatkit credentials in `on_message.php`. Find them in dash.pusher.com/chatkit once you've created your account and instance.
- Deplpy to Zeit using `now` command, once you've configured it in the CLI.
- In your Chatkit dashboard, set up a new webhook with the URL given to you by `now` command. The webhook should handle the `Message Created` event.
- Magic ️✨
