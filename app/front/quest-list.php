<?php require_once("./header.php"); ?>
<?php $questLists[] = getQuestList(2);?>
<?php $questLists[] = getQuestList(4);?>
<?php $questLists[] = getQuestList(5);?>
<?php $questLists[] = getQuestList(6);?>
<?php $questLists[] = getQuestList(8);?>
<?php $records = selectRecords(0);?>


<div class="c-wrapper">
    <div class="c-nav-breadcrumb">
        <ol>
            <li><a href="../front">TOP</a></li>
            <li>QUEST一覧</li>
        </ol>
    </div>
    <div class="p-quest-list">
        <h2 class="c-heading">QUEST 一覧</h2>
        <div class="p-quest-list__select">
            <h3>QUEST</h3>
            <form action="./quest-list-detail.php" method="post">
                <?php
                    foreach ($questLists as $questList) {
                        foreach ($questList as $teqCategory => $questTypes) {
                          echo <<<EOT
                              <details>
                                  <summary>{$teqCategory}</summary>
                          EOT;
                              foreach ($questTypes as $questType => $quests) {
                                  // var_export($quests);
                                  echo <<<EOT
                                      <div class="p-quest-list__select-content">
                                          <h4>{$questType}</h4>
                                          <ul>
                                  EOT;
                                  foreach ($quests as $quest) {
                                      echo <<<EOT
                                          <li><button>{$quest}</button></li>
                                      EOT;
                                  }
                                  echo <<<EOT
                                          </ul>
                                      </div>
                                  EOT;
                              }
                          echo <<<EOT
                              </details>
                          EOT;
                        }
                    }
                ?>
            </form>
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
