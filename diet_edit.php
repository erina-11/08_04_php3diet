<?php

// var_dump($_GET);
// exit();
session_start(); // セッションの開始
include('functions.php'); // 関数ファイル読み込み
check_session_id(); // idチェック関数の実行
// 送信されたidをgetで受け取る
$id = $_GET['id'];
// 関数ファイル読み込み
// include("functions.php");
// DB接続&id名でテーブルから検索
$pdo = connect_to_db();
$sql = 'SELECT * FROM diet_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// fetch()で1レコード取得できる．
if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB連携型DIET管理（編集画面）</title>
</head>

<body>
    <form action="diet_update.php" method="POST">
        <fieldset>
            <legend>DB連携型DIET管理（編集画面）</legend>
            <a href="diet_read.php">一覧画面</a>

            <div>
                weight: <input type="number" name="weight" value="<?= $record["weight"] ?>">
            </div>

            <div>
                snack: <label><input type="radio" checked name="snack" value="1">〇</label>
                <label><input type="radio" name="snack" value="0">✕</label>
                <div>
                    <button>submit</button>
                </div>
                <input type="hidden" name="id" value="<?= $record['id'] ?>">
        </fieldset>
    </form>

</body>

</html>