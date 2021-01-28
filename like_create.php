<?php
// まずはこれ
// var_dump($_GET);
// exit();

// ここのファイルではいいね機能全部だと思っている

// 送信確認
session_start();
include("functions.php");
check_session_id(); // 関数ファイルの読み込み

// 受け取ったデータを変数に入れる
$user_id = $_GET['user_id'];
$weight_id = $_GET['weight_id'];

// DB接続
$pdo = connect_to_db();

// いいね状態のチェック（COUNTで件数を取得できる！）
$sql = 'SELECT COUNT(*) FROM like2_table WHERE user_id=:user_id AND weight_id=:weight_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':weight_id', $weight_id, PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し、以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $like_count = $stmt->fetch();
    // var_dump($like_count[0]); // データの件数を確認しよう！
    // exit();
    // いいねしていれば削除、していなければ追加のSQLを作成
    if ($like_count[0] != 0) {
        // いいねされている条件
        $sql = 'DELETE FROM like2_table WHERE user_id=:user_id AND weight_id=:weight_id';
    } else {
        // いいねされていない条件    
        $sql = 'INSERT INTO like2_table(id, user_id, weight_id, created_at) VALUES(NULL, :user_id, :weight_id, sysdate())';
    }
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':weight_id', $weight_id, PDO::PARAM_INT);
    $status = $stmt->execute();

    if ($status == false) {
        // エラー処理
        $error = $stmt->errorInfo();
        echo json_encode(["error_msg" => "{$error[2]}"]);
        exit;
    } else {
        header('Location:diet_read.php');
        exit();
    }
}
