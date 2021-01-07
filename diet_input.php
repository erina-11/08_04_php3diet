<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB連携型DIET管理（入力画面）</title>
</head>

<body>
    <form action="diet_create.php" method="POST">
        <fieldset>
            <legend>DB連携型DIET管理（入力画面）</legend>
            <a href="diet_read.php">一覧画面</a>
            <div>
                weight: <input type="number" name="weight">
            </div>
            <div>
                snack: <label><input type="radio" name="snack" value="1">〇</label>
                <label><input type="radio" name="snack" value="0">✕</label>
            </div>
            <div>
                <button>submit</button>
            </div>
        </fieldset>
    </form>

</body>

</html>