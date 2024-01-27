<?php

function insertRecords()
{
    $pdo = dbConnect();

    try {
        /**
        * クエリ内容一例 :
        * INSERT INTO records(started_at, finished_at, quest_id, reference_id)
        *        VALUES(:started_at, CURRENT_TIMESTAMP, :quest_id, :reference_id);
        */
        $query = file_get_contents('insert.sql');
        $statement = $pdo->prepare($query);
        //date : 2000-07-01T00:00:00+00:00
        $statement->bindValue(':started_at', date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000)), PDO::PARAM_STR);
        $statement->bindValue(':quest_id', 1, PDO::PARAM_INT);
        $statement->bindValue(':reference_id', 1, PDO::PARAM_INT);
        $statement->execute();

        return true;
    } catch (PDOException $e) {
        echo "登録失敗";
        return false;
    } finally {
        // 処理なし
    }
}
//教材、QUEST、過去の学習一覧で学習記録の内容を取得
function selectRecords(int $recordsType)
{
    $pdo = dbConnect();
    try {
        if ($recordsType === 0) {
            $query = <<<EOT
                SELECT
                    teq.category_name AS category,
                    que.quest_no AS num,
                    que.quest_title AS title,
                    TIME_FORMAT(TIMEDIFF(finished_at, started_at), '%H:%i:%s') AS learning_time
                FROM
                    records AS rec
                    INNER JOIN quests AS que
                    ON rec.quest_id = que.quest_id
                    INNER JOIN teq_categorys AS teq
                    ON que.teq_category_id = teq.category_id
                WHERE
                    rec.quest_id <> 1
            EOT;
        } elseif ($recordsType === 1) {
            $query = <<<EOT
            SELECT
                teq.category_name AS category,
                ref.reference_title AS title,
                TIME_FORMAT(TIMEDIFF(finished_at, started_at), '%H:%i:%s') AS learning_time
            FROM
                records AS rec
                INNER JOIN lerning_references AS ref
                ON rec.reference_id = ref.reference_id
                INNER JOIN teq_categorys AS teq
                ON ref.teq_category_id = teq.category_id
            WHERE
                rec.reference_id <> 1
            EOT;
        } elseif ($recordsType === 3) {
            $query = <<<EOT
            SELECT
                teq.category_name AS category,
                ref.reference_title AS referenceTitle,
                que.quest_no AS questNo,
                que.quest_title AS questTitle,
                TIME_FORMAT(TIMEDIFF(finished_at, started_at), '%H:%i:%s') AS learning_time
            FROM
                records AS rec
                INNER JOIN quests AS que
                ON rec.quest_id = que.quest_id
                INNER JOIN lerning_references AS ref
                ON rec.reference_id = ref.reference_id
                INNER JOIN teq_categorys AS teq
                ON ref.teq_category_id = teq.category_id
            ORDER BY
                DATE_FORMAT(rec.started_at, '%YYYY年%mm月%dd日') DESC
            LIMIT 25
            EOT;
        }

        $statement = $pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        // foreach ($results as $result)

        $category = $results;
        return $category;
    } catch (PDOException $e) {
        echo "取得失敗";
        return false;
    } finally {
        // 処理なし
    }
}

function renewRecords()
{
    $pdo = dbConnect();

    try {
        $query = file_get_contents('renew.sql');
        $statement = $pdo->prepare($query);
        $statement->execute();

        return true;
    } catch (PDOException $e) {
        echo "更新失敗";
        return false;
    } finally {
        // 処理なし
    }
}

function deleteRecords()
{
    $pdo = dbConnect();

    try {
        $query = file_get_contents('delete.sql');
        $statement = $pdo->prepare($query);
        $statement->execute();

        return true;
    } catch (PDOException $e) {
        echo "削除失敗";
        return false;
    } finally {
        // 処理なし
    }
}

function getPlaytime()
{
    $pdo = dbConnect();

    //トランザクション開始
    $pdo->beginTransaction();
    try {
        //直近一週間分の勉強時間を取得
        $query = <<<EOT
        SELECT
            reported_date AS date,
            learning_per_day AS learning_time
        FROM
            reports
        WHERE
            reported_date BETWEEN  (CURDATE() - INTERVAL 7 DAY) AND (CURDATE() + INTERVAL 1 DAY)
        GROUP BY
            reported_date
        ORDER BY
            reported_date DESC
        LIMIT 7
        EOT;
        $statement = $pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        // $learningTimes = [];
        foreach ($results as $key => $result) {
            $learningTimes[$key]['date'] = $result['date'];
            $learningTimes[$key]['learning_time'] = date('G時間i分', strtotime($result['learning_time']));
        }
        //直近１週間の合計勉強時間を表示
        $query = <<<EOT
        SELECT
            TIME_FORMAT(SUM(TIMEDIFF(finished_at, started_at)), '%H:%i:%s') AS learning_time
        FROM
            records
        WHERE
            started_at BETWEEN  (CURDATE() - INTERVAL 7 DAY) AND (CURDATE() + INTERVAL 1 DAY)
        EOT;
        $statement = $pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $weeklyLearningTime = date('G時間i分', strtotime($result['learning_time']));

        //全学習時間を取得
        $query = <<<EOT
        SELECT
            TIME_FORMAT(SUM(TIMEDIFF(finished_at, started_at)), '%H:%i:%s') AS learning_time
        FROM
            records
        EOT;
        $statement = $pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $totalLearningTime = date('G時間i分', strtotime($result['learning_time']));

        //トランザクションをコミット
        $pdo->commit();
        //leaningTimesは['date']['learning_time]の要素を持ちます。
        return array($learningTimes, $weeklyLearningTime, $totalLearningTime);
    } catch (PDOException $e) {
            $pdo->rollback();
            echo "取得失敗";
        return;
    } finally {
            // 処理なし
    }
}
