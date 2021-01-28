<?php
//ここでは送信されたデータを受け取りDB関連の処理を実行する

// var_dump($_POST);
// exit();
session_start(); // セッションの開始
include('functions.php'); // 関数ファイル読み込み
check_session_id();

$pdo = connect_to_db(); // DB接続
$username = $_POST['username']; // データ受け取り→変数に入れる
$password = $_POST['password'];

// DBにデータがあるかどうか検索
$sql = 'SELECT * FROM users_table 
 WHERE username=:username
 AND password=:password
 AND is_deleted=0';
//users_tableの中の全件を取ってきて、
//usernameカラムに今送られてきたusernameがあるか
//かつ、passwordカラムに今送られてきたpasswordがあるか
//かつDBに存在するけどユーザーってことよね？ DBに存在するけどユーザー目線で存在しないならis_deleted=1になる
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $val = $stmt->fetch(PDO::FETCH_ASSOC); // 該当レコードだけ取得
    //$stmtに持ってきたレコードの情報入っててfetch関数で該当レコードだけを$valに入れる

    //PDO::FETCH_ASSOCについてググった結果↓
    //●$stmtの中のPDOPDOクラスのfetchメソッド実行
    //●引数のPDO::FETCH_ASSOCは列名を記述し配列で取り出す設定をしている
    //●配列の最後まで下記を実行し続ける
    //（fetch : 取り出す）（Assoc : Associationのこと 連想する）

    if (!$val) { // $valに該当データがないときはログインページへのリンクを表示
        echo "<p>ログイン情報に誤りがあります．</p>";
        echo '<a href="diet_login.php">login</a>';
        exit();
    } else { //成功パターン
        $_SESSION = array(); // セッション変数を空にする
        $_SESSION["session_id"] = session_id(); //session_idは後程ログインしているかを書くのでそこで使いたい　どこだっけ？
        $_SESSION["is_admin"] = $val["is_admin"]; //is_adminは管理者かどうかの判定
        $_SESSION["username"] = $val["username"]; //usernameは　こんにちは○○さん　といった表示もできちゃう　ふむふむ？
        $_SESSION["id"] = $val["id"];
        //この3つの情報を持ったうえでdiet_read.phpにいきますよー
        //この3つの情報のところは自分のアプリで使いたい値を表示しよう
        //$_SESSIONを空にしてほしい情報を$SESSIONに入れて保存
        header("Location:diet_read.php"); // 一覧ページへ移動
        exit();
    }
}
