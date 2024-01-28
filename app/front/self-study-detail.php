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
                    <form action="" method="post">
                        <button id="js-stopwatchStart" type="button" name="start"><img src="./img/icon/play.png" alt="再生ボタン" width="40px" height="40px"></button>
                        <button id="js-stopwatchStop" type="submit" name="stop"><img src="./img/icon/stop.png" alt="停止ボタン" width="40px" height="40px"></button>
                        <div class="p-quest-detail__time-measure-result">
                            <time id="js-stopwatch" date-time="00:00:00">00:00:00</time>
                        </div>
                        <input id="id-hidden" type="hidden" name="questId">
                        <input id="time-hidden" type="hidden" name="studyTime">
                    </form>
                </div>
                <div class="p-quest-detail__time-measure-text">
                    <h3>PHP 本格入門</h3>
                </div>
            </div>
            <div class="c-button-link"><a href="./self-study.php">戻る</a></div>
        </div>
    </div>
</div>

<?php // ダミーの教材ID ?>
<?php $getId = '1111' ?>

<script>
    // スタートボタンクリック時に教材IDとスタート時間をformに渡す処理

    const Id = <?php echo json_encode($getId); ?>; // 教材のID
    const startButton = document.getElementById("js-stopwatchStart");
    const stopButton = document.getElementById("js-stopwatchStop");
    const idHidden = document.getElementById("id-hidden");
    const timeHidden = document.getElementById("time-hidden");
    startButton.addEventListener('click', () => {
        // 現在の日付と時間を取得
        const now = new Date();
        const year = now.getFullYear();
        const month = ('0' + (now.getMonth() + 1)).slice(-2);
        const day = ('0' + now.getDate()).slice(-2);
        const hours = ('0' + now.getHours()).slice(-2);
        const minutes = ('0' + now.getMinutes()).slice(-2);
        const seconds = ('0' + now.getSeconds()).slice(-2);

        const startTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
        const japanTime = now.toLocaleString("ja-JP", { timeZone: "Asia/Tokyo" });


        idHidden.value = Id; // 教材のIDを<formのinput type=hidden>のvalueに渡す
        timeHidden.value = startTime; // 学習開始日時を<formのinput type=hidden>に渡す
    });

</script>

<?php require_once("./footer.php"); ?>
