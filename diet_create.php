<?php

//ここはデータを作成するファイルで、画面はない

session_start(); // セッションの開始
include('functions.php'); // 関数ファイル読み込み
check_session_id(); // idチェック関数の実行

// 項目入力のチェック
// 値が存在しないor空で送信されてきた場合はNGにする
if (
    !isset($_POST['weight']) || $_POST['weight'] == '' ||
    !isset($_POST['snack_flag']) || $_POST['snack_flag'] == ''
) {
    // 項目が入力されていない場合はここでエラーを出力し，以降の処理を中止する
    echo json_encode(["error_msg" => "no input"]);
    exit();
} // 受け取ったデータを変数に入れる
$weight = $_POST['weight'];
$snack_flag = $_POST['snack_flag'];
// include('functions.php'); // 関数を記述したファイルの読み込み
$pdo = connect_to_db(); // 関数実行
// データ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql = 'INSERT INTO diet_table(id, weight, snack_flag, created_at, updated_at)
VALUES(NULL, :weight, :snack_flag, sysdate(), sysdate())';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':weight', $weight, PDO::PARAM_INT);
$stmt->bindValue(':snack_flag', $snack_flag, PDO::PARAM_INT);
$status = $stmt->execute();
// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    header("Location:diet_input.php");
    exit();
}
