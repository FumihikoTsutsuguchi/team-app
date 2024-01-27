- 初期化
  mysql -u root -p < ./docker-entrypoint-initdb.d/initialize_db.sql

- ログイン
  mysql -u devuser -p -D appque

- devuser のパスワード
  `ppp`

## レコード登録するときのクエリ

INSERT INTO records (quest_id,reference_id) VALUES (1,11);

## 学習を終了したときに終了時間を登録するクエリ

UPDATE
    records
SET
    finished_at = DEFAULT
WHERE
    started_at = finished_at;
