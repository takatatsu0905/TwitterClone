<?php
//エラー表示あり
ini_set('display_errors',1);
//日本時間にする

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ホーム画面">
    <link rel="icon" href="\TwitterClone\Views\img\logo-twitterblue.svg">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="\TwitterClone\Views\css\style.css" rel="stylesheet">
    <title>ホーム画面 /　Twitterクローン</title>
</head>
<body class="home">
    <div class="container">
        <div class="side">
            <div class="side-inner">
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="home.php" class="nav-link"><img src="\TwitterClone\Views\img\logo-twitterblue.svg" alt="" class="icon"></a></li>
                    <li class="nav-item"><a href="home.php" class="nav-link"><img src="\TwitterClone\Views\img\icon-home.svg" alt=""></a></li>
                    <li class="nav-item"><a href="search.php" class="nav-link"><img src="\TwitterClone\Views\img\icon-search.svg" alt=""></a></li>
                    <li class="nav-item"><a href="notification.php" class="nav-link"><img src="\TwitterClone\Views\img\icon-notification.svg" alt=""></a></li>
                    <li class="nav-item"><a href="profile.php" class="nav-link"><img src="\TwitterClone\Views\img\icon-profile.svg" alt=""></a></li>
                    <li class="nav-item"><a href="post.php" class="nav-link"><img src="\TwitterClone\Views\img\icon-post-tweet-twitterblue.svg" alt="" class="post-tweet"></a></li>
                    <li class="nav-item my-icon"><img src="\TwitterClone\Views\img_uploaded\user\sample-person.jpg" alt=""></li>
                </ul>
            </div>
        </div>
        <div class="main">
            <div class="main-header">
                <h1>ホーム</h1>
            </div>
            <div class="tweet-post">
                <div class="my-icon">
                    <img src="\TwitterClone\Views\img_uploaded\user\sample-person.jpg" alt="">
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

            <div class="tweet-list">

                <div class="tweet">
                    <div class="user">
                        <a href="profile.php?user_id=1">
                            <img src="\TwitterClone\Views\img_uploaded\user\sample-person.jpg" alt="">
                        </a>
                    </div>
                    <div class="content">
                        <div class="name">
                            <a href="profile.php?user_id=1">
                                <span class="nickname">太郎</span>
                                <span class="user-name">@taro ・23日前</span>
                            </a>
                        </div>
                        <p>今プログラミングをしています。</p>
                        <div class="icon-list">
                            <div class="like">
                                <img src="\TwitterClone\Views\img\icon-heart.svg" alt="">
                            </div>
                            <div class="like-count">0</div>
                        </div>
                    </div>
                </div>

                <div class="tweet">
                    <div class="user">
                        <a href="profile.php?user_id=1">
                            <img src="\TwitterClone\Views\img\icon-default-user.svg" alt="">
                        </a>
                    </div>
                    <div class="content">
                        <div class="name">
                            <a href="profile.php?user_id=1">
                                <span class="nickname">次郎</span>
                                <span class="user-name">@jiro ・24日前</span>
                            </a>
                        </div>
                        <p>コワーキングスペースをオープンしました！</p>
                        <img src="\TwitterClone\Views\img_uploaded\tweet\sample-post.jpg" alt="" class="post-image">
                        <div class="icon-list">
                            <div class="like">
                                <img src="\TwitterClone\Views\img\icon-heart-twitterblue.svg" alt="">
                            </div>
                            <div class="like-count">1</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>