<?php

$value = $_SERVER['REQUEST_METHOD'] === 'POST' ? $_POST : $_GET;

?>

<?php

$siteTitle = 'MyPage';
require './Common/head.php';

?>

<body>
    <div class="container mt-5">
        <h1> <?php echo $_SERVER['REQUEST_METHOD'] === 'POST' ? 'POSTメソッド' : 'GETメソッド'; ?> </h1>

        <div>
            <?php print_r($value) ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    </div>
</body>

</html>