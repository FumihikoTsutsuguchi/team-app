<?php require_once("./header.php"); ?>

<?php list($playerLevel, $playerExp, $avatar) = getPlayersInfo();?>

<main id="top">
    <div class="p-front__mv">
        <div class="p-front__mv-content">
            <div class="p-front__mv-content-img">
                <img src="./img/avatar/hachi.png" alt="">
            </div>
            <div class="p-front__mv-content-button">
                <a href=""><img src="./img/icon/start.png" alt=""></a>
            </div>
        </div>
    </div>
    <div class="c-wrapper">
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
                                <td>5時間</td>
                                <td>50時間</td>
                                <td>120時間</td>
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
                        <img src="<?php echo $avatar; ?>" alt="">
                    </div>
                    <p>原始人</p>
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
                            <p>次のレベルまで<span><?php echo (60 - $playerExp); ?></span>分</p>
                        </div>
                    </div>
                </div>
                <div class="c-button-link">
                    <a href="./avatar.php">アバター 一覧</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php // グラフライブラリ(chart.js)読み込み[TOPページのみ] ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // ============================================================================
    // chart.js(グラフ描画のライブラリ)
    // ============================================================================

    const ctx = document.getElementById("myChart");
    if (ctx) {
        // [TODO] labels(直近の7日間の日付)・data(学習時間)はデータベースから取得
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["1/1", "1/2", "1/3", "1/4", "1/5", "1/6", "1/7"],
                datasets: [
                    {
                        label: "学習時間",
                        data: [1, 4, 5, 2, 7, 5, 6],
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
