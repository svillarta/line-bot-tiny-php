
<?php

require_once('./LINEBotTiny.php');

$channelAccessToken = 'cmPZXyZAL2U5nWkMFykxGTYqJYvCFz/2X2f4qkwo7T9ah1gFpDzRCN1/g8GGpcAvjir9uZ6O09yNsy6CYAqEQyngKeI12fE9rNccyuiUS+XC0u+Ho7uXae0+RCpJF8S9Tij7P5PyVZYIU3Y23BmBvgdB04t89/1O/w1cDnyilFU=';
$channelSecret = '76d983c8ff02a26b14d3f39e1bb1d999';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    require_once('includes/bot.php'); // Type: Sticker
                    break;
                default:
                    error_log('Unsupported message type: ' . $message['type']);
                    break;
            }
            break;
        default:
            error_log('Unsupported event type: ' . $event['type']);
            break;
    }
};
?>
