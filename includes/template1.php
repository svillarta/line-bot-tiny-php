<?php
/**
 * Copyright 2017 GoneTone
 *
 * Line Bot
 * 範例 Example Bot (Template)
 *
 * 此範例 GitHub 專案：https://github.com/GoneTone/line-example-bot-php
 * 官方文檔：https://developers.line.biz/en/reference/messaging-api#template-messages
 */
/**
按鈕模板陣列輸出 Json
==============================
{
    "type": "template",
    "altText": "Example buttons template",
    "template": {
        "type": "buttons",
        "thumbnailImageUrl": "https://api.reh.tw/line/bot/example/assets/images/example.jpg",
        "title": "Example Menu",
        "text": "Please select",
        "actions": [
            {
                "type": "postback",
                "label": "Postback example",
                "data": "action=buy&itemid=123"
            },
            {
                "type": "message",
                "label": "Message example",
                "text": "Message example"
            },
            {
                "type": "uri",
                "label": "Uri example",
                "uri": "https://github.com/GoneTone/line-example-bot-php"
            }
        ]
    }
}
==============================
*/

if (strtolower($message['text']) != "hi" || $message['text'] != "hi") {
    $userMessage = $message['text'];
    
        $client->replyMessage(array(
            "replyToken" => $event["replyToken"],
            "messages" => array(
                array(
                    "type" => "flex", 
                    "altText" => "this is a flex message", 
                    "contents" => array(
                        "type" => "bubble", 
                        "body" => array(
                            "type" => "box", 
                            "layout" => "vertical", 
                            "contents" => array(
                                array(
                                    "type" => "text", 
                                    "text" => "Connected",
                                    "weight" => "bold", 
                                    "size" => "xl", 
                                    "color" => "#7AD80F" 
                                ), 
                                array(
                                    "type" => "text", 
                                    "text" => "Time", 
                                    "color" => "#aaaaaa", 
                                    "size" => "sm", 
                                    "flex" => 1  
                                )
                            ) 
                        ) 
                    ) 
                )
            )
        ));
        
    }else{
        $client->replyMessage(array(
            "replyToken" => $event["replyToken"],
            "messages" => array(
                array(
                    "type" => "flex", 
                    "altText" => "this is a flex message", 
                    "contents" => array(
                        "type" => "bubble", 
                        "body" => array(
                            "type" => "box", 
                            "layout" => "vertical", 
                            "contents" => array(
                                array(
                                    "type" => "text", 
                                    "text" => "NO DATA",
                                    "weight" => "bold", 
                                    "size" => "xl", 
                                    "color" => "#7AD80F" 
                                ), 
                                array(
                                    "type" => "text", 
                                    "text" => "Time", 
                                    "color" => "#aaaaaa", 
                                    "size" => "sm", 
                                    "flex" => 1  
                                )
                            ) 
                        ) 
                    ) 
                )
            )
        ));
    }
    


// <?php 

