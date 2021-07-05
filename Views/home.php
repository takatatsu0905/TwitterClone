<?php
//エラー表示あり
ini_set('display_errors',1);
//日本時間にする
date_default_timezone_set('Asia/Tokyo');
//URL・ディレクトリ設定
define('HOME_URL','/TwitterClone/');

////////////////////////////
//ツイート一覧
////////////////////////////

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

////////////////////////////
//便利な関数
////////////////////////////
/**
 * 画像ファイル名から画像のURLを作成
 *
 * @param string $name 画像ファイル名
 * @param string $type ユーザー画像かツイート画像
 * @return string
 */
function buildImagePath(string $name = null, string $type)
{
    if($type === 'user' && !isset($name)){
        return HOME_URL . 'Views\img\icon-default-user.svg';
    }

    return HOME_URL . 'views/img_uploaded/' . $type . '/' . htmlspecialchars($name);
}


/**
 * 指定した日時からどれだけ経過したかを取得する
 *
 * @param string $datetime 日時
 * @return string
 */

function convertToDayTimeAgo(string $datetime)
{
    $unix = strtotime($datetime);
    $now = time();
    $diff_sec = $now - $unix;

    if($diff_sec < 60){
        $time = $diff_sec;
        $unit = '秒前';
    }elseif($diff_sec < 3600){
        $time = $diff_sec / 60;
        $unit = '分前';
    }elseif($diff_sec < 86400){
        $time = $diff_sec / 3600;
        $unit = '時間前';
    }elseif($diff_sec < 2764800){
        $time = $diff_sec / 86400;
        $unit = '日前';
    }else{
        if(date('Y') != date('Y', $unix)){
            $time = date('Y年n月j日', $unix);
        }else{
            $time = date('n月j日', $unix);
        }
        return $time;
    }

    return (int)$time . $unit;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ホーム画面">
    <link rel="icon" href="<?php echo HOME_URL;?>Views\img\logo-twitterblue.svg">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="<?php echo HOME_URL;?>Views\css\style.css" rel="stylesheet">
    <title>ホーム画面 /　Twitterクローン</title>
</head>
<body class="home">
    <div class="container">
        <div class="side">
            <div class="side-inner">
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="home.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views\img\logo-twitterblue.svg" alt="" class="icon"></a></li>
                    <li class="nav-item"><a href="home.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views\img\icon-home.svg" alt=""></a></li>
                    <li class="nav-item"><a href="search.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views\img\icon-search.svg" alt=""></a></li>
                    <li class="nav-item"><a href="notification.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views\img\icon-notification.svg" alt=""></a></li>
                    <li class="nav-item"><a href="profile.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views\img\icon-profile.svg" alt=""></a></li>
                    <li class="nav-item"><a href="post.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views\img\icon-post-tweet-twitterblue.svg" alt="" class="post-tweet"></a></li>
                    <li class="nav-item my-icon"><img src="<?php echo HOME_URL;?>Views\img_uploaded\user\sample-person.jpg" alt=""></li>
                </ul>
            </div>
        </div>
        <div class="main">
            <div class="main-header">
                <h1>ホーム</h1>
            </div>
            <div class="tweet-post">
                <div class="my-icon">
                    <img src="<?php echo HOME_URL;?>Views\img_uploaded\user\sample-person.jpg" alt="">
                </div>
                <div class="input-area">
                    <form action="post.php" method="post" enctype="multipart/form-data">
                        <textarea name="body" placeholder="いまどうしている？" maxlength="140"></textarea>
                        <div class="bottom-area">
                            <div class="mb-0">
                                <input type="file" name="image" class="form-control form-control-sm">
                            </div>
                            <button class="btn" type="submit">つぶやく</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="ditch"></div>

            <!-- ユーザーの名前、ツイート内容など -->
            <?php if (empty($view_tweets)): ?>
                <p class="p-3">ツイートがまだありません。</p>
            <?php else: ?>
            
                <div class="tweet-list">
                    <?php foreach ($view_tweets as $view_tweet):?>
                        <div class="tweet">
                            <div class="user">
                                <a href="profile.php?user_id=1">
                                    <img src="<?php echo buildImagePath($view_tweet['user_image_name'], 'user');?>" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <div class="name">
                                    <a href="profile.php?user_id=<?php echo htmlspecialchars($view_tweet['user_id']);?>">
                                        <span class="nickname"><?php echo htmlspecialchars($view_tweet['user_nickname']);?></span>
                                        <span class="user-name">@<?php echo htmlspecialchars($view_tweet['user_name']);?>・<?php echo convertToDayTimeAgo($view_tweet['tweet_created_at']);?></span>
                                    </a>
                                </div>

                                <p><?php echo htmlspecialchars($view_tweet['tweet_body']);?></p>

                                <?php if(isset($view_tweet['tweet_image_name'])): ?>
                                    <img src="<?php echo buildImagePath($view_tweet['tweet_image_name'], 'tweet')?>" alt="" class="post-image">
                                <?php endif;?>

                                <div class="icon-list">
                                    <div class="like">
                                        <?php if(isset($view_tweet['like_id'])){
                                            echo '<img src="' . HOME_URL . 'Views\img\icon-heart-twitterblue.svg" alt="">';
                                        }else{
                                            echo '<img src="' . HOME_URL . 'Views\img\icon-heart.svg" alt="">';
                                        }                                 
                                        ?>
                                    </div>
                                    <div class="like-count"><?php echo htmlspecialchars($view_tweet['like_count']); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>

                </div>
            <?php endif;?>
        </div>
    </div>
</body>

</html>