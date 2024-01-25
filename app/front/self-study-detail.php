<?php require_once("./header.php"); ?>

<div class="c-wrapper">
    <div class="c-nav-breadcrumb">
        <ol>
            <li><a href="../front">TOP</a></li>
            <li><a href="./quest-list.php">学習記録</a></li>
            <li>教材詳細</li>
        </ol>
    </div>
    <div class="p-quest-detail">
        <div class="p-quest-detail__content">
            <h2 class="c-heading">教材詳細</h2>
            <?php
            /* [TODO]
            下記の<h3>に学習記録ページで選択した「本のタイトル」を動的に表示
            */
            ?>
            <div class="p-quest-detail__content-text">
                <h3>PHP 本格入門</h3>
            </div>
        </div>
        <div class="p-quest-detail__time">
            <h2 class="c-heading">現在の学習時間</h2>
            <?php
            /* [TODO]
            下記のストップウィッチで止めた時間(#js-stopwatch)を取得しQUEST内容・時間を保存
            */
            ?>
            <div class="p-quest-detail__time-measure">
                <div class="p-quest-detail__time-measure-wrap">
                    <button id="js-stopwatchStart" type="button"><img src="./img/icon/play.png" alt="再生ボタン" width="40px" height="40px"></button>
                    <button id="js-stopwatchStop" type="button"><img src="./img/icon/stop.png" alt="停止ボタン" width="40px" height="40px"></button>
                    <div class="p-quest-detail__time-measure-result">
                        <time id="js-stopwatch" date-time="00:00:00">00:00:00</time>
                    </div>
                </div>
                <div class="p-quest-detail__time-measure-text">
                    <h3>PHP 本格入門</h3>
                </div>
            </div>
            <button class="c-button">戻る</button>
        </div>
    </div>
</div>

<?php require_once("./footer.php"); ?>