<?php
    require_once("./header.php");
    $records = selectRecords(2);
?>

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
                <!-- 学習記録表示処理 START -->
                <?php
                $i = 0;
                for($i = 0; $i < count($records); $i++)
                {
                    echo <<<EOT
                        <li>
                            <p>{$records[$i]['date']}</p>
                            <button>
                                <img src="./img/icon/study-dummy.png" alt="">
                                <div class="past-study__list-content">
                    EOT;
                    if ($records[$i]['questNo'] !== '0') {
                        echo <<<EOT
                            <p>{$records[$i]['questType']}{$records[$i]['questNo']}.{$records[$i]['questTitle']}</p>
                        EOT;
                    } elseif ($records[$i]['questNo'] === '0') {
                        echo <<<EOT
                            <p>使った教材：{$records[$i]['referenceTitle']}</p>
                        EOT;
                    }
                    echo <<<EOT
                                    <p></p>
                                    <p>カテゴリ：{$records[$i]['category']}</p>
                                    <time date-time="">{$records[$i]['learning_time']}</time>
                                </div>
                            </button>
                        </li>
                    EOT;
                }?>
                                <!-- 学習記録表示処理 END -->
            </ul>
        </div>
    </div>
</div>

<?php require_once("./footer.php"); ?>
