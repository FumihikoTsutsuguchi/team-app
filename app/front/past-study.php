<?php require_once("./header.php"); ?>

<div class="c-wrapper">
    <div class="c-nav-breadcrumb">
        <ol>
            <li><a href="../front">TOP</a></li>
            <li>過去の学習一覧</li>
        </ol>
    </div>
    <div class="past-study">
        <div class="c-heading">過去の学習一覧</div>
        <div class="c-select">
            <?php
            /* [TODO]
            セレクトボックスで選んだ条件によって、過去の学習一覧(.past-study__list)のリストをソートできるようにする
            */
            ?>
            <select name="" id="">
                <option value="">全ての記録を表示</option>
                <option value="">全てのQUESTを表示</option>
                <option value="">全ての「学習記録」を表示</option>
            </select>
        </div>
        <div class="past-study__list">
            <ul>
                <li>
                    <p>2024 / 01 / 01 (月)</p>
                    <button>
                        <img src="./img/icon/study-dummy.png" alt="">
                        <div class="past-study__list-content">
                            <p>PHP 本格入門</p>
                            <time date-time="">01:40:00</time>
                        </div>
                    </button>
                </li>
                <li>
                    <p>2024 / 01 / 02 (月)</p>
                    <button>
                        <div class="past-study__list-content">
                            <p><span>PHP</span>QUEST i  PHPについて初心者に説明ができる</p>
                            <time date-time="">10:40:00</time>
                        </div>
                    </button>
                </li>
                <li>
                    <p>2024 / 01 / 04 (水)</p>
                    <button>
                        <img src="./img/icon/study-dummy.png" alt="">
                        <div class="past-study__list-content">
                            <p>おうちで学べるデータベースの基本</p>
                            <time date-time="">02:40:00</time>
                        </div>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php require_once("./footer.php"); ?>
