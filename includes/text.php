<?php
/**
 * Copyright 2017 GoneTone
 *
 * Line Bot
 * 範例 Example Bot (Text)
 *
 * 此範例 GitHub 專案：https://github.com/GoneTone/line-example-bot-php
 * 官方文檔：https://developers.line.biz/en/reference/messaging-api#text-message
 */
/**
陣列輸出 Json
==============================
{
    "type": "text",
    "text": "Hello, world!"
}
==============================
*/
if (strtolower($message['text']) == "text" || $message['text'] == "文字"){
    $str = file_get_contents('template.json');
                $json_data = json_decode($str);
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => $json_data
    ));
}else{
    require './../handshake.php'; 
    $query = mysqli_query($connection,"SELECT * FROM questionAndAnswer  WHERE questions LIKE '%$userMessage%' LIMIT 5");

    

    if(mysqli_num_rows($query)>0){
        while($result = mysqli_fetch_assoc($query)){
            $message .=  $result['questions']." ".PHP_EOL.$result['answers'].PHP_EOL." ".PHP_EOL;
        }
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
        return $result->getHTTPStatus() . ' ' . $result->getRawBody();
    }else{
        $message = "私のデータベースにはそのような  「".$userMessage."」 はありません";
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
        $result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
        return $result->getHTTPStatus() . ' ' . $result->getRawBody();
    }
}

 
  