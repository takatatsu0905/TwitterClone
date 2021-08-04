<?php

///////////////////////////////
//サインインコントローラー
///////////////////////////////

//設定を読み込み
include_once('../confing.php');

// 便利な関数を読み込む
include_once('../util.php');

//TODO:ログインチェック
$user = getUserSession();
if(!$user){
    //ログインしていない
    header('Location: ' . HOME_URL . 'Controllers/sign-in.php');
    exit;
}

//表示用の変数
$view_user = $user;

//ツイート一覧
//TODO: モデルから取得する
$view_tweets = [
    [
        'user_id' => 1,
        'user_name' => 'taro',
        'user_nickname' => '太郎',
        'user_image_name' => 'sample-person.jpg',
        'tweet_body' => '今プログラミングをしています。',
        'tweet_image_name' => null,
        'tweet_created_at' => '2021-06-30 15:00:00',
        'like_id' => null,
        'like_count' => 0,
    ],
    [
        'user_id' => 2,
        'user_name' => 'jiro',
        'user_nickname' => '次郎',
        'user_image_name' => null,
        'tweet_body' => 'コワーキングスペースをオープンしました。',
        'tweet_image_name' => 'sample-post.jpg',
        'tweet_created_at' => '2021-06-29 15:00:00',
        'like_id' => 1,
        'like_count' => 1,
    ]
];

//画面表示
include_once '../Views/home.php';