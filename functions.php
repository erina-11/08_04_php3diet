<?php

function connect_to_db()
{
    $dbn = 'mysql:dbname=gsacf_d07_04;charset=utf8;
 port=3306;host=localhost';
    $user = 'root';
    $pwd = '';
    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        echo json_encode(['dbError' => "{$e->getMessage()}"]);
        exit();
    }
}

// ログインしているかどうかのチェック→毎回id再生成
function check_session_id()
{
    // 失敗時はログイン画面に戻る
    if (
        !isset($_SESSION['session_id']) || // session_idがない
        $_SESSION['session_id'] != session_id() // idが一致しない
    ) {
        header('Location: diet_login.php'); // ログイン画面へ移動
    } else {
        session_regenerate_id(true); // セッションidの再生成
        $_SESSION['session_id'] = session_id(); // セッション変数上書き
    }
}
