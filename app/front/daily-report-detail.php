<?php require_once("./header.php"); ?>

<div class="c-wrapper">
    <div class="c-nav-breadcrumb">
        <ol>
            <li><a href="../front">TOP</a></li>
            <li><a href="./daily-report.php">日報管理</a></li>
            <li>日報詳細</li>
        </ol>
    </div>
    <div class="p-daily-report-detail">
        <div class="p-daily-report-detail__memo">
            <time date-time="2024-01-15">2024/01/15(月)</time>
            <div class="p-daily-report-detail__memo-content">
                <h2 class="c-heading">学習時間</h2>
                <?php
                /* [TODO]
                ストップウォッチで計測した時間を動的に表示
                */
                ?>
                <textarea name="" id="" cols="50" rows="1"></textarea>
            </div>
            <div class="p-daily-report-detail__memo-content">
                <h2 class="c-heading">学習内容</h2>
                <textarea name="" id="" cols="50" rows="10"></textarea>
            </div>
            <div class="p-daily-report-detail__memo-content">
                <h2 class="c-heading">振りかえり</h2>
                <textarea name="" id="" cols="50" rows="15"></textarea>
            </div>
            <button class="c-button">戻る</button>
        </div>
    </div>
</div>

<?php require_once("./footer.php"); ?>
