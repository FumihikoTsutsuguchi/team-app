<?php

function getAvatarId($get)
{
    $pdo = dbConnect();
    $pdo->beginTransaction();
    try {
        $query = 'SELECT avatar_id FROM avatars WHERE file_name = :avatarName';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':avatarName', $post['avatar'] . '.png', PDO::PARAM_STR);
        $statement->execute();
        $pdo->commit();

        return $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "取得失敗";
        return $e;
    } finally {
        // 処理なし
    }
}

function setAvatarIdToPlayers($post)
{
    $pdo = dbConnect();

    //トランザクション開始
    $pdo->beginTransaction();

    try {
        //設定したいアバターのidを取得
        $query = 'SELECT avatar_id FROM avatars WHERE file_name = :avatarName';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':avatarName', $post['avatar'] . '.png', PDO::PARAM_STR);
        $statement->execute();
        $avatar_id = $statement->fetch(PDO::FETCH_ASSOC);

        //取得したavatar_idをplayersへ格納
        $query = 'UPDATE players SET current_avatar_id = :avatar_id';
        $statement2 = $pdo->prepare($query);
        $statement2->bindValue(':avatar_id', $avatar_id, PDO::PARAM_INT);
        $statement2->execute();

        //トランザクションをコミット
        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollback();
        echo "更新失敗";
    } finally {
        // 処理なし
    }
}
