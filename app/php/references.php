<?php

function insertReferences()
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

function getLearningReferencesTitle()
{
    $count = 0;
    $pdo = dbConnect();

    try {
        $query = 'SELECT reference_title FROM lerning_references';
        $statement = $pdo->prepare($query);
        $statement->execute();

        while ($result = $statement->fetch(PDO::FETCH_ASSOC)) {
            //教材のリストを作成
            $list[$count] = $result['reference_title'];
            $count++;
        }

        return $list;
    } catch (PDOException $e) {
        echo "取得失敗";
        return $e;
    } finally {
        // 処理なし
    }
}
