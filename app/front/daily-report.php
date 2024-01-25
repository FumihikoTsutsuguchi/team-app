<?php require_once("./header.php"); ?>

<div class="c-wrapper">
    <div class="c-nav-breadcrumb">
        <ol>
            <li><a href="../front">TOP</a></li>
            <li>日付管理</li>
        </ol>
    </div>
    <div class="p-daily-report">
        <div class="c-heading">日付管理</div>
        <div class="p-daily-report__calender">
            <?php
            /* [TODO]
            カレン
            */
            ?>
            <div id='calendar'></div>
        </div>
    </div>
</div>

<?php // カレンダーライブラリ(FullCalender) 日報管理ページ(daily-report.php)のみ ?>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>

<?php require_once("./footer.php"); ?>
