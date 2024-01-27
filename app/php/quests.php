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

function getQuestListDetail($getQuestId)
{
    $beforeStr = array("1", "2", "3", "4", "5", "6", "7", "8", "9","10", "11", "12", "13", "14", "15");
    $afterStr = array("i", "ii", "iii", "iv", "v", "vi", "vii", "viii", "ix","x", "xi", "xii", "xiii", "xiv", "xv");
    $pdo = dbConnect();

    try {
        //クエスト一覧を取得
        $query = <<<EOT
        SELECT que.quest_no ,
               que.quest_title,
               que.if_advanced,
               teq.category_name AS teqName,
               que_category.category_name AS queName
        FROM quests AS que
        INNER JOIN teq_categorys AS teq
        ON que.teq_category_id = teq.category_id
        INNER JOIN quest_categorys AS que_category
        ON que.quest_category_id = que_category.category_id
        WHERE que.quest_id = :quest_id
        EOT;
        $statement = $pdo->prepare($query);
        $statement->bindValue(':quest_id', $getQuestId, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        // print_r($result);

        $teqCategoryName = $result['teqName'];
        $questCategoryName = $result['queName'];
        $replaceStr = str_replace($beforeStr, $afterStr, $result['quest_no']);
        if ($result['if_advanced'] === "1") {
            $row = "QUEST " . $replaceStr . " " . $result['quest_title'] . "(advanced)";
        } else {
            $row = "QUEST " . $replaceStr . " " . $result['quest_title'];
        }

        $array = [
            $teqCategoryName => [
                $questCategoryName => $row
            ]
        ];

        return $array;
    } catch (PDOException $e) {
        echo "取得失敗";
        return $e;
    } finally {
        // 処理なし
    }
}
