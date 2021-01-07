    <!-- <?php
            include('functions.php'); // 関数を記述したファイルの読み込み
            $pdo = connect_to_db(); // 関数実行

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
    <html lang "ja">

    <head>
        <meta charset="utf-8">
        <title>体重グラフ</title>
    </head>

    <body>
        <h1>折れ線グラフ</h1>
        <canvas id="myLineChart"></canvas>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

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

    </body>

    </html> -->