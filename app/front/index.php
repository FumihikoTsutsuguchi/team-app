<?php require_once("./header.php"); ?>

<?php insertReports() ?>
<?php setTotalPlaytime(); ?>
<?php list($learningTimes, $weeklyLearningTime, $totalLearningTime) = getPlaytime();?>
<?php list($playerLevel, $playerExp, $avatar_path, $avatar_name, $requireExp) = getPlayersInfo();?>

<main id="top">
    <div class="p-front__mv">
        <div class="p-front__mv-content">
            <div class="p-front__mv-content-img">
                <img src="./img/avatar/hachi.png" alt="">
            </div>
            <div class="p-front__mv-content-button">
                <a href="./quest-list.php"><img src="./img/icon/start.png" alt=""></a>
            </div>
        </div>
    </div>
    <div class="c-wrapper">
        <div class="p-front__wrap">
            <div class="p-front__study">
                <h2 class="c-heading">現在の学習状況</h2>
                <div class="p-front__study-content">
                    <p>学習時間 (QUEST・学習記録)</p>
                    <div class="p-front__study-content-total">
                        <table>
                            <thead>
                                <tr>
                                    <th>今日</th>
                                    <th>今週</th>
                                    <th>統計</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $learningTimes[0]['learning_time']; ?></td>
                                    <td><?php echo $weeklyLearningTime; ?></td>
                                    <td><?php echo $totalLearningTime; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-front__study-content-bar-graph">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="p-front__avatar">
                <h2 class="c-heading">アバターの様子</h2>
                <div class="p-front__avatar-content">
                    <div class="p-front__avatar-content-avatar">
                        <div class="p-front__avatar-content-img">
                            <img src="<?php echo $avatar_path; ?>" alt="">
                        </div>
                        <p><?php echo $avatar_name; ?></p>
                    </div>
                    <div class="p-front__avatar-content-level">
                        <p>プレイヤーの現在のLv</p>
                        <div><span>Lv:</span><?php echo $playerLevel; ?></div>
                    </div>
                    <div class="p-front__avatar-content-status">
                        <p>EXP (分)</p>
                        <div class="p-front__avatar-content-status-number">
                            <progress max="1" value="<?php echo $playerExp; ?>"></progress>
                            <p>
                                <span>0</span><span>60</span>
                            </p>
                            <div class="p-front__avatar-content-status-limit">
                                <p>次のレベルまで<span><?php echo $requireExp; ?></span>分</p>
                            </div>
                        </div>
                    </div>
                    <div class="c-button-link">
                        <a href="./avatar.php">アバター 一覧</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php // グラフライブラリ(chart.js)読み込み[TOPページのみ] ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php

// getPlaytime()で受け取った直近７日間の日付・学習時間をJSで使える変数に格納

// $learningTimesの例
// $learningTimes = [
//     ["date" => "2024-01-28", "learning_time" => "12時間00分"],
//     ["date" => "2024-01-27", "learning_time" => "1時間00分"],
// ];

// $learningTimesからlabelsとdataを生成
$labels = [];
$data = [];

foreach ($learningTimes as $record) {
    // 日付を取得し、"Y/m/d"のフォーマットに変換
    $date = date("Y/m/d", strtotime($record["date"]));
    $labels[] = $date;

    // 学習時間を「時間」と「分」に分割
    $timeComponents = explode("時間", $record["learning_time"]);

    // 初期値をセット
    $hours = 0;
    $minutes = 0;

    if (count($timeComponents) > 1) {
        // 「時間」が含まれている場合
        $hours = (int)$timeComponents[0];

        // 「分」を取得し、単位を時間に変換
        $minutesComponents = explode("分", $timeComponents[1]);
        if (count($minutesComponents) > 1) {
            $minutes = (int)$minutesComponents[0] / 60;
        }
    } else {
        // 「時間」が含まれていない場合、直接「分」を取得
        $minutesComponents = explode("分", $timeComponents[0]);
        if (count($minutesComponents) > 1) {
            $minutes = (int)$minutesComponents[0] / 60;
        }
    }

    // 時間と分を合算して配列に追加
    $totalHours = $hours + $minutes;
    $data[] = $totalHours;
}


?>

<script>
    // ============================================================================
    // chart.js(グラフ描画のライブラリ)
    // ============================================================================

    const labels = <?php echo json_encode($labels); ?>; // 直近7日の学習時間
    const data = <?php echo json_encode($data); ?>; // 直近7日の日付
    const ctx = document.getElementById("myChart");
    if (ctx) {
        // [TODO] labels(直近の7日間の日付)・data(学習時間)はデータベースから取得
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "学習時間",
                        data: data,
                        borderWidth: 1,
                        backgroundColor: "#3cb371",
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    }
</script>

<?php require_once("./footer.php"); ?>
