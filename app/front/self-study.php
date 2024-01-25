<?php require_once("./header.php"); ?>

<div class="c-wrapper">
    <div class="c-nav-breadcrumb">
        <ol>
            <li><a href="../front">TOP</a></li>
            <li>学習記録</li>
        </ol>
    </div>
    <div class="p-self-study">
        <div class="c-heading-wrap">
            <h2 class="c-heading">新しい教材を登録</h2>
            <button id="modalOpen" type="button"><img src="./img/icon/plus.png" alt="プラスのアイコン"></button>
            <div id="easyModal" class="c-modal">
                <?php
                /* [TODO]
                    教材名・画像パスをモーダル内で取得して、下記の教材ごとのリスト(.p-self-study-list)に動的に表示
                */
                ?>
                <div class="c-modal-content">
                    <div class="c-modal-header">
                        <h1>教材を登録することができます</h1>
                        <span class="c-modalClose">×</span>
                    </div>
                    <div class="c-modal-body">
                        <p class="c-modal-body__book">教材名</p>
                        <input type="text" name="" id="">
                        <p class="c-modal-body__img">教材画像</p>
                        <input type="file" name="" id="">
                    </div>
                </div>
            </div>
        </div>
        <div class="p-self-study-list">
            <ul>
                <li>
                    <div>
                        <img src="./img/icon/study-dummy.png" alt="">
                    </div>
                    <p>PHP 本格入門</p>
                    <button type="submit" class="c-button">START</button>
                </li>
                <li>
                    <div>
                        <img src="./img/icon/study-dummy.png" alt="">
                    </div>
                    <p>もう怖くない Git!</p>
                    <button type="submit" class="c-button">START</button>
                </li>
                <li>
                    <div>
                        <img src="./img/icon/study-dummy.png" alt="">
                    </div>
                    <p>おうちで学べるデータベースの基本</p>
                    <button type="submit" class="c-button">START</button>
                </li>
                <li>
                    <div>
                        <img src="./img/icon/study-dummy.png" alt="">
                    </div>
                    <p>学習教材なし<br>で登録</p>
                    <button type="submit" class="c-button">START</button>
                </li>
            </ul>
        </div>

        <div class="c-archive">
            <?php
            /* [TODO]
            下記のリストに直近の学習内容・時間をアーカイブとして表示
            */
            ?>
            <ul>
                <li>
                    <button class="c-archive-button">
                        <div class="c-archive-content">
                            <div>
                                <img src="./img/icon/study-dummy.png" alt="">
                            </div>
                            <p>PHP 本格入門</p>
                        </div>
                        <time date-time="00:40:00">00:40:00</time>
                    </button>
                </li>
                <li>
                    <button class="c-archive-button">
                        <div class="c-archive-content">
                            <div>
                                <img src="./img/icon/study-dummy.png" alt="">
                            </div>
                            <p>もう怖くない Git !</p>
                        </div>
                        <time date-time="02:40:00">02:40:00</time>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php require_once("./footer.php"); ?>
