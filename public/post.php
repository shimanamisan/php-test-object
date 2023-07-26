<?php

$siteTitle = 'POST';
require './Common/head.php';

?>

<body>
    <div class="container mt-5">
    <h1>POST方式</h1>

    <form method="post" action="mypage.php">
        <input type="text" name="name">
        <button class="btn btn-primary" type="submit">送信</button>
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>