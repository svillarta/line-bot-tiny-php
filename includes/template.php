<?php
include ('./handshake.php');
include ('Controller.php');
$reply =  new Controller();

$categories = array(
    '新規お申し込み', // category 1
    'ワールドアイキッズの使い方', // category 2
    '料金とプラン', // category 3
    'test', // category 4
    '予約・キャンセル', // category 5
    'レッスン', // category 6
    'スカイプについて', // category 7
    '先生について', // category 8
    'トラブルで困ったとき' // category 9
); 

$question = array(
    // category 1
    '無料体験レッスンを受けたいのですが、どうすればいいでしょうか？', 
    '無料体験レッスンは何回できますか？',
    'プランの会費以外に追加で必要な費用はありますか。',
    '無料会員から有料会員になるための手続き方法を教えてください。',
    '登録がうまく完了しません。どうしたらいいでしょうか？',
    '無料会員登録をするときに費用はかかりますか？',
    '支払い後、いつから受講可能ですか？',
    'クレジットカードは何が使えますか？',
    'PayPalを利用したクレジットカード払いにて支払いをしたのですが、正常に決済が完了しませんでした。どうしたらよいですか？',
    '同じメールアドレスで複数のアカウントを登録できますか？',
    '登録中のプランのポイント有効期限を忘れてしまった場合、どこで確認できますか？',
    '英語がまったくわからないのだが、大丈夫でしょうか？',
    'レッスンの際、先生はウェブカメラは使用しますか？',
    '家族や友人などにワールドアイキッズを紹介した場合の特典はありますか？',
    ''

); 



if ($message['text'] == "testing" ){
    // json_encode($message);
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'text', // 訊息類型 (文字)
                'text' => $event['source']['userId'] // 回復訊息
            )
        )
    ));
}


// category type
$userMessageEng = preg_replace('/\s+/', '', $event['message']['text']);
if ((strtolower($userMessageEng) == "startconversation") || ($message['text'] == "会話を始める") || ($message['text'] == "カテゴリを選んでください" )) {
    $temp = $event['replyToken'];
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array (
                'type' => 'text',
                'text' => 'カテゴリーを選択してください',
                'quickReply' => array (
                    'items' => 
                    array (
                        0 => 
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '新規お申し込み',
                                'text' => '新規お申し込み',
                            ),
                        ),
                        1 => 
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => 'ワールドアイキッズの使い方',
                                'text' => 'ワールドアイキッズの使い方',
                            ),
                        ),
                        2 => 
                        array (
                            'type' => 'action',
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '料金とプラン',
                                'text' => '料金とプラン',
                            ),
                        ),
                        3 => 
                        array (
                            'type' => 'action',
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '各種お手続き',
                                'text' => 'test',
                            ),
                        ),
                        4 => 
                        array (
                            'type' => 'action',
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '予約・キャンセル',
                                'text' => '予約・キャンセル',
                            ),
                        ),
                        5 => 
                        array (
                            'type' => 'action',
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => 'レッスン',
                                'text' => 'レッスン',
                            ),
                        ),
                        6 => 
                        array (
                            'type' => 'action',
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => 'スカイプについて',
                                'text' => 'スカイプについて',
                            ),
                        ),
                        7 => 
                        array (
                            'type' => 'action',
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '先生について',
                                'text' => '先生について',
                            ),
                        ),
                        8 => 
                        array (
                            'type' => 'action',
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => 'トラブルで困ったとき',
                                'text' => 'トラブルで困ったとき',
                            ),
                        ),
                    ),
                ),
            )
        )
    ));
}


//quit conversation 
if($message['text'] == '会話をやめる'){
    $replyMessage = $reply->quitConversation();
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => $replyMessage
    ));
}


// end of the last move of the user
if($message['text'] == "もっと質問"){
    $lastMoveQuery = mysqli_query($connection,'SELECT * FROM userLastMove WHERE id = 1');
    if (mysqli_num_rows($lastMoveQuery)>0){
        while($result = mysqli_fetch_assoc($lastMoveQuery)){
            $userLastMove = $result['lastMove'];
        }
        $replyMessage = $reply->postMessage($userLastMove);
        $client->replyMessage(array(
            'replyToken' => $event['replyToken'],
            'messages' => $replyMessage
        ));
    }
}

// get the question of that category they choice

$userCurrentMove = $message['text'];
if(in_array($userCurrentMove,$categories)){
    mysqli_query($connection,"UPDATE userLastMove SET lastMove = '$userCurrentMove' WHERE id = 1");
    $replyMessage = $reply->postMessage($userCurrentMove);
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => $replyMessage
    ));
}


if(in_array($userCurrentMove,$question)){
    $replyMessage = $reply->getReply($userCurrentMove);
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => $replyMessage
    ));
}

if ($message['text'] != "") {
    $replyMessage = $reply->replyButtons();
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => $replyMessage
    ));
}