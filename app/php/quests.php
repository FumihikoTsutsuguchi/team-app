<?php

function getQuestList($teq_category_id)
{
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
            WHERE
                que.teq_category_id = :teq_category_id
            ORDER BY
                que.quest_id ASC

        EOT;
        $statement = $pdo->prepare($query);
        $statement->bindValue(':teq_category_id', $teq_category_id, PDO::PARAM_INT);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $key => $result) {
            //配列イメージ
            // $questList = [
            //     $teqName => [
            //         $queName => [
            //            $questNo => quest_title
            //         ]
            //     ]
            // ];
            $teqName = $result['teqName'];
            $queName = $result['queName'];
            $questNo = $result['quest_no'];
            $replaceStr = changeNumToRome($result['quest_no']);
            if ($result['if_advanced'] === "1") {
                $questList[$teqName][$queName][$questNo] = "QUEST " . $replaceStr . " " . $result['quest_title'] . "(advanced)";
            } else {
                $questList[$teqName][$queName][$questNo] = "QUEST " . $replaceStr . " " . $result['quest_title'];
            }
        }

        return $questList;
    } catch (PDOException $e) {
        echo "取得失敗";
        return $e;
    } finally {
        // 処理なし
    }
}

function getQuestListDetail($getQuestId)
{
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

        $teqCategoryName = $result['teqName'];
        $questCategoryName = $result['queName'];
        $replaceStr = changeNumToRome($result['quest_no']);
        if ($result['if_advanced'] === "1") {
            $row = "QUEST " . $replaceStr . " " . $result['quest_title'] . "(advanced)";
        } else {
            $row = "QUEST " . $replaceStr . " " . $result['quest_title'];
        }

        $questInfo = [
            $teqCategoryName => [
                $questCategoryName => $row
            ]
        ];

        return $questInfo;
    } catch (PDOException $e) {
        echo "取得失敗";
        return $e;
    } finally {
        // 処理なし
    }
}
