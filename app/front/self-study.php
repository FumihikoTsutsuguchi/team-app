<?php require_once("./header.php"); ?>

<?php
    if ($_POST !== []) {
        insertReferences($_POST['materialName'], $_POST['teqCategory']);
    }
    list($referencesId, $referencesTitle) = getLearningReferencesTitle();
    $records = selectRecords(1);


 ?>

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
        </div>
        <div class="p-self-study-list">
            <form action="./self-study-detail.php" method="get">
                <ul id="materialList">
                    <?php
                        for ($i = 0; $i < count($referencesTitle); $i++) {
                            echo <<<EOT
                                <li>
                                    <div>
                                    <img src="./img/icon/study-dummy.png" alt="">
                                    </div>
                                    <p>{$referencesTitle[$i]}</p>
                                    <button name="reference_id" value="{$referencesId[$i]}" type="submit" class="c-button">START</button>
                                </li>
                            EOT;
                        }
                    ?>
                </ul>
            </form>
            <div class="p-self-study-list-add">
                <p>新規登録</p>
                <button id="modalOpen" type="button"><img src="./img/icon/plus.png" alt="プラスのアイコン"></button>
                <form method="post" action="">
                    <div id="easyModal" class="c-modal">
                        <?php
                        /* [TODO]
                            教材名・画像パスをモーダル内で取得して、下記の教材ごとのリスト(.p-self-study-list)に動的に表示
                        */
                        ?>
                        <div class="c-modal-content">
                            <div class="c-modal-header">
                                <h1>教材を登録することができます</h1>
                                <span class="c-modalClose c-modal-cross">×</span>
                            </div>
                            <div class="c-modal-body">
                                <label class="c-modal-body__book" for="materialName">教材名</label>
                                <input type="text" name="materialName" id="materialName" >
                                <label class="c-modal-body__book" for="teqCategory">カテゴリ名</label>
                                <input type="text" name="teqCategory" id="teqCategory">
                                <button type="submit" id="materialSaveButton" class="c-modal-button c-button__small c-modalClose" >登録する</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="c-archive">
            <p>今日の記録</p>
            <ul>
                <?php
                    if (count($records) === 0) {
                        echo <<<EOT
                            <li>
                                <button class="c-archive-button">
                                    <div class="c-archive-content">
                                        <p>今日はまだ記録していません(T^T)</p>
                                    </div>
                                </button>
                            </li>
                        EOT;
                    } else {
                        for ($i = 0; $i < count($records); $i++) {
                            echo <<<EOT
                                <li>
                                    <button class="c-archive-button">
                                        <div class="c-archive-content">
                                            <div>
                                                <img src="./img/icon/study-dummy.png" alt="">
                                            </div>
                                            <p>{$records[$i]['title']}</p>
                                        </div>
                                        <time date-time="02:40:00">{$records[$i]['learning_time']}</time>
                                    </button>
                                </li>
                            EOT;
                        }
                    }
                ?>
            </ul>
        </div>
    </div>
</div>
<?php require_once("./footer.php"); ?>