//  $jayParsedAry = [
//    "type" => "bubble", 
//    "hero" => [
//          "type" => "image", 
//          "url" => "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_1_cafe.png", 
//          "size" => "full", 
//          "aspectRatio" => "20:13", 
//          "aspectMode" => "cover", 
//          "action" => [
//             "type" => "uri", 
//             "uri" => "http://linecorp.com/" 
//          ] 
//       ], 
//    "body" => [
//                "type" => "box", 
//                "layout" => "vertical", 
//                "contents" => [
//                   [
//                      "type" => "text", 
//                      "text" => "Brown Cafe", 
//                      "weight" => "bold", 
//                      "size" => "xl", 
//                      "color" => "#7AD80F" 
//                   ], 
//                   [
//                         "type" => "box", 
//                         "layout" => "baseline", 
//                         "margin" => "md", 
//                         "contents" => [
//                            [
//                               "type" => "icon", 
//                               "size" => "sm", 
//                               "url" => "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png" 
//                            ], 
//                            [
//                                  "type" => "icon", 
//                                  "size" => "sm", 
//                                  "url" => "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png" 
//                               ], 
//                            [
//                                     "type" => "icon", 
//                                     "size" => "sm", 
//                                     "url" => "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png" 
//                                  ], 
//                            [
//                                        "type" => "icon", 
//                                        "size" => "sm", 
//                                        "url" => "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png" 
//                                     ], 
//                            [
//                                           "type" => "icon", 
//                                           "size" => "sm", 
//                                           "url" => "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gray_star_28.png" 
//                                        ], 
//                            [
//                                              "type" => "text", 
//                                              "text" => "4.0", 
//                                              "size" => "sm", 
//                                              "color" => "#999999", 
//                                              "margin" => "md", 
//                                              "flex" => 0 
//                                           ] 
//                         ] 
//                      ], 
//                   [
//                                                 "type" => "box", 
//                                                 "layout" => "vertical", 
//                                                 "margin" => "lg", 
//                                                 "spacing" => "sm", 
//                                                 "contents" => [
//                                                    [
//                                                       "type" => "box", 
//                                                       "layout" => "baseline", 
//                                                       "spacing" => "sm", 
//                                                       "contents" => [
//                                                          [
//                                                             "type" => "text", 
//                                                             "text" => "Place", 
//                                                             "color" => "#aaaaaa", 
//                                                             "size" => "sm", 
//                                                             "flex" => 1 
//                                                          ], 
//                                                          [
//                                                                "type" => "text", 
//                                                                "text" => "Miraina Tower, 4-1-6 Shinjuku, Tokyo", 
//                                                                "wrap" => true, 
//                                                                "color" => "#666666", 
//                                                                "size" => "sm", 
//                                                                "flex" => 5 
//                                                             ] 
//                                                       ] 
//                                                    ], 
//                                                    [
//                                                                   "type" => "box", 
//                                                                   "layout" => "baseline", 
//                                                                   "spacing" => "sm", 
//                                                                   "contents" => [
//                                                                      [
//                                                                         "type" => "text", 
//                                                                         "text" => "Time", 
//                                                                         "color" => "#aaaaaa", 
//                                                                         "size" => "sm", 
//                                                                         "flex" => 1 
//                                                                      ], 
//                                                                      [
//                                                                            "type" => "text", 
//                                                                            "text" => "10:00 - 23:00", 
//                                                                            "wrap" => true, 
//                                                                            "color" => "#666666", 
//                                                                            "size" => "sm", 
//                                                                            "flex" => 5 
//                                                                         ] 
//                                                                   ] 
//                                                                ] 
//                                                 ] 
//                                              ] 
//                ] 
//             ], 
//    "footer" => [
//                                                                               "type" => "box", 
//                                                                               "layout" => "vertical", 
//                                                                               "spacing" => "sm", 
//                                                                               "contents" => [
//                                                                                  [
//                                                                                     "type" => "button", 
//                                                                                     "style" => "link", 
//                                                                                     "height" => "sm", 
//                                                                                     "action" => [
//                                                                                        "type" => "uri", 
//                                                                                        "label" => "CALL", 
//                                                                                        "uri" => "https://linecorp.com" 
//                                                                                     ] 
//                                                                                  ], 
//                                                                                  [
//                                                                                           "type" => "button", 
//                                                                                           "style" => "link", 
//                                                                                           "height" => "sm", 
//                                                                                           "action" => [
//                                                                                              "type" => "uri", 
//                                                                                              "label" => "WEBSITE", 
//                                                                                              "uri" => "https://linecorp.com" 
//                                                                                           ] 
//                                                                                        ], 
//                                                                                  [
//                                                                                                 "type" => "spacer", 
//                                                                                                 "size" => "sm" 
//                                                                                              ] 
//                                                                               ], 
//                                                                               "flex" => 0 
//                                                                            ] 
// ]; 
 
 




