<?php

include('functions.php'); // 関数を記述したファイルの読み込み

$pdo = connect_to_db(); // 関数実行

// データ取得SQL作成
$sql = 'SELECT * FROM diet_table';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    // fetchAll()関数でSQLで取得したレコードを配列で取得できる
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
    $output = "";
    // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
    // `.=`は後ろに文字列を追加する，の意味
    foreach ($result as $record) {
        $output .= "<tr>";
        $output .= "<td>{$record["weight"]}</td>";
        $output .= "<td>{$record["snack"]}</td>";
        // var_dump($output);
        // exit();
        // edit deleteリンクを追加
        $output .= "<td>
       <a href='diet_edit.php?id={$record["id"]}'>edit</a>
       </td>";
        $output .= "<td>
       <a href='diet_delete.php?id={$record["id"]}'>delete</a>
       </td>";
        $output .= "</tr>";
    }
    // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
    // 今回は以降foreachしないので影響なし
    unset($record);
}

$date = '';
$weight = '';

//2．データ登録SQL作成
//prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
$stmt = $pdo->prepare("SELECT* FROM diet_table");
$status = $stmt->execute();

//loop through the returned data
while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $date = $date . '"' . $r['created_at'] . '",';
    $weight = $weight . '"' . $r['weight'] . '",';
}

$date = trim($date, ",");
$weight = trim($weight, ",");
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB連携型DIET管理（一覧画面）</title>
</head>

<body>
    <h1>Let's enjoy the diet together!!!</h1>
    <canvas id="myLineChart"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <p> </p>

    <script>
        let ctx = document.getElementById("myLineChart");
        let myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?php echo $date ?>],

                datasets: [{
                        label: '体重',
                        data: [<?php echo $weight ?>],
                        borderColor: "rgba(255,0,0,1)",
                        backgroundColor: "rgba(0,0,0,0)"
                    },

                    // {
                    //     label: '最低気温(度）',
                    //     data: [25, 27, 27, 25, 26, 27, 25, 21],
                    //     borderColor: "rgba(0,0,255,1)",
                    //     backgroundColor: "rgba(0,0,0,0)"
                    // }
                ],
            },
            options: {
                title: {
                    display: true,
                    text: ''
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMax: 100,
                            suggestedMin: 0,
                            stepSize: 10,
                            callback: function(value, index, values) {
                                return value + 'kg'
                            }
                        }
                    }],
                    // xAxes: [{
                    //     type: 'date',
                    //     time: {
                    //         unit: 'day'
                    //     }
                    // }]
                },
            }
        });
        console.log(myLineChart);
    </script>



    <fieldset>
        <legend>DB連携型DIET管理（一覧画面）</legend>
        <a href="diet_input.php">入力画面</a>
        <table>
            <thead>
                <tr>
                    <th>weight</th>
                    <th>snack</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
                <?= $output ?>
            </tbody>
        </table>
    </fieldset>
</body>

</html>