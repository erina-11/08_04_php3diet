<?php
// var_dump($_GET);
// exit();
session_start(); // セッションの開始
include('functions.php'); // 関数ファイル読み込み
check_session_id(); // idチェック関数の実行

$id = $_GET['id'];

// include('functions.php');
$pdo = connect_to_db();

$sql = 'DELETE FROM diet_table WHERE id =:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常に実行された場合は一覧ページファイルに移動し，処理を実行する
    header("Location:diet_read.php");
    exit();
}
