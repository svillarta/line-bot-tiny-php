<?php
require 'handshake.php';// databse connection
include 'Botcontroller.php';
$Botcontroller = new Botcontroller();

$category = array(
    'カテゴリーで検索',
    // 'フリーワードで検索',
    'メニューに戻る'
);
$categoryQuestion = array(
    // '新規お申し込み',
    // 'ワールドアイキッズの使い方',
    // '料金とプラン',
    // '各種お手続き',
    // '予約・キャンセル ',
    // 'レッスン',
    // 'スカイプについて',
    // '先生について ',
    // 'トラブルで困ったとき'
    '無料体験レッスン',
    '使い方',
    'トラブル',
    'お支払い'
);
$answer = array(
    //category question 1
    '無料体験レッスンを受けたいのですが、どうすればいいでしょうか？',
    '無料体験レッスンは何回できますか？',
    'プランの会費以外に追加で必要な費用はありますか。',
    '無料会員から有料会員になるための手続き方法を教えてください。',
    '登録がうまく完了しません。どうしたらいいでしょうか？',
    '無料会員登録をするときに費用はかかりますか？',
    'クレジットカードは何が使えますか？',
    'PayPalを利用したクレジットカード払いにて支払いをしたのですが、正常に決済が完了しませんでした。どうしたらよいですか？',
    '同じメールアドレスで複数のアカウントを登録できますか？',
    '登録中のプランのポイント有効期限を忘れてしまった場合、どこで確認できますか？',
    '英語がまったくわからないのだが、大丈夫でしょうか？',
    'レッスンの際、先生はウェブカメラは使用しますか？',
    '家族や友人などにワールドアイキッズを紹介した場合の特典はありますか？',
    //category question 2
    'パスワードの変更はどう行えばよいですか？',
    '「先生へのリクエスト」はどのように登録するの？',
    '代講設定はどう行えばよいですか？',
    '先生のお気に入り登録方法は？',
    'プラン、レッスンって何？',
    '「レッスンメモ」はどうやって使うの？',
    '先生の評価はどのように行えばよいですか？',
    //category question 3
    '毎日何回までレッスンを受けることができますか？',
    '毎日何時までレッスンを受けることができますか？',
    'どのような支払い方法がありますか？',
    //category question 4
    '契約を継続したいと思います。手続きについて教えてください。',
    'レッスンを追加して行いたいのですが、どうすればいいですか？',
    'プラン変更を希望しますが、手続き方法を教えてください。',
    'もう１つプランを受講したいです。新しいアカウントを作るにはどうすれば良いの？',
    '支払いに使用したクレジットカードの変更（PayPalのアカウント情報の変更）をしたいのですがどのように手続きすればよいでしょうか？',
    'PayPalコードはどうやって取得するの？',
    '登録したメールアドレスを変更することはできますか？',
    '登録したパスワードを変更することはできますか？',
    '登録したスカイプ名を変更することはできますか？',
    '「ポイント共有オプション」に登録する場合、各自異なるスカイプ名をワールドアイキッズアカウントに登録する必要がありますか？',
    '退会をしたいのですが、方法を教えてください。',
    '退会手続き後のサービスの利用について教えてください。',
    'ワールドアイキッズへ登録している情報全てを削除して欲しいのですが。',
    '退会し、再度入会した場合、退会前の情報は引き継げますか。',
    'キャンペーン等のダイレクトメールは送らないようにしてもらえますか？'
);

$more = array(
    'カテゴリー1の質問10 -14'
);

$followUpQuestion = array(
    '最初の質問に戻る',
    '同様の質問を続ける',
    'メニューに戻る'
);

$questionQuery = mysqli_query($connection,"SELECT * FROM worldikidsFAQ");
$questionArray = array();
while($questionRow = mysqli_fetch_assoc($questionQuery)){
    array_push($questionArray,$questionRow['questions']);
}

$userLastMove = '';
$messages = $message['text'];
$userId = $event['source']['userId'];


if(in_array($messages,$questionArray)){
    $reply = $Botcontroller->getDetails($messages);
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array (
                'type' => 'flex',
                'altText' => $messages,
                'contents' =>
                array (
                    'type' => 'carousel',
                    'contents' => $reply
                ),
                'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => 'カテゴリーで検索',
                                    'text' => 'カテゴリーで検索',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => 'フリーワードで検索', // search by key words
                                    'text' => 'フリーワードで検索',
                                ),
                            ),

                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '閉じる', // close
                                    'text' => '閉じる',
                                ),
                            ),
                        ),
                    ),
            )
        )
    ));
    // $client->replyMessage(array(
    //     'replyToken' => $event['replyToken'],
    //     'messages' => array(
    //         array(
    //             'type' => 'text',
    //             'text' => $reply
    //         )
    //     )
    // ));
}

// search by keyword
if($messages == 'フリーワードで検索'){
    $currentMove = 'search by keywords';
    mysqli_query($connection,"UPDATE userLastMove SET lastMove ='$currentMove' WHERE lineUserId = '$userId'");
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'text',
                'text' =>  'キーワードを入力してください'
            )
        )
    ));
}


if($messages == "質問を開始する" || $messages == 'メニューに戻る'){
    $userConfirmation = mysqli_query($connection,"SELECT * FROM userLastMove WHERE lineUserId = '$userId'");
    if(mysqli_num_rows($userConfirmation)>0){

        while($row = mysqli_fetch_assoc($userConfirmation)){
            $userLastMove = $row['lastMove'];
        }
        $reply = $Botcontroller->welcomeBack();
        $client->replyMessage(array(
            'replyToken' => $event['replyToken'],
            'messages' => $reply
        ));

    }else{
        mysqli_query($connection,"INSERT INTO userLastMove(id,lastMove,lineUserId) VALUES(null,'GETSTARTED','$userId')");
        $reply = $Botcontroller->getStarted();
        $client->replyMessage(array(
            'replyToken' => $event['replyToken'],
            'messages' => $reply
        ));
    }
}

