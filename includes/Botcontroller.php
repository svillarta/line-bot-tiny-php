<?php

class Botcontroller{
    public function __construct(){

    }


    //question details
    public function getDetails($post){

        require 'handshake.php';// databse connection
        $result = mysqli_query($connection,"SELECT * FROM worldikidsFAQ WHERE questions = '$post'");
        while($row = mysqli_fetch_assoc($result)){
                $questions = $row['questions'];
                $answers = $row['answers'];
            }  //end while

            $message = array(array (
            'type' => 'bubble',
            'body' =>
                array (
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' =>
                    array (
                        array (
                            'type' => 'box',
                            'layout' => 'vertical',
                            'margin' => 'xxl',
                            'spacing' => 'sm',
                            'contents' =>
                            array (
                                0 =>
                                array (
                                    'type' => 'box',
                                    'layout' => 'vertical',
                                    'contents' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'text',
                                            'text' => $answers,
                                            'size' => 'sm',
                                            'color' => '#555555',
                                            'wrap' => true,
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        array (
                            'type' => 'separator',
                            'margin' => 'xxl',
                        ),
                    ),
                ),
                'styles' =>
                array (
                    'footer' =>
                    array (
                    'separator' => true,
                    ),
                ),
            ));
            return $message;
    }



    //search by keywords function
    public function searchByKeyWords($post){
        $message = array();
        require 'handshake.php';// databse connection
        $result = mysqli_query($connection,"SELECT * FROM worldikidsFAQ WHERE CONCAT(categories,' ',subCategories,' ',questions,' ',answers) LIKE '%$post%' LIMIT 10");
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $questions = $row['questions'];
                $answers = $row['answers'];
                $content = array (
                    'type' => 'bubble',
                    'body' =>
                        array (
                            'type' => 'box',
                            'layout' => 'vertical',
                            'contents' =>
                            array (
                                0 =>
                                array (
                                    'type' => 'text',
                                    'text' => $questions,
                                    'weight' => 'bold',
                                    'size' => 'lg',
                                    'margin' => 'md',
                                    'wrap' => true,
                                    'color' => '#23AC38',
                                ),

                            ),
                        ),
                        'footer' =>
                        array (
                            'type' => 'box',
                            'layout' => 'vertical',
                            'spacing' => 'sm',
                            'contents' =>
                            array (
                                array (
                                    'type' => 'separator',
                                    'margin' => 'xxl',
                                ),
                                array (
                                    'type' => 'box',
                                    'layout' => 'vertical',
                                    'contents' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'button',
                                            'height' => 'sm',
                                            'action' =>
                                            array (
                                                'type' => 'message',
                                                'label' => '回答',
                                                'text' => $questions,
                                            ),
                                        'color' => '#FFFFFF',
                                        ),
                                    ),
                                'backgroundColor' => '#23AC38',
                                'cornerRadius' => '5px',
                                ),
                            ),
                        ),

                    );
            array_push($message,$content);
            }  //end while
            return $message;

// array (
//   'type' => 'bubble',
//   'footer' =>
//   array (
//     'type' => 'box',
//     'layout' => 'vertical',
//     'spacing' => 'sm',
//     'contents' =>
//     array (
//       0 =>
//       array (
//         'type' => 'box',
//         'layout' => 'vertical',
//         'contents' =>
//         array (
//           0 =>
//           array (
//             'type' => 'button',
//             'height' => 'sm',
//             'action' =>
//             array (
//               'type' => 'uri',
//               'label' => 'CALL',
//               'uri' => 'https://linecorp.com',
//             ),
//             'color' => '#FFFFFF',
//           ),
//         ),
//         'backgroundColor' => '#23AC38',
//         'cornerRadius' => '5px',
//       ),
//     ),
//     'flex' => 0,
//   ),
// )


        }else{
            $message = array(
                array (
                    'type' => 'bubble',
                    'body' =>
                    array (
                        'type' => 'box',
                        'layout' => 'vertical',
                        'contents' =>
                        array (
                            0 =>
                            array (
                                'type' => 'text',
                                'text' => '情報',
                                'weight' => 'bold',
                                'size' => 'lg',
                                'margin' => 'md',
                                'wrap' => true,
                                'color' => '#23AC38',
                            ),
                            1 =>
                            array (
                                'type' => 'separator',
                                'margin' => 'xxl',
                            ),
                            2 =>
                            array (
                                'type' => 'box',
                                'layout' => 'vertical',
                                'margin' => 'xxl',
                                'spacing' => 'sm',
                                'contents' =>
                                array (
                                    0 =>
                                    array (
                                        'type' => 'box',
                                        'layout' => 'vertical',
                                        'contents' =>
                                        array (
                                            0 =>
                                            array (
                                                'type' => 'text',
                                                'text' => '入力したキーワードは検索結果にありません。',
                                                'size' => 'sm',
                                                'color' => '#555555',
                                                'wrap' => true,
                                            ),
                                        ),
                                    ),
                                ),
                            ),

                        ),
                    ),
                    'styles' =>
                    array (
                        'footer' =>
                        array (
                        'separator' => true,
                        ),
                    ),
                )
            );
            return $message;
        }
    }


    public function getStarted(){
        $message = array(
                array (
                    'type' => 'text',
                    'text' => 'ご連絡ありがとうございました $'.PHP_EOL.
                        '下記の中からご質問を選んでください $',
                    'emojis' => array (
                            array (
                                'index' => 15,
                                'productId' => '5ac1bfd5040ab15980c9b435',
                                'emojiId' => '156',
                            ),
                            array (
                                'index' => 35,
                                'productId' => '5ac1bfd5040ab15980c9b435',
                                'emojiId' => '240',
                            ),
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
            );
        return $message;
    }// end getStarted




    // welcome back message
    public function welcomeBack(){
        $message = array(
                array (
                    'type' => 'text',
                    'text' => 'ご連絡ありがとうございました $'.PHP_EOL.
                        '下記の中からご質問を選んでください $',
                    'emojis' => array (
                            array (
                                'index' => 15,
                                'productId' => '5ac1bfd5040ab15980c9b435',
                                'emojiId' => '156',
                            ),
                            array (
                                'index' => 35,
                                'productId' => '5ac1bfd5040ab15980c9b435',
                                'emojiId' => '240',
                            ),
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
                                    'label' => 'フリーワードで検索',
                                    'text' => 'フリーワードで検索',
                                ),
                            ),

                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '閉じる', //close
                                    'text' => '閉じる',
                                ),
                            ),
                        ),
                    ),
                )
            );
        return $message;
    }




    public function getReply($post){
        //back to menu
        if($post == '閉じる'){
           $message = array(
                array (
                    'type' => 'text',
                    'text' => 'ご質問ありがとうございました $'.PHP_EOL.
                        '再度、ご質問をされる場合は、メニューのFAQを選択してくださいね $',
                    'emojis' =>
                    array (
                        array (
                            'index' => 15,
                            'productId' => '5ac1bfd5040ab15980c9b435',
                            'emojiId' => '240',
                        ),
                        array (
                            'index' => 50,
                            'productId' => '5ac1bfd5040ab15980c9b435',
                            'emojiId' => '243',
                        ),
                    ),
                )
            );
            return $message;
         }elseif($post == "カテゴリーで検索"){
            //Free trial lesson
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '下記のカテゴリーからご質問を選んでください $',
                    'emojis' =>
                    array (
                        array (
                            'index' => 22,
                            'productId' => '5ac1bfd5040ab15980c9b435',
                            'emojiId' => '156',
                        ),

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
            );
            return $message;
        }elseif($post == "フリーワードで検索"){
            //Free word search

        }elseif($post == "トラブル"){
            //trouble

        }elseif($post == "お支払い"){
            //payment

        }
    }


    // // free word search
    // public function freeWordSearch($post){
    //     // if($post == 'フリーワードで検索'){
    //     //     $message = array(
    //     //         array (
    //     //             'type' => 'text',
    //     //             'text' => json_decode($result),
    //     //             // 'emojis' =>
    //     //             // array (
    //     //             //     array (
    //     //             //         'index' => 16,
    //     //             //         'productId' => '5ac1bfd5040ab15980c9b435',
    //     //             //         'emojiId' => '156',
    //     //             //     ),
    //     //             // ),

    //     //         )
    //     //     );
    //     // return $message;
    //     // }
    // }



    //question
    public function question($post){
        $message = array();
        require 'handshake.php';// databse connection
        $result = mysqli_query($connection,"SELECT * FROM worldikidsFAQ WHERE categories = '$post' LIMIT 10");
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $questions = $row['questions'];
                $answers = $row['answers'];
                $content = array (
                    'type' => 'bubble',
                    'body' =>
                        array (
                            'type' => 'box',
                            'layout' => 'vertical',
                            'contents' =>
                            array (
                                0 =>
                                array (
                                    'type' => 'text',
                                    'text' => $questions,
                                    'weight' => 'bold',
                                    'size' => 'lg',
                                    'margin' => 'md',
                                    'wrap' => true,
                                    'color' => '#23AC38',
                                ),

                            ),
                        ),
                        'footer' =>
                        array (
                            'type' => 'box',
                            'layout' => 'vertical',
                            'spacing' => 'sm',
                            'contents' =>
                            array (
                                array (
                                    'type' => 'separator',
                                    'margin' => 'xxl',
                                ),
                                array (
                                    'type' => 'box',
                                    'layout' => 'vertical',
                                    'contents' =>
                                    array (
                                        0 =>
                                        array (
                                            'type' => 'button',
                                            'height' => 'sm',
                                            'action' =>
                                            array (
                                                'type' => 'message',
                                                'label' => '回答',
                                                'text' => $questions,
                                            ),
                                        'color' => '#FFFFFF',
                                        ),
                                    ),
                                'backgroundColor' => '#23AC38',
                                'cornerRadius' => '5px',
                                ),
                            ),
                        ),

                    );
            array_push($message,$content);
            }  //end while
            return $message;
        }else{
            $message = array(
                array (
                    'type' => 'bubble',
                    'body' =>
                    array (
                        'type' => 'box',
                        'layout' => 'vertical',
                        'contents' =>
                        array (
                            0 =>
                            array (
                                'type' => 'text',
                                'text' => '情報',
                                'weight' => 'bold',
                                'size' => 'lg',
                                'margin' => 'md',
                                'wrap' => true,
                                'color' => '#23AC38',
                            ),
                            1 =>
                            array (
                                'type' => 'separator',
                                'margin' => 'xxl',
                            ),
                            2 =>
                            array (
                                'type' => 'box',
                                'layout' => 'vertical',
                                'margin' => 'xxl',
                                'spacing' => 'sm',
                                'contents' =>
                                array (
                                    0 =>
                                    array (
                                        'type' => 'box',
                                        'layout' => 'vertical',
                                        'contents' =>
                                        array (
                                        0 =>
                                            array (
                                                'type' => 'text',
                                                'text' => '入力したキーワードは検索結果にありません。',
                                                'size' => 'sm',
                                                'color' => '#555555',
                                                'wrap' => true,
                                            ),
                                        ),
                                    ),
                                ),
                            ),

                        ),
                    ),
                    'styles' =>
                    array (
                        'footer' =>
                        array (
                        'separator' => true,
                        ),
                    ),
                )
            );
            return $message;
        }
        // if($post == '新規お申し込み'){
        //     //category 1
        //     $message = array(
        //         array (
        //             'type' => 'text',
        //             'text' => '新規お申し込みカテゴリの下で質問のカテゴリを選択してください '.PHP_EOL.
        //                 '1. 無料体験レッスンを受けたいのですが、どうすればいいでしょうか？'.PHP_EOL.
        //                 '2. 無料体験レッスンは何回できますか？'.PHP_EOL.
        //                 '3. プランの会費以外に追加で必要な費用はありますか。'.PHP_EOL.
        //                 '4. 無料会員から有料会員になるための手続き方法を教えてください。'.PHP_EOL.
        //                 '5. 登録がうまく完了しません。どうしたらいいでしょうか？'.PHP_EOL.
        //                 '6. 無料会員登録をするときに費用はかかりますか？'.PHP_EOL.
        //                 '7. 支払い後、いつから受講可能ですか？'.PHP_EOL.
        //                 '8. クレジットカードは何が使えますか？'.PHP_EOL.
        //                 '9. PayPalを利用したクレジットカード払いにて支払いをしたのですが、正常に決済が完了しませんでした。どうしたらよいですか？',
        //             'quickReply' =>
        //             array (
        //                 'items' =>
        //                 array (
        //                     //category 1 question 1
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '1',
        //                             'text' => '無料体験レッスンを受けたいのですが、どうすればいいでしょうか？',
        //                         ),

        //                     ),
        //                     //category 1 question 2
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '2',
        //                             'text' => '無料体験レッスンは何回できますか？',
        //                         ),

        //                     ),
        //                     //category 1 question 3
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '3',
        //                             'text' => 'プランの会費以外に追加で必要な費用はありますか。',
        //                         ),

        //                     ),
        //                     //category 1 question 4
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '4',
        //                             'text' => '無料会員から有料会員になるための手続き方法を教えてください。',
        //                         ),

        //                     ),
        //                     //category 1 question 5
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '5',
        //                             'text' => '登録がうまく完了しません。どうしたらいいでしょうか？',
        //                         ),

        //                     ),
        //                     //category 1 question 6
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '6',
        //                             'text' => '無料会員登録をするときに費用はかかりますか？',
        //                         ),

        //                     ),
        //                     //category 1 question 7
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '7',
        //                             'text' => '支払い後、いつから受講可能ですか？',
        //                         ),

        //                     ),
        //                     //category 1 question 8
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '8',
        //                             'text' => 'クレジットカードは何が使えますか？',
        //                         ),

        //                     ),
        //                     //category 1 question 9
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '9',
        //                             'text' => 'PayPalを利用したクレジットカード払いにて支払いをしたのですが、正常に決済が完了しませんでした。どうしたらよいですか？',
        //                         ),

        //                     ),
        //                     //more
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => 'more >>',
        //                             'text' => 'カテゴリー1の質問10 -14',
        //                         ),

        //                     ),
        //                 ),
        //             ),
        //         )
        //     );
        //     return $message;
        // }elseif($post == 'ワールドアイキッズの使い方'){
        //     //category 2
        //     $message = array(
        //         array (
        //             'type' => 'text',
        //             'text' => '「ワールドアイキッズの使い方」から質問カテゴリーを選択してください '.PHP_EOL.
        //                 '1. パスワードの変更はどう行えばよいですか？'.PHP_EOL.
        //                 '2. 「先生へのリクエスト」はどのように登録するの？'.PHP_EOL.
        //                 '3. 代講設定はどう行えばよいですか？'.PHP_EOL.
        //                 '4. 先生のお気に入り登録方法は？'.PHP_EOL.
        //                 '5. プラン、レッスンって何？'.PHP_EOL.
        //                 '6. 「レッスンメモ」はどうやって使うの？'.PHP_EOL.
        //                 '7. 先生の評価はどのように行えばよいですか？',
        //             'quickReply' =>
        //             array (
        //                 'items' =>
        //                 array (
        //                     //category 2 question 1
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '1',
        //                             'text' => 'パスワードの変更はどう行えばよいですか？',
        //                         ),

        //                     ),
        //                     //category 2 question 2
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '2',
        //                             'text' => '「先生へのリクエスト」はどのように登録するの？',
        //                         ),

        //                     ),
        //                     //category 2 question 3
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '3',
        //                             'text' => '代講設定はどう行えばよいですか？',
        //                         ),

        //                     ),
        //                     //category 2 question 4
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '4',
        //                             'text' => '先生のお気に入り登録方法は？',
        //                         ),

        //                     ),
        //                     //category 2 question 5
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '5',
        //                             'text' => 'プラン、レッスンって何？',
        //                         ),

        //                     ),
        //                     //category 2 question 6
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '6',
        //                             'text' => '「レッスンメモ」はどうやって使うの？',
        //                         ),

        //                     ),
        //                     //category 2 question 7
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '7',
        //                             'text' => '先生の評価はどのように行えばよいですか？',
        //                         ),

        //                     ),

        //                 ),
        //             ),
        //         )
        //     );
        //     return $message;
        // }elseif($post == '料金とプラン'){
        //     //category 3
        //     $message = array(
        //         array (
        //             'type' => 'text',
        //             'text' => '「料金とプラン」から質問カテゴリーを選択 '.PHP_EOL.
        //                 '1. 毎日何回までレッスンを受けることができますか？'.PHP_EOL.
        //                 '2. 毎日何時までレッスンを受けることができますか？'.PHP_EOL.
        //                 '3. どのような支払い方法がありますか？',
        //             'quickReply' =>
        //             array (
        //                 'items' =>
        //                 array (
        //                     //category 3 question 1
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '1',
        //                             'text' => '毎日何回までレッスンを受けることができますか？',
        //                         ),

        //                     ),
        //                     //category 3 question 2
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '2',
        //                             'text' => '毎日何時までレッスンを受けることができますか？',
        //                         ),

        //                     ),
        //                     //category 3 question 3
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '3',
        //                             'text' => 'どのような支払い方法がありますか？',
        //                         ),

        //                     ),

        //                 ),
        //             ),
        //         )
        //     );
        //     return $message;
        // }elseif($post == '各種お手続き'){
        //     //category 4
        //     $message = array(
        //         array (
        //             'type' => 'text',
        //             'text' => '「各種手続き」から質問カテゴリーを選択 '.PHP_EOL.
        //                 '1. 契約を継続したいと思います。手続きについて教えてください。'.PHP_EOL.
        //                 '2. 毎日何時までレッスンを受けることができますか？'.PHP_EOL.
        //                 '3. どのような支払い方法がありますか？',
        //             'quickReply' =>
        //             array (
        //                 'items' =>
        //                 array (
        //                     //category 3 question 1
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '1',
        //                             'text' => '毎日何回までレッスンを受けることができますか？',
        //                         ),

        //                     ),
        //                     //category 3 question 2
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '2',
        //                             'text' => '毎日何時までレッスンを受けることができますか？',
        //                         ),

        //                     ),
        //                     //category 3 question 3
        //                     array (
        //                         'type' => 'action',
        //                         'action' =>
        //                         array (
        //                             'type' => 'message',
        //                             'label' => '3',
        //                             'text' => 'どのような支払い方法がありますか？',
        //                         ),

        //                     ),

        //                 ),
        //             ),
        //         )
        //     );
        //     return $message;
        // }
    }



    //answers
    public function answer($post){
        if($post == '無料体験レッスンを受けたいのですが、どうすればいいでしょうか？'){
            // category 1 question 1 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '1.ワールドアイキッズの無料会員登録ページ（ https://worldikids.com/trial ）にいきます。'.PHP_EOL.
                        '2. メールアドレスとパスワードをご記入いただきご利用規約をご確認の上、「登録します」を選択します。'.PHP_EOL.
                        '3. ホームページ右上の「ログイン」ボタンから、登録したメールアドレスとパスワードでログインします。'.PHP_EOL.
                        '4. ログイン後、いますぐ予約するボタンを選択して、ご希望の先生と時間帯を選択してご予約ください。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '無料体験レッスンは何回できますか？'){
            // category 1 question 2 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '無料体験レッスンは、2回行っていただけます。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == 'プランの会費以外に追加で必要な費用はありますか。'){
            // category 1 question 3 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => 'プランの会費以外に必要な費用はありません。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '無料会員から有料会員になるための手続き方法を教えてください。'){
            // category 1 question 4 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => 'ログイン後のページのボタン「有料会員に登録してみる」よりお申込みいただけます。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '登録がうまく完了しません。どうしたらいいでしょうか？'){
            // category 1 question 5 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '事務局(service@worldikids.com)までご登録が完了できない旨ご連絡ください。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '無料会員登録をするときに費用はかかりますか？'){
            // category 1 question 6 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '無料会員登録には一切費用はかかりません。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '支払い後、いつから受講可能ですか？'){
            // category 1 question 7 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => 'クレジットカード払いの場合は、お支払いが完了後、１時間前後以内にポイントが自動的に追加され、サービスをご利用いただくことが可能です。'.PHP_EOL.
                            '銀行振込の場合は、お振込みいただいた後、事務局(service@worldikids.com)までメールにて下記の情報をお知らせください。'.PHP_EOL.
                            '1. 会員様のお名前'.PHP_EOL.
                            '2. プラン名'.PHP_EOL.
                            '3. お振込み額'.PHP_EOL.
                            'その後、ポイントを追加いたします。銀行振込は、お振込み確認までに1~2営業日をいただいておりますので、ご了承ください。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == 'クレジットカードは何が使えますか？'){
            // category 1 question 8 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => 'Visa, Master, JCB, Amex, UnionPAYなどがご利用になれます。その他のクレジットカードについてはお問合せください。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == 'PayPalを利用したクレジットカード払いにて支払いをしたのですが、正常に決済が完了しませんでした。どうしたらよいですか？'){
            // category 1 question 9 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => 'ご不便をお掛けしますが、会員様のPayPalにてのご登録状況に何らかの問題がある可能性がございます'.PHP_EOL.
                    'お手数をお掛けいたしまして大変申し訳ございませんが、会員様から直接PayPal（0120-723-888）にお問合せして頂き、クレジットカード内容（有効期限切れ、残高不足、クレジットカード情報変更）やご登録内容に何か問題などが無いか、ご確認して頂けたら幸いです。'.PHP_EOL.
                    'その後事務局(service@worldikids.com)までご報告いただけましたら幸いです。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '同じメールアドレスで複数のアカウントを登録できますか？'){
            // category 1 question 10 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '同一のメールアドレスで複数のアカウントを登録することはできません。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '登録中のプランのポイント有効期限を忘れてしまった場合、どこで確認できますか？'){
            // category 1 question 11 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => 'ポイントの有効期限は、ログイン後のページのメニューを選択した後表示される画面の上段に記載されています。また、右メニュー「レッスン履歴」ページからもご確認いただけます。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '英語がまったくわからないのだが、大丈夫でしょうか？'){
            // category 1 question 12 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => 'はい。ワールドアイキッズの先生は2歳の英語だけでなく日本語もわからないお子様から英語圏で過ごされてきた帰国子女の方まで、幅広くレッスンを行っております。英語を楽しむ(FUN LEARNING)というモットーでレッスンを行っていますので、英語の初心者の方でも安心して受講をしていただけます。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == 'レッスンの際、先生はウェブカメラは使用しますか？'){
            // category 1 question 13 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => 'すべての先生がウェブカメラを使用して、レッスンを提供差し上げますので、ぜひ楽しいレッスンにご期待頂けたら幸いです。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '家族や友人などにワールドアイキッズを紹介した場合の特典はありますか？'){
            // category 1 question 14 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '現在、「お友達・ご家族紹介キャンペーン」と称しまして、この機会にご登録をしていただくと、現会員様と新規会員様にポイントを追加するキャンペーンを行なっております。'.PHP_EOL.
                    'キャンペーン',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == 'パスワードの変更はどう行えばよいですか？'){
            // category 2 question 1 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '1. ログイン後のページにログインしてください。'.PHP_EOL.
                        '2. 右メニュー「設定」を選択してください。'.PHP_EOL.
                        '3. 「パスワード設定」タブにて、変更後のパスワード（半角英数字4~8字）を入力してください。'.PHP_EOL.
                        '※上記の手順にてパスワード変更ができない場合は、ログイン後のページの右メニュー「お問い合わせ」ページよりご連絡いただくか、 事務局(service@worldikids.com)にご登録されているメールアドレスからその旨をご連絡ください。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '「先生へのリクエスト」はどのように登録するの？'){
            // category 2 question 2 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '1. ログイン後のページの「レッスン予約を予約する」を選択してください。'.PHP_EOL.
                        '2. ご希望の日時や選択肢を選択して検索ボタンを選択してください。'.PHP_EOL.
                        '3. ご希望の先生の予約ボタンを選択してください。'.PHP_EOL.
                        '4. 「レッスン予約」ページが開くので、「先生へのリクエスト」の各項目を選択してください。'.PHP_EOL.
                        '5. その他リクエストあれば、英語で記載してください。'.PHP_EOL.
                        '6. 「予約」ボタンを選択して予約を完了 これによりリクエスト内容が登録された形となりますので、 次のレッスンからはこの時に登録したリクエスト内容がデフォルトとなります。 '.PHP_EOL.
                        '※リクエスト内容を変更されたい場合には、「レッスン予約」ページにて 上記手順により異なる選択肢を選択して頂く形となります。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '代講設定はどう行えばよいですか？'){
            // category 2 question 3 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '1. ログイン後のページの右メニュー「設定」を選択し、会員情報タブの「代講設定」より行えます。'.PHP_EOL.
                        '* 「希望する」ご選択時'.PHP_EOL.
                        ' ご予約レッスンが代講となった場合、別の先生によるレッスンを手配します。'.PHP_EOL.
                        '* 「希望しない」ご選択時'.PHP_EOL.
                        ' ご予約レッスンを提供できない事由が発生した場合、代講レッスンを受けず休講となり、次回に繰り越されます。'.PHP_EOL.
                        '※代講をご希望いただいている場合でも、やむを得ず代講先生が手配できない場合には休講となる場合がございます。 ',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '先生のお気に入り登録方法は？'){
            // category 2 question 4 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '1. ログイン後のページの右メニュー「先生一覧」から該当先生を選択してください'.PHP_EOL.
                        '2 開いたページから「お気に入り登録」を選択してください。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == 'プラン、レッスンって何？'){
            // category 2 question 5 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '■プランとは？'.PHP_EOL.
                        'レッスンを受けていただくためにご登録いただく、プラン名のことです。'.PHP_EOL.
                        '例）ブロンズプラン、シルバープラン、ゴールドプラン'.PHP_EOL.
                        'プランの種類をご確認いただきたい場合は、ホームページのトップメニュー「料金プラン」ページにて、 詳細内容をご確認していただけたら幸いです。'.PHP_EOL.PHP_EOL.
                        '■レッスンとは？'.PHP_EOL.
                        'レッスンは授業のことを指します。'.PHP_EOL.
                        '1レッスン＝1授業(25分)となります。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '「レッスンメモ」はどうやって使うの？'){
            // category 2 question 6 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '1. ログイン後のページの右メニュー「先生からのおたより/評価」を選択してください。'.PHP_EOL.
                        '2. 「先生からのおたより/評価」でご覧になられたいレッスンの行を選択してください。'.PHP_EOL.
                        '3. 「レッスンメモ」タブから、レッスンの感想や先生の印象など個人用の学習記録をのこせます。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '先生の評価はどのように行えばよいですか？'){
            // category 2 question 7 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '1. ログイン後のページの右メニュー「先生からのおたより/評価」を選択してください。'.PHP_EOL.
                        '2. 開いたページ画面上段の評価をされたいレッスンの「評価」ボタンを選択してください。'.PHP_EOL.
                        '3. レッスン終了後、48時間以内に評価'.PHP_EOL.
                        '※レッスン終了後、48時間を経過いたしますと、評価をして頂けなくなりますのでご了承ください。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '毎日何回までレッスンを受けることができますか？'){
            // category 3 question 1 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => 'プランにより異なります。詳しくは、プラン内容をご確認ください。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == '毎日何時までレッスンを受けることができますか？'){
            // category 3 question 2 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '早朝6:00から22:00までレッスンを受けていただけますので、ぜひお好きな時間にレッスンをお楽しみください。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == 'どのような支払い方法がありますか？'){
            // category 3 question 3 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => 'お支払い方法は「クレジットカード」または「銀行振込」になります。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }elseif($post == 'どのような支払い方法がありますか？'){
            // category 4 question 1 answer
            $message = array(
                array (
                    'type' => 'text',
                    'text' => 'お支払い方法は「クレジットカード」または「銀行振込」になります。',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '最初の質問に戻る',
                                    'text' => '最初の質問に戻る',
                                ),
                            ),
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '同様の質問を続ける',
                                    'text' => '同様の質問を続ける',
                                ),
                            ),
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
            );
            return $message;
        }

    }

    // all more question
    public function more($post){
        if($post == 'カテゴリー1の質問10 -14'){
            $message = array(
                array (
                    'type' => 'text',
                    'text' => '新規お申し込みカテゴリの下で質問のカテゴリを選択してください '.PHP_EOL.
                        '10. 同じメールアドレスで複数のアカウントを登録できますか？'.PHP_EOL.
                        '11. 登録中のプランのポイント有効期限を忘れてしまった場合、どこで確認できますか？'.PHP_EOL.
                        '12. 英語がまったくわからないのだが、大丈夫でしょうか？'.PHP_EOL.
                        '13. レッスンの際、先生はウェブカメラは使用しますか？'.PHP_EOL.
                        '14. 家族や友人などにワールドアイキッズを紹介した場合の特典はありますか？',
                    'quickReply' =>
                    array (
                        'items' =>
                        array (
                            //category 1 question 10
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '10',
                                    'text' => '同じメールアドレスで複数のアカウントを登録できますか？',
                                ),

                            ),
                            //category 1 question 11
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '11',
                                    'text' => '登録中のプランのポイント有効期限を忘れてしまった場合、どこで確認できますか？',
                                ),

                            ),
                            //category 1 question 12
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '12',
                                    'text' => '英語がまったくわからないのだが、大丈夫でしょうか？',
                                ),

                            ),
                            //category 1 question 13
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '13',
                                    'text' => 'レッスンの際、先生はウェブカメラは使用しますか？',
                                ),

                            ),
                            //category 1 question 14
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '14',
                                    'text' => '家族や友人などにワールドアイキッズを紹介した場合の特典はありますか？',
                                ),

                            ),
                            //back
                            array (
                                'type' => 'action',
                                'action' =>
                                array (
                                    'type' => 'message',
                                    'label' => '<< Back',
                                    'text' => 'バック',
                                ),

                            ),

                        ),
                    ),
                )
            );
            return $message;
        }//end if
    }

}// end of the class

?>
