<?php require_once("./header.php"); ?>

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

                </div>
            </div>
        </div>
        <div class="p-front__avatar">
            <h2 class="c-heading">アバターの様子</h2>
            <div class="p-front__avatar-content">
                <div class="p-front__avatar-content-avatar">
                    <div class="p-front__avatar-content-img">
                        <img src="./img/avatar/primitive-man.png" alt="">
                    </div>
                    <p>原始人</p>
                </div>
                <div class="p-front__avatar-content-status">
                    <p>EXP (時間)</p>
                    <progress max="100" value="75"></progress>
                </div>
                <div class="c-button-link">
                    <a href="./avatar.php">アバター 一覧</a>
                </div>
            </div>
        </div>
    </div>
</main>


<?php require_once("./footer.php"); ?>
