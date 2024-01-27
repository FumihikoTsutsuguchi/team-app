<?php

function insertReferences(string $title, int $teqCategoryId)
{
    $pdo = dbConnect();

    try {
        $query = <<<EOT
            INSERT INTO lerning_references (
                reference_title,
                teq_category_id
            )
            VALUES (
                :reference_title,
                :teq_category_id
            )
        EOT;
        $statement = $pdo->prepare($query);
        $statement->bindValue(':reference_title', $title, PDO::PARAM_STR);
        $statement->bindValue(':teq_category_id', $teqCategoryId, PDO::PARAM_INT);
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
