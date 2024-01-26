<?php

function getQuestList($teq_category_id)
{
    $count = 0;
    $beforeStr = array("1", "2", "3", "4", "5", "6", "7", "8", "9","10", "11", "12", "13", "14", "15");
    $afterStr = array("i", "ii", "iii", "iv", "v", "vi", "vii", "viii", "ix","x", "xi", "xii", "xiii", "xiv", "xv");
    $pdo = dbConnect();

    try {
        //クエスト一覧を取得
        $query = 'SELECT quest_no, quest_title, if_advanced FROM quests WHERE teq_category_id = :teq_category_id';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':teq_category_id', $teq_category_id, PDO::PARAM_INT);
        $statement->execute();

        while ($result = $statement->fetch(PDO::FETCH_ASSOC)) {
            //カラムquest_titleのデータを上から1レコードずつ、配列に格納
            $replaceStr = str_replace($beforeStr, $afterStr, $result['quest_no']);
            if ($result['if_advanced'] === "1") {
                $row[$count] = "QUEST " . $replaceStr . " " . $result['quest_title'] . "(advanced)";
            } else {
                $row[$count] = "QUEST " . $replaceStr . " " . $result['quest_title'];
            }
            $count++;
        }

        return $row;
    } catch (PDOException $e) {
        echo "取得失敗";
        return $e;
    } finally {
        // 処理なし
    }
}
