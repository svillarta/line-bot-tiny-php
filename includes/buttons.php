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
if (strtolower($message['text']) == "buttons template" || $message['text'] == "按鈕模板") {
    $client->replyMessage(array(
            "replyToken" => $event["replyToken"],
            "messages" => array(
                array (
    'type' => 'bubble',
    'body' => 
    array (
        'type' => 'box',
        'layout' => 'vertical',
        'contents' => array (
            array (
                'type' => 'text',
                'text' => 'Brown Cafe',
                'weight' => 'bold',
                'size' => 'xl',
                'color' => '#7AD80F',
            ),
            array (
            'type' => 'box',
            'layout' => 'vertical',
            'margin' => 'lg',
            'spacing' => 'sm',
            'contents' => array (
                array (
                    'type' => 'box',
                    'layout' => 'baseline',
                    'spacing' => 'sm',
                    'contents' => array (
                        array (
                            'type' => 'text',
                            'text' => 'Place',
                            'color' => '#aaaaaa',
                            'size' => 'sm',
                            'flex' => 1,
                        ),
                        array (
                            'type' => 'text',
                            'text' => 'Miraina Tower, 4-1-6 Shinjuku, a,msnhd,amnsd,mans,dmna,msnd,amnsd,nlqjkwlerjqw;elkj;m a.,md.a,mq;wke Tokyo',
                            'wrap' => true,
                            'color' => '#666666',
                            'size' => 'sm',
                            'flex' => 5,
                        ),
                    ),
                ),
            ),
        ),
    ),
),
'footer' => 
  array (
    'type' => 'box',
    'layout' => 'horizontal',
    'spacing' => 'sm',
    'contents' => array (
        array (
            'type' => 'button',
            'style' => 'link',
            'height' => 'sm',
            'action' => 
            array (
            'type' => 'uri',
            'label' => 'CALL',
            'uri' => 'https://linecorp.com',
            ),
            'gravity' => 'center',
        ),
        array (
            'type' => 'separator',
        ),
        array (
            'type' => 'button',
            'style' => 'link',
            'height' => 'sm',
            'action' => 
            array (
            'type' => 'postback',
            'label' => 'Web',
            'data' => 'hello',
            ),
            'gravity' => 'center',
        ),
        array (
        'type' => 'separator',
        ),
        array (
            'type' => 'button',
            'action' => 
        array (
          'type' => 'uri',
          'label' => 'action',
          'uri' => 'http://linecorp.com/',
        ),
      ),
    ),
    'flex' => 0,
  ),
)
        ));
}




// array (
//     'type' => 'bubble',
//     'body' => 
//     array (
//         'type' => 'box',
//         'layout' => 'vertical',
//         'contents' => array (
//             array (
//                 'type' => 'text',
//                 'text' => 'Brown Cafe',
//                 'weight' => 'bold',
//                 'size' => 'xl',
//                 'color' => '#7AD80F',
//             ),
//             array (
//             'type' => 'box',
//             'layout' => 'vertical',
//             'margin' => 'lg',
//             'spacing' => 'sm',
//             'contents' => array (
//                 array (
//                     'type' => 'box',
//                     'layout' => 'baseline',
//                     'spacing' => 'sm',
//                     'contents' => array (
//                         array (
//                             'type' => 'text',
//                             'text' => 'Place',
//                             'color' => '#aaaaaa',
//                             'size' => 'sm',
//                             'flex' => 1,
//                         ),
//                         array (
//                             'type' => 'text',
//                             'text' => 'Miraina Tower, 4-1-6 Shinjuku, a,msnhd,amnsd,mans,dmna,msnd,amnsd,nlqjkwlerjqw;elkj;m a.,md.a,mq;wke Tokyo',
//                             'wrap' => true,
//                             'color' => '#666666',
//                             'size' => 'sm',
//                             'flex' => 5,
//                         ),
//                     ),
//                 ),
//             ),
//         ),
//     ),
// ),
// 'footer' => 
//   array (
//     'type' => 'box',
//     'layout' => 'horizontal',
//     'spacing' => 'sm',
//     'contents' => array (
//         array (
//             'type' => 'button',
//             'style' => 'link',
//             'height' => 'sm',
//             'action' => 
//             array (
//             'type' => 'uri',
//             'label' => 'CALL',
//             'uri' => 'https://linecorp.com',
//             ),
//             'gravity' => 'center',
//         ),
//         array (
//             'type' => 'separator',
//         ),
//         array (
//             'type' => 'button',
//             'style' => 'link',
//             'height' => 'sm',
//             'action' => 
//             array (
//             'type' => 'postback',
//             'label' => 'Web',
//             'data' => 'hello',
//             ),
//             'gravity' => 'center',
//         ),
//         array (
//         'type' => 'separator',
//         ),
//         array (
//             'type' => 'button',
//             'action' => 
//         array (
//           'type' => 'uri',
//           'label' => 'action',
//           'uri' => 'http://linecorp.com/',
//         ),
//       ),
//     ),
//     'flex' => 0,
//   ),
// )






/**
確認模板陣列輸出 Json
==============================
{
    "type": "template",
    "altText": "Example confirm template",
    "template": {
        "type": "confirm",
        "text": "Are you sure?",
        "actions": [
            {
                "type": "message",
                "label": "Yes",
                "text": "Yes"
            },
            {
                "type": "message",
                "label": "No",
                "text": "No"
            }
        ]
    }
}
==============================
*/
if (strtolower($message['text']) == "confirm template" || $message['text'] == "確認模板") {
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'template', // 訊息類型 (模板)
                'altText' => 'Example confirm template', // 替代文字
                'template' => array(
                    'type' => 'confirm', // 類型 (確認)
                    'text' => 'Are you sure?', // 文字
                    'actions' => array(
                        array(
                            'type' => 'message', // 類型 (訊息)
                            'label' => 'Yes', // 標籤 1
                            'text' => 'Yes' // 用戶發送文字 1
                        ),
                        array(
                            'type' => 'message', // 類型 (訊息)
                            'label' => 'No', // 標籤 2
                            'text' => 'No' // 用戶發送文字 2
                        )
                    )
                )
            )
        )
    ));
}

