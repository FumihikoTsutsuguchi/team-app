<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/css/style.css">

    <title>アプレンティス QUEST</title>

    <?php //PHP関数読み込み ?>
    <?php require_once("../php/for_include.php"); ?>
</head>
<body>
    <header class="c-header" role="banner">
        <div class="c-header__wrap">
            <h1>
                <a href="../front">
                    <img src="./img/logo/apprentice-quest.png" alt="アプレンティス quest" width="400" height="60">
                </a>
            </h1>
            <nav class="c-nav-global">
                <ul>
                    <li><a href="./quest-list.php">QUEST一覧</a></li>
                    <li><a href="./self-study.php">学習記録一覧</a></li>
                    <li><a href="./past-study.php">過去の学習一覧</a></li>
                    <li><a href="./avatar.php">アバター</a></li>
                </ul>
            </nav>
        </div>
    </header>
