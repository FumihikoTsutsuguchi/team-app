<?php require_once("./header.php"); ?>

<div class="c-wrapper">
    <div class="c-nav-breadcrumb">
        <ol>
            <li><a href="">TOP</a></li>
            <li>QUEST一覧</li>
        </ol>
    </div>
    <div class="p-quest-list">
        <h2 class="c-heading">QUEST 一覧</h2>
        <div class="p-quest-list__select">
            <h3>QUEST</h3>
            <details>
                <?php
                /* [TODO]
                こちらの<details>内にある<button>(各QUESTの詳細)のテキスト情報についてはデータベースで管理する
                1/23時点では、一旦静的テキストを配置
                */
                ?>
                <summary>PHP</summary>
                <div class="p-quest-list__select-content">
                    <h4>1. Skill Doc を読む</h4>
                    <ul>
                        <li><button>QUEST i [学習力][Level1] 続的に学習時間を確保できる</button></li>
                        <li><button>QUEST ii [実装力][Level1] コードを手元で動かすことができる</button></li>
                        <li><button>QUEST iii [実装力][Level2] コードを書く手順を理解している</button></li>
                        <li><button>QUEST iv PHP</button></li>
                    </ul>
                </div>
                <div class="p-quest-list__select-content">
                    <h4>2. QUEST を解く</h4>
                    <ul>
                        <li><button>QUEST i [学習力][Level1] 続的に学習時間を確保できる</button></li>
                        <li><button>QUEST ii [実装力][Level1] コードを手元で動かすことができる</button></li>
                        <li><button>QUEST iii [実装力][Level2] コードを書く手順を理解している</button></li>
                        <li><button>QUEST iv [PHP][Level1] 関数を自作し使うことができる</button></li>
                        <li><button>QUEST v [PHP][Level1] 変数を宣言し代入することができる</button></li>
                        <li><button>QUEST vi [PHP][Level1] 条件分岐を使うことができる</button></li>
                        <li><button>QUEST vii [PHP][Level1] 繰り返し処理を行うことができる</button></li>
                        <li><button>QUEST viii [PHP][Level2] 配列関数を使い繰り返し処理を行うことができる(advanced)</button></li>
                        <li><button>QUEST ix [PHP][Level2] オブジェクト指向が何かを説明できる</button></li>
                        <li><button>QUEST x [PHP][Level2] オブジェクト指向を使うことができる</button></li>
                        <li><button>QUEST xi [PHP][Level2] 継承を使うことができる(advanced)</button></li>
                        <li><button>QUEST xii [PHP][Level2] 例外処理を使うことができる</button></li>
                        <li><button>QUEST xiii [PHP][Level2] 外部ライブラリを使うことができる(advanced)</button></li>
                        <li><button>QUEST xiv [PHP][Level2] デバッガを活用してデバッグができる(advanced)</button></li>
                        <li><button>QUEST xv [PHP][Level2] 静的解析ツールを使うことができる(advanced)</button></li>
                    </ul>
                </div>
                <div class="p-quest-list__select-content">
                    <h4>3. 提出 QUEST を提出する</h4>
                    <ul>
                        <li><button>QUEST i ブラックジャックゲーム</button></li>
                    </ul>
                </div>
            </details>
            <details>
                <summary>データベース/SQL</summary>
                <div class="p-quest-list__select-content">
                    <h4>1. Skill Doc を読む</h4>
                    <ul>
                        <li><button>QUEST i [やりきる力][Level2] 納期を守ることができる</button></li>
                        <li><button>QUEST ii [コミュニケーション][Level2] 読みやすいドキュメントを書ける</button></li>
                        <li><button>QUEST iii データベース</button></li>
                        <li><button>QUEST iv SQL</button></li>
                        <li><button>QUEST v 拡張性</button></li>
                        <li><button>QUEST vi パフォーマンス</button></li>
                    </ul>
                </div>
                <div class="p-quest-list__select-content">
                    <h4>2. QUEST を解く</h4>
                    <ul>
                        <li><button>QUEST i [コミュニケーション][Level2] 読みやすいドキュメントを書ける</button></li>
                        <li><button>QUEST ii [データベース][Level1] データベース関連の基本的な用語を説明できる</button></li>
                        <li><button>QUEST iii [SQL][Level1] データベースを作成・指定・削除できる</button></li>
                        <li><button>QUEST iv [SQL][Level1] ユーザーを作成・権限付与・削除できる</button></li>
                        <li><button>QUEST v [SQL][Level1] テーブルを作成・修正・削除できる</button></li>
                        <li><button>QUEST vi [SQL][Level1] データを登録・検索・更新・削除できる</button></li>
                        <li><button>QUEST vii [SQL][Level2] データを検索できる</button></li>
                        <li><button>QUEST viii [SQL][Level2] データを絞り込むことができる</button></li>
                        <li><button>QUEST ix [SQL][Level2] 検索結果の並び替えができる</button></li>
                        <li><button>QUEST x [SQL][Level2] データを集計できる</button></li>
                        <li><button>QUEST xi [SQL][Level2] データをグルーピングできる</button></li>
                        <li><button>QUEST xii [SQL][Level2] テーブルを結合できる</button></li>
                        <li><button>QUEST xiii [SQL][Level2] スタイルガイドに則ってクエリを書ける</button></li>
                        <li><button>QUEST xiv [SQL][Level3] サブクエリを使うことができる(advanced)</button></li>
                        <li><button>QUEST xv [SQL][Level3] 条件分岐ができる(advanced)</button></li>
                        <li><button>QUEST xvi [SQL][Level3] 実行計画を確認できる(advanced)</button></li>
                        <li><button>QUEST xvii [SQL][Level3] N＋1問題の対策ができる(advanced)</button></li>
                        <li><button>QUEST xviii [データベース][Level2] データベース設計の流れを説明できる</button></li>
                        <li><button>QUEST xix [データベース][Level2] エンティティを定義できる</button></li>
                        <li><button>QUEST xix [データベース][Level2] エンティティを定義できる</button></li>
                        <li><button>QUEST xx [データベース][Level2] データベースを正規化できる</button></li>
                        <li><button>QUEST xxi [データベース][Level2] ER 図を書くことができる</button></li>
                        <li><button>QUEST xxii [データベース][Level2] テーブルを定義できる</button></li>
                        <li><button>QUEST xxiii [データベース][Level2] インデックスを設定できる</button></li>
                        <li><button>QUEST xxiv [データベース][Level3] トランザクションについて説明できる(advanced)</button></li>
                        <li><button>QUEST xxv [データベース][Level3] 同時実行制御について説明できる(advanced)</button></li>
                    </ul>
                </div>
                <div class="p-quest-list__select-content">
                    <h4>3. 提出 QUEST を提出する</h4>
                    <ul>
                        <li><button>QUEST i インターネットTV</button></li>
                    </ul>
                </div>
            </details>
        </div>
        <div class="c-archive">
            <ul>
                <li>
                    <button class="c-archive-button">
                        <div class="c-archive-content">
                            <span>PHP</span>
                            <p>QUEST i [学習力][Level1] 続的に学習時間を確保できる</p>
                        </div>
                        <time>00:40:00</time>
                    </button>
                </li>
                <li>
                    <button class="c-archive-button">
                        <div class="c-archive-content">
                            <span>PHP</span>
                            <p>QUEST ii [実装力][Level1] コードを手元で動かすことができる</p>
                        </div>
                        <time>02:40:00</time>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</div>
