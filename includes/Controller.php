<?php

class Controller {
    public function __construct(){

    }

    //testing get user info


    public function quitConversation(){
        $message = array(
            array(
                'type' => 'text',
                'text' => '会話を開始する場合は、リッチメニューの最後のボタンをクリックしてください。'.PHP_EOL.'ありがとうございました!' 
            )
        );
        return $message;
    }
    
    //get the more question button
    public function replyButtons(){
        $message =  array(
                    array (
                        'type' => 'text',
                        'text' => 'ボタンを選択してください',
                        'quickReply' => array (
                            'items' => 
                            array (
                                
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => 'カテゴリを選んでください',
                                        'text' => 'カテゴリを選んでください',
                                    ),
                                ),
                                
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => 'もっと質問',
                                        'text' => 'もっと質問',
                                    ),
                                ),
                                
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => '会話をやめる',
                                        'text' => '会話をやめる',
                                    ),
                                ),
                            ),
                        ),
                    )
                );
            return $message;
    }

    // questiom button
    public function postMessage($categoryName){
        
        if($categoryName == '新規お申し込み'){
            // category 1
            $message =  array(
                    array (
                        'type' => 'text',
                        'text' => '質問を選択してください'.PHP_EOL.PHP_EOL.
                        '1. 無料体験レッスンを受けたいのですが、どうすればいいでしょうか？'.PHP_EOL.
                        '2. 無料体験レッスンは何回できますか？'.PHP_EOL.
                        '3. 料金とプラン'.PHP_EOL.
                        '4. 無料会員から有料会員になるための手続き方法を教えてください。'.PHP_EOL.
                        '5. 登録がうまく完了しません。どうしたらいいでしょうか？'.PHP_EOL.
                        '6. 無料会員登録をするときに費用はかかりますか？'.PHP_EOL.
                        '7. 支払い後、いつから受講可能ですか？'.PHP_EOL.
                        '8. クレジットカードは何が使えますか？'.PHP_EOL.
                        '9. PayPalを利用したクレジットカード払いにて支払いをしたのですが、正常に決済が完了しませんでした。どうしたらよいですか？'.PHP_EOL.
                        '10. 同じメールアドレスで複数のアカウントを登録できますか？'.PHP_EOL.
                        '11. 登録中のプランのポイント有効期限を忘れてしまった場合、どこで確認できますか？'.PHP_EOL.
                        '12. 英語がまったくわからないのだが、大丈夫でしょうか？'.PHP_EOL.
                        '13. レッスンの際、先生はウェブカメラは使用しますか？'.PHP_EOL.
                        '14. 家族や友人などにワールドアイキッズを紹介した場合の特典はありますか？',
                        'quickReply' => array (
                            'items' => 
                            array (
                                0 => 
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => '1',
                                        'text' => '無料体験レッスンを受けたいのですが、どうすればいいでしょうか？',
                                    ),
                                ),
                                1 => 
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => '2',
                                        'text' => '無料体験レッスンは何回できますか？',
                                    ),
                                ),
                                2 => 
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => '3',
                                        'text' => 'プランの会費以外に追加で必要な費用はありますか。'.PHP_EOL.
                                                    'プランの会費以外に必要な費用はありません。',
                                    ),
                                ),
                                3 => 
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => '4',
                                        'text' => '無料会員から有料会員になるための手続き方法を教えてください。'.PHP_EOL.
                                                    'ログイン後のページのボタン「有料会員に登録してみる」よりお申込みいただけます。',
                                    ),
                                ),
                                4 => 
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => '5',
                                        'text' => '登録がうまく完了しません。どうしたらいいでしょうか？'.PHP_EOL.
                                                    '事務局(service@worldikids.com)までご登録が完了できない旨ご連絡ください。',
                                    ),
                                ),
                                5 => 
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => '6',
                                        'text' => '無料会員登録をするときに費用はかかりますか？'.PHP_EOL.
                                                    '無料会員登録には一切費用はかかりません。',
                                    ),
                                ),
                                6 => 
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => '7',
                                        'text' => '支払い後、いつから受講可能ですか？'.PHP_EOL.
                                                    'クレジットカード払いの場合は、お支払いが完了後、１時間前後以内にポイントが自動的に追加され、サービスをご利用いただくことが可能です。'.PHP_EOL.
                                                    '銀行振込の場合は、お振込みいただいた後、事務局(service@worldikids.com)までメールにて下記の情報をお知らせください。'.PHP_EOL.
                                                    '1. 会員様のお名前'.PHP_EOL.
                                                    '2. プラン名'.PHP_EOL.
                                                    '3. お振込み額'.PHP_EOL.
                                                    'その後、ポイントを追加いたします。銀行振込は、お振込み確認までに1~2営業日をいただいておりますので、ご了承ください。',
                                    ),
                                ),
                                7 => 
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => '8',
                                        'text' => 'クレジットカードは何が使えますか？'.PHP_EOL.
                                                    'Visa, Master, JCB, Amex, UnionPAYなどがご利用になれます。その他のクレジットカードについてはお問合せください。',
                                    ),
                                ),
                                8 => 
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => '9',
                                        'text' => 'PayPalを利用したクレジットカード払いにて支払いをしたのですが、正常に決済が完了しませんでした。どうしたらよいですか？'.PHP_EOL.
                                        'ご不便をお掛けしますが、会員様のPayPalにてのご登録状況に何らかの問題がある可能性がございます。お手数をお掛けいたしまして大変申し訳ございませんが、会員様から直接PayPal（0120-723-888）にお問合せして頂き、クレジットカード内容（有効期限切れ、残高不足、クレジットカード情報変更）やご登録内容に何か問題などが無いか、ご確認して頂けたら幸いです。'.PHP_EOL.
                                        'その後事務局(service@worldikids.com)までご報告いただけましたら幸いです。',
                                    ),
                                ),
                                
                                9 => 
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => '10',
                                        'text' => '同じメールアドレスで複数のアカウントを登録できますか？'.PHP_EOL.PHP_EOL.
                                        '同一のメールアドレスで複数のアカウントを登録することはできません。',
                                    ),
                                ),
                                10 => 
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => '11',
                                        'text' => '登録中のプランのポイント有効期限を忘れてしまった場合、どこで確認できますか？'.PHP_EOL.PHP_EOL.
                                        'ポイントの有効期限は、ログイン後のページのメニューを選択した後表示される画面の上段に記載されています。また、右メニュー「レッスン履歴」ページからもご確認いただけます。',
                                    ),
                                ),
                                11 => 
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => '12',
                                        'text' => '英語がまったくわからないのだが、大丈夫でしょうか？'.PHP_EOL.PHP_EOL.
                                        'はい。ワールドアイキッズの先生は2歳の英語だけでなく日本語もわからないお子様から英語圏で過ごされてきた帰国子女の方まで、幅広くレッスンを行っております。英語を楽しむ(FUN LEARNING)というモットーでレッスンを行っていますので、英語の初心者の方でも安心して受講をしていただけます。',
                                    ),
                                ),
                                12 => 
                                array (
                                    'type' => 'action',
                                   
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => '13',
                                        'text' => 'レッスンの際、先生はウェブカメラは使用しますか？'.PHP_EOL.PHP_EOL.
                                        'すべての先生がウェブカメラを使用して、レッスンを提供差し上げますので、ぜひ楽しいレッスンにご期待頂けたら幸いです。',
                                    ),
                                ),
                                12 => 
                                array (
                                    'type' => 'action',
                                    
                                    'action' => 
                                    array (
                                        'type' => 'message',
                                        'label' => '14',
                                        'text' => '家族や友人などにワールドアイキッズを紹介した場合の特典はありますか？'.PHP_EOL.PHP_EOL.
                                        '現在、「お友達・ご家族紹介キャンペーン」と称しまして、この機会にご登録をしていただくと、現会員様と新規会員様にポイントを追加するキャンペーンを行なっております。
        キャンペーン',
                                    ),
                                ),
                            ),
                        ),
                    )
                );
            return $message;
        }elseif($categoryName == 'ワールドアイキッズの使い方'){
            // category 2
            $message = array(
            array (
                'type' => 'text',
                'text' => 'ワールドアイキッズの使い方'.PHP_EOL.PHP_EOL.
                '1. パスワードの変更はどう行えばよいですか？'.PHP_EOL.
                '2. 「先生へのリクエスト」はどのように登録するの？'.PHP_EOL.
                '3. 代講設定はどう行えばよいですか？'.PHP_EOL.
                '4. 先生のお気に入り登録方法は？'.PHP_EOL.
                '5. 先生のお気に入り解除方法は？'.PHP_EOL.
                '6. プラン、レッスンって何？'.PHP_EOL.
                '7. 「レッスンメモ」はどうやって使うの？'.PHP_EOL.
                '8. 先生の評価はどのように行えばよいですか？',
                'quickReply' => array (
                    'items' => 
                    array (
                        0 => 
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '1',
                                'text' => 'パスワードの変更はどう行えばよいですか？'.PHP_EOL.
                                            '1. ログイン後のページにログインしてください。。'.PHP_EOL.
                                            '2. 右メニュー「設定」を選択してください。'.PHP_EOL.
                                            '3. 「パスワード設定」タブにて、変更後のパスワード（半角英数字4~8字）を入力してください。'.PHP_EOL.
                                        '※上記の手順にてパスワード変更ができない場合は、ログイン後のページの右メニュー「お問い合わせ」ページよりご連絡いただくか、 事務局(service@worldikids.com)にご登録されているメールアドレスからその旨をご連絡ください。',
                            ),
                        ),
                        1 => 
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '2',
                                'text' => '「先生へのリクエスト」はどのように登録するの？'.PHP_EOL.
                                            '1. ログイン後のページの「レッスン予約を予約する」を選択してください。'.PHP_EOL.
                                            '2. ご希望の日時や選択肢を選択して検索ボタンを選択してください。'.PHP_EOL.
                                            '3. ご希望の先生の予約ボタンを選択してください。'.PHP_EOL.
                                            '4. 「レッスン予約」ページが開くので、「先生へのリクエスト」の各項目を選択してください。'.PHP_EOL.
                                            '5. その他リクエストあれば、英語で記載してください。'.PHP_EOL.
                                            // '6. 「予約」ボタンを選択して予約を完了 これによりリクエスト内容が登録された形となりますので、 次のレッスンからはこの時に登録したリクエスト内容がデフォルトとなります。 '.PHP_EOL.
                                            '※リクエスト内容を変更されたい場合には、「レッスン予約」ページにて 上記手順により異なる選択肢を選択して頂く形となります。',
                            ),
                        ),
                        2 => 
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '3',
                                'text' => '代講設定はどう行えばよいですか？'.PHP_EOL.
                                            'ログイン後のページの右メニュー「設定」を選択し、会員情報タブの「代講設定」より行えます。'.PHP_EOL.
                                            '* 「希望する」ご選択時'.PHP_EOL.
                                            'ご予約レッスンが代講となった場合、別の先生によるレッスンを手配します。'.PHP_EOL.
                                            '* 「希望しない」ご選択時'.PHP_EOL.
                                            'ご予約レッスンを提供できない事由が発生した場合、代講レッスンを受けず休講となり、次回に繰り越されます。'.PHP_EOL.PHP_EOL.
                                            '※代講をご希望いただいている場合でも、やむを得ず代講先生が手配できない場合には休講となる場合がございます。',
                            ),
                        ),
                        3 => 
                        array (
                            'type' => 'action',
                           
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '4',
                                'text' => '先生のお気に入り登録方法は？'.PHP_EOL.
                                            '1. ログイン後のページの右メニュー「先生一覧」から該当先生を選択してください'.PHP_EOL.
                                            '2. 開いたページから「お気に入り登録」を選択してください。',
                            ),
                        ),
                        4 => 
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '5',
                                'text' => '先生のお気に入り解除方法は？'.PHP_EOL.
                                            '1. ログイン後のページの右メニュー「先生一覧」から該当先生を選択してください'.PHP_EOL.
                                            '2. 開いたページから「お気に入り解除」を選択してください。',
                            ),
                        ),
                        5 => 
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '6',
                                'text' => 'プラン、レッスンって何？'.PHP_EOL.
                                            '■プランとは？'.PHP_EOL.
                                            'レッスンを受けていただくためにご登録いただく、プラン名のことです。'.PHP_EOL.
                                            'プランの種類をご確認いただきたい場合は、ホームページのトップメニュー「料金プラン」ページにて、 詳細内容をご確認していただけたら幸いです。'.PHP_EOL.
                                            '■レッスンとは？'.PHP_EOL.
                                            'レッスンは授業のことを指します。'.PHP_EOL.
                                            '1レッスン＝1授業(25分)となります。',
                            ),
                        ),
                        6 => 
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '7',
                                'text' => '「レッスンメモ」はどうやって使うの？'.PHP_EOL.
                                            '1. ログイン後のページの右メニュー「先生からのおたより/評価」を選択してください。'.PHP_EOL.
                                            '2. 「先生からのおたより/評価」でご覧になられたいレッスンの行を選択してください。'.PHP_EOL.
                                            '3. 「レッスンメモ」タブから、レッスンの感想や先生の印象など個人用の学習記録をのこせます。',
                            ),
                        ),
                        7 => 
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '8',
                                'text' => '先生の評価はどのように行えばよいですか？'.PHP_EOL.
                                            '1. ログイン後のページの右メニュー「先生からのおたより/評価」を選択してください。'.PHP_EOL.
                                            '2. 開いたページ画面上段の評価をされたいレッスンの「評価」ボタンを選択してください。'.PHP_EOL.
                                            '3. レッスン終了後、48時間以内に評価'.PHP_EOL.
                                            '※レッスン終了後、48時間を経過いたしますと、評価をして頂けなくなりますのでご了承ください。',
                            ),
                        ),
                        
                    ),
                ),
            )
        );
            return $message;
        }elseif($categoryName == '料金とプラン'){
            //category 3
            $message = array(
            array (
                'type' => 'text',
                'text' => '料金とプラン'.PHP_EOL.PHP_EOL.
                '1. 毎日何回までレッスンを受けることができますか？'.PHP_EOL.
                '2. 毎日何時までレッスンを受けることができますか？'.PHP_EOL.
                '3. どのような支払い方法がありますか？',
                'quickReply' => array (
                    'items' => 
                    array (
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '1',
                                'text' => '毎日何回までレッスンを受けることができますか？'.PHP_EOL.
                                            'プランにより異なります。詳しくは、プラン内容をご確認ください。',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '2',
                                'text' => '毎日何時までレッスンを受けることができますか？'.PHP_EOL.
                                            '早朝6:00から22:00までレッスンを受けていただけますので、ぜひお好きな時間にレッスンをお楽しみください。',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '3',
                                'text' => 'どのような支払い方法がありますか？'.PHP_EOL.
                                            'お支払い方法は「クレジットカード」または「銀行振込」になります。',
                            ),
                        ),
                        
                    ),
                ),
            ));
            return $message;
        }elseif($categoryName == 'test'){
            //category 4
            $message = array(
            array (
                'type' => 'text',
                'text' => '各種お手続き'.PHP_EOL.PHP_EOL.
                '1. 契約を継続したいと思います。手続きについて教えてください。'.PHP_EOL.
                '2. レッスンを追加して行いたいのですが、どうすればいいですか？'.PHP_EOL.
                '3. プラン変更を希望しますが、手続き方法を教えてください。'.PHP_EOL.
                '4. もう１つプランを受講したいです。新しいアカウントを作るにはどうすれば良いの？'.PHP_EOL.
                '5. 支払いに使用したクレジットカードの変更（PayPalのアカウント情報の変更）をしたいのですがどのように手続きすればよいでしょうか？'.PHP_EOL.
                '6. PayPalコードはどうやって取得するの？'.PHP_EOL.
                '7. 登録したメールアドレスを変更することはできますか？'.PHP_EOL.
                '8. 登録したパスワードを変更することはできますか？'.PHP_EOL.
                '9. 登録したスカイプ名を変更することはできますか？'.PHP_EOL.
                '10. 「ポイント共有オプション」に登録する場合、各自異なるスカイプ名をワールドアイキッズアカウントに登録する必要がありますか？'.PHP_EOL.
                '11. 退会をしたいのですが、方法を教えてください。'.PHP_EOL.
                '12. 退会手続き後のサービスの利用について教えてください。'.PHP_EOL.
                '13. ワールドアイキッズへ登録している情報全てを削除して欲しいのですが。'.PHP_EOL.
                '14. 退会し、再度入会した場合、退会前の情報は引き継げますか。'.PHP_EOL.
                '15. キャンペーン等のダイレクトメールは送らないようにしてもらえますか？',
                'quickReply' => array (
                    'items' => 
                    array (
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '1',
                                'text' => '契約を継続したいと思います。手続きについて教えてください。',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '2',
                                'text' => 'レッスンを追加して行いたいのですが、どうすればいいですか？'.PHP_EOL.
                                    '「レッスン追加購入」サービスでレッスンの追加を行なっていただくことが可能です。',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '3',
                                'text' => 'プラン変更を希望しますが、手続き方法を教えてください。'.PHP_EOL.
                                    'プランのご変更はログイン後のページの右メニュー「コースプラン変更」ページ内の案内に沿って、お手続きをお進めください。'.PHP_EOL.
                                    'またページ内の案内ではご理解いただけないような場合には、お気軽に事務局(service@worldikids.com)までご連絡頂けたら幸いです。',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '4',
                                'text' => 'もう１つプランを受講したいです。新しいアカウントを作るにはどうすれば良いの？'.PHP_EOL.
                                    '現在お持ちのアカウントにご登録いただいておりますメールアドレス、スカイプ名とは、別のメールアドレス、スカイプ名にて新アカウントを作成していただけます。'.PHP_EOL.
                                    'メールアドレス、スカイプ名以外の情報（ニックネームなど）は同じものをお使いいただいても特に問題はございません。',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '5',                                
                                'text' => '支払いに使用したクレジットカードの変更（PayPalのアカウント情報の変更）をしたいのですがどのように手続きすればよいでしょうか？'.PHP_EOL.
                                    '現在お持ちのアカウントにご登録いただいておりますメールアドレス、スカイプ名とは、別のメールアドレス、スカイプ名にて新アカウントを作成していただけます。'.PHP_EOL.
                                    'ご自身のPayPalのアカウントにログインして頂き、変更したい情報の変更手続きを行ってください。変更手続きを完了頂けたら、ご登録プランの次回定期更新日から新しいクレジットカード情報をもとに、お支払いが完了しますのでご安心ください。',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '6',
                                'text' => 'PayPalコードはどうやって取得するの？'.PHP_EOL.
                                    'お手数ですがPayPal（0120-723-888）にお問い合わせください。'.PHP_EOL.
                                    'PayPalコードを取得後、正会員としてご登録頂けます。',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '7',
                                'text' => '登録したメールアドレスを変更することはできますか？'.PHP_EOL.
                                    'はい、登録したメールアドレスを変更することは可能です。 ログイン後のページの右メニュー「設定」を選択して行ってください。',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '8',
                                'text' => '登録したパスワードを変更することはできますか？'.PHP_EOL.
                                    'はい、登録したパスワードを変更することは可能です。 ログイン後のページの右メニュー「設定」を選択して行ってください。',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '9',
                                'text' => '登録したスカイプ名を変更することはできますか？'.PHP_EOL.
                                    'はい、登録したスカイプ名を変更することは可能です。 ログイン後のページの右メニュー「設定」を選択して行ってください。',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '10',
                                'text' => '「ポイント共有オプション」に登録する場合、各自異なるスカイプ名をワールドアイキッズアカウントに登録する必要がありますか？'.PHP_EOL.
                                    'メールアドレスは、異なる情報を登録頂く必要がありますが、スカイプ名はご希望でしたら同じ情報を各アカウントにご登録頂けます。',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '11',
                                'text' => '退会をしたいのですが、方法を教えてください。'.PHP_EOL.
                                    'ご退会される場合は、事務局(service@worldikids.com)に、ご登録いただいているメールアドレスからその旨を明記してご連絡ください。その後、事務局にて対応させていただきます。',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '12',
                                'text' => '退会手続き後のサービスの利用について教えてください。'.PHP_EOL.
                                    '退会手続き完了後は、サービスをご利用いただけなくなります。',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '13',
                                'text' => 'ワールドアイキッズへ登録している情報全てを削除して欲しいのですが。'.PHP_EOL.
                                    'お手数をおかけいたしますが、ログイン後のページの右メニュー「お問合わせ」ページ、あるいは 事務局(service@worldikids.com)に、ご登録いただいているメールアドレスからその旨を明記してご連絡ください。その後、事務局にて対応させていただきます。',
                            ),
                        ),
                        // array (
                        //     'type' => 'action',
                            
                        //     'action' => 
                        //     array (
                        //         'type' => 'message',
                        //         'label' => '14',
                        //         'text' => '退会し、再度入会した場合、退会前の情報は引き継げますか。'.PHP_EOL.
                        //             'お気に入り先生、お問合せ内容、レッスン履歴、レッスンメモ、レッスン累積受講時間に関しては、情報は引き継げません。',
                        //     ),
                        // ),
                        // array (
                        //     'type' => 'action',
                            
                        //     'action' => 
                        //     array (
                        //         'type' => 'message',
                        //         'label' => '15',
                        //         'text' => 'キャンペーン等のダイレクトメールは送らないようにしてもらえますか？'.PHP_EOL.
                        //             'ログイン後のページの右メニュー「設定」ページの「会員情報」を選択していただき、「ワールドアイキッズからのメール」のチェックをはずしてください。その後、ダイレクトメールが送られることはありません。',
                        //     ),
                        // ),
                        
                    ),
                ),
            ));
            return $message;
        }elseif($categoryName == '契約を継続したいと思います。手続きについて教えてください。'){
            $message = array(
            array (
                'type' => 'text',
                'text' => '契約を継続したいと思います。手続きについて教えてください。'.PHP_EOL.
                    '【ペイパルによるクレジットカード払いで受講料をお支払いの場合】'.PHP_EOL.
                    '退会手続きを完了されない限り、毎月の自動定期更新により自動的に受講料が引き落とされ、そのままご継続いただくことができますのでご安心ください。'.PHP_EOL.PHP_EOL.
                    '【銀行振込みで受講料をお支払いの場合】'.PHP_EOL.
                    '下記の各プランは、3ヶ月分の受講料を前払いでお振込みいただいておりますので、現在のご利用中プランの有効期限日の前日までに、指定の銀行口座へ受講料をお振込みいただけましたら、ご継続いただくことができます。'.PHP_EOL.
                    '・ブロンズプラン'.PHP_EOL.
                    '・シルバープラン'.PHP_EOL.
                    '・ゴールドプラン'.PHP_EOL.PHP_EOL.
                    '※なお、お振込み後はお手数ですが会員様の「お名前・プラン名・お振込額」を記載したものを、ログイン後のページの右メニュー「事務局へのお問合わせ」より送信いただくか事務局(service@worldikids.com)まで、ワールドアイキッズにご登録いただいているメールアドレスからご連絡ください。その後、お振込を確認させていただきしだいポイントを追加させていただきます。'.PHP_EOL.
                    '※お振込み確認までには2～3営業日をいただいておりますので、ご了承ください。',
                'quickReply' => array (
                    'items' => 
                    array (
                        
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => 'カテゴリを選んでください',
                                'text' => 'カテゴリを選んでください',
                            ),
                        ),
                        
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => 'もっと質問',
                                'text' => 'もっと質問',
                            ),
                        ),
                        
                        array (
                            'type' => 'action',
                            
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '会話をやめる',
                                'text' => '会話をやめる',
                            ),
                        ),
                    ),
                ),
            ));
            return $message;
        }//else end
    }//function getcatergory






    public function getReply($postMessage){
        if($postMessage == '無料体験レッスンを受けたいのですが、どうすればいいでしょうか？'){
            //category 1, answer 1
            $message = array(
            array (
                'type' => 'text',
                'text' => '無料体験レッスンを受けたいのですが、どうすればいいでしょうか？'.PHP_EOL.
                    '1. ワールドアイキッズの無料会員登録ページ（ https://worldikids.com/trial ）にいきます。'.PHP_EOL.
                    '2. メールアドレスとパスワードをご記入いただきご利用規約をご確認の上、「登録します」を選択します。'.PHP_EOL.PHP_EOL.
                    '3. ホームページ右上の「ログイン」ボタンから、登録したメールアドレスとパスワードでログインします。'.PHP_EOL.
                    '4. ログイン後、いますぐ予約するボタンを選択して、ご希望の先生と時間帯を選択してご予約ください。',
                'quickReply' => array (
                    'items' => 
                    array (
                        array (
                            'type' => 'action',
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => 'カテゴリを選んでください',
                                'text' => 'カテゴリを選んでください',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => 'もっと質問',
                                'text' => 'もっと質問',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '会話をやめる',
                                'text' => '会話をやめる',
                            ),
                        ),
                    ),
                ),
            ));
            return $message;

        }elseif($postMessage == '無料体験レッスンは何回できますか？'){
            //category 1, answer 2
            $message = array(
            array (
                'type' => 'text',
                'text' => '無料体験レッスンは何回できますか？'.PHP_EOL.
                    '無料体験レッスンは、2回行っていただけます。',
                'quickReply' => array (
                    'items' => 
                    array (
                        array (
                            'type' => 'action',
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => 'カテゴリを選んでください',
                                'text' => 'カテゴリを選んでください',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => 'もっと質問',
                                'text' => 'もっと質問',
                            ),
                        ),
                        array (
                            'type' => 'action',
                            'action' => 
                            array (
                                'type' => 'message',
                                'label' => '会話をやめる',
                                'text' => '会話をやめる',
                            ),
                        ),
                    ),
                ),
            ));
            return $message;
        }//end of if
    }
}//class

?>