//more question
if(in_array($messages, $more)){
    $reply = $Botcontroller->more($messages);
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => $reply
    ));
}


if(in_array($messages,$category) || $messages == '閉じる'){
    mysqli_query($connection,"UPDATE userLastMove SET lastMove ='$messages' WHERE lineUserId = '$userId'");
    $userConfirmation = mysqli_query($connection,"SELECT * FROM userLastMove WHERE lineUserId = '$userId' AND lastMove = 'search by keywords'");
    if(mysqli_num_rows($userConfirmation)>0){

    }else{
        $reply = $Botcontroller->getReply($messages);
        $client->replyMessage(array(
            'replyToken' => $event['replyToken'],
            'messages' => $reply
        ));
    }

}

if(in_array($messages, $categoryQuestion)){
    $userConfirmation = mysqli_query($connection,"SELECT * FROM userLastMove WHERE lineUserId = '$userId' AND lastMove = 'search by keywords'");
    if(mysqli_num_rows($userConfirmation)>0){

    }else{
        mysqli_query($connection,"UPDATE userLastMove SET lastMove ='$messages' WHERE lineUserId = '$userId'");
        $reply = $Botcontroller->question($messages);
        $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
                array (
                    'type' => 'flex',
                    'altText' => $messages,
                    'contents' =>
                    array (
                        'type' => 'carousel',
                        'contents' => $reply
                    ),
                    'quickReply' =>
                        array (
                            'items' =>
                            array (
                                //category 1
                                array (
                                    'type' => 'action',
                                    'action' =>
                                    array (
                                        'type' => 'message',
                                        'label' => '無料体験レッスン',
                                        'text' => '無料体験レッスン',
                                    ),
                                ),
                                //category 2
                                array (
                                    'type' => 'action',
                                    'action' =>
                                    array (
                                        'type' => 'message',
                                        'label' => '使い方',
                                        'text' => '使い方',
                                    ),
                                ),
                                //category 3
                                array (
                                    'type' => 'action',
                                    'action' =>
                                    array (
                                        'type' => 'message',
                                        'label' => 'トラブル',
                                        'text' => 'トラブル',
                                    ),
                                ),
                                //category 4
                                array (
                                    'type' => 'action',
                                    'action' =>
                                    array (
                                        'type' => 'message',
                                        'label' => 'お支払い',
                                        'text' => 'お支払い',
                                    ),
                                ),
                                //category 5

                                //close
                                array (
                                    'type' => 'action',
                                    'action' =>
                                    array (
                                        'type' => 'message',
                                        'label' => 'メニューに戻る',
                                        'text' => 'メニューに戻る',
                                    ),
                                ),
                            ),
                        ),
                )
            )
        ));
    }

}




// follow up question
if(in_array($messages, $followUpQuestion)){
    if($messages == '最初の質問に戻る'){
        //got back to the main category
        $reply = $Botcontroller->getStarted();
        $client->replyMessage(array(
            'replyToken' => $event['replyToken'],
            'messages' => $reply
        ));
    }elseif($messages == '同様の質問を続ける'){
        //go back to the user last move
        $userConfirmation = mysqli_query($connection,"SELECT * FROM userLastMove WHERE lineUserId = '$userId'");
        if(mysqli_num_rows($userConfirmation)>0){
            while($row = mysqli_fetch_assoc($userConfirmation)){
                $userLastMove = $row['lastMove'];
            }
            $reply = $Botcontroller->question($userLastMove);
            $client->replyMessage(array(
                'replyToken' => $event['replyToken'],
                'messages' => $reply
            ));
        }
    }elseif($messages == 'メニューに戻る'){
        //exit
        $userConfirmation = mysqli_query($connection,"SELECT * FROM userLastMove WHERE lineUserId = '$userId' AND lastMove = 'search by keywords'");
        if(mysqli_num_rows($userConfirmation)>0){

        }else{
            $reply = $Botcontroller->getReply($messages);
            $client->replyMessage(array(
                'replyToken' => $event['replyToken'],
                'messages' => $reply
            ));
        }

    }
}

if($messages == 'バック'){
    //back
    $userConfirmation = mysqli_query($connection,"SELECT * FROM userLastMove WHERE lineUserId = '$userId'");
    if(mysqli_num_rows($userConfirmation)>0){
        while($row = mysqli_fetch_assoc($userConfirmation)){
            $userLastMove = $row['lastMove'];
        }
        $reply = $Botcontroller->question($userLastMove);
        $client->replyMessage(array(
            'replyToken' => $event['replyToken'],
            'messages' => $reply
        ));
    }
}

if($messages == 'フリーワードで検索' || $message != ''){
    $userConfirmation = mysqli_query($connection,"SELECT * FROM userLastMove WHERE lineUserId = '$userId' AND lastMove = 'search by keywords'");
    if(mysqli_num_rows($userConfirmation)>0){
        //search by keywords
        $reply = $Botcontroller->searchByKeyWords($messages);
        $client->replyMessage(array(
                'replyToken' => $event['replyToken'],
                'messages' => array(
                                array (
                                    'type' => 'flex',
                                    'altText' => $messages,
                                    'contents' =>
                                    array (
                                        'type' => 'carousel',
                                        'contents' => $reply

                                    ),
                                )
                            )
            ));
    }elseif(in_array($messages, $answer)){
        //this is for question and answer buttons
        $reply = $Botcontroller->answer($messages);
        $client->replyMessage(array(
            'replyToken' => $event['replyToken'],
            'messages' => $reply
        ));
    }

}


?>
