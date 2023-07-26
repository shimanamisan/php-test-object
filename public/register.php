<?php

$siteTitle = "ユーザー登録機能";
require("./Common/head.php");

?>

<body>
    <div class="container mt-5">
        <h1 class="col-sm-6 offset-sm-4 mb-5"><?php echo $siteTitle ?></h1>

        <form method="post" action="" class="col-sm-6 offset-sm-4">
            <div class="row mb-3">
                <label for="name" class="col-sm-3 col-form-label">名前</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">メールアドレス</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-3 col-form-label">パスワード</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="confirmPassword" class="col-sm-3 col-form-label">パスワード確認</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="confirmPassword" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">登録</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"crossorigin="anonymous"></script>
</body>

</html>