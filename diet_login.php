<!DOCTYPE html>
<html lang="ja">

<!-- ログイン情報（id pwd）を入力して送信 -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIET管理ログイン画面</title>

    <!-- <style>
        #home {
            background-image: url(siora-photography-cixohzDpNIo-unsplash.jpg);
            background-size: 120%;
            min-height: 100vh;
            max-width: 800px;
            margin: auto;
            padding: auto;
        }

        .wrapper {}

        h1 {
            text-align: center;
            margin-top: 50px;
        }
    </style> -->
</head>

<body>
    <!-- <div id="home"> -->
    <!-- <header class="wrapper"> -->
    <!-- <h1 class="page_title">DIET LOGIN</h1> -->
    <form action="diet_login_act.php" method="POST">
        <!-- <fieldset>
                    <legend>DIETログイン画面</legend>
                    <div>
                        <label for="username">name</label>
                        <input type="text" name="username">
                    </div>
                    <div>
                        <label for="password">password</label>
                        <input type="text" name="password">
                    </div>
                    <div>
                        <button>login</button>
                    </div>
                    <a href="diet_register.php">or register</a>
                </fieldset> -->
        <fieldset>
            <legend>DIETリストログイン画面</legend>
            <div>
                username: <input type="text" name="username">
            </div>
            <div>
                password: <input type="text" name="password">
            </div>
            <div>
                <button>Login</button>
            </div>
            <a href="diet_register.php">or register</a>
        </fieldset>
    </form>
    </div>
    <!-- </div> -->
</body>

</html>