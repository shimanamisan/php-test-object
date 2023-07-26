<?php

require __DIR__ . '/../vendor/autoload.php';

use SampleAbstract\SQLServer;
use SampleAbstract\AbstractClass;
use SampleAbstract\MySQLDatabase;
use SampleAbstract\PostgreSQLDatabase;

class ConcreteClass1 extends AbstractClass
{
    // スーパークラスが protected であれば、サブクラスでは public と指定することが出来る
    public function getValue(): string
    {
        return "ConcreteClass1";
    }

    public function prefixValue($prefix): string
    {
        return "{$prefix}ConcreteClass1";
    }
}

$class1 = new ConcreteClass1();
$class1->printOut();
// $class1->getValue(); // protected が指定されているメソッドは外部からは呼び出せない
echo $class1->prefixValue('FOO_') ."\n";

/******************************
 * MySQLを使用した実装
*******************************/
$mysql = new MySQLDatabase();
// PDOオブジェクトへ渡すオプションを連想配列で指定
$option = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
];

try {

    // 抽象クラスで実装さている、データベースへ接続する処理を実行する
    $mysql->connect(MySQLDatabase::DSN, MySQLDatabase::USER, MySQLDatabase::PASS, $option);

    $sql = 'INSERT INTO users (username, password) VALUES(:username, :password)';

    $data = [':username' => "test01", ':password' => password_hash("123456789", PASSWORD_DEFAULT)];

    $stmt = $mysql->query($sql, $data);

    if($stmt) {

        echo "mysql: データのインサートが成功しました。\n";

        $lastId = $mysql->lastInsertId();

        echo "mysql: インサートしたレコードのIDは {$lastId} です。\n";
    }

} catch(PDOException $pdoE) {

    echo "mysql: PDOException -> " . $pdoE->getMessage() . "\n";

    echo "mysql: " . $mysql->errorInfo() . "\n";

} catch(Exception $e) {

    echo "mysql: " . $e->getMessage();

} finally {

    // データベースとの接続を切断
    $mysql->disconnect();
}


/******************************
 * PostgreSQLを使用した実装
*******************************/
$postgres = new PostgreSQLDatabase();
// PDOオブジェクトへ渡すオプションを連想配列で指定
$option = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {

    // 抽象クラスで実装さている、データベースへ接続する処理を実行する
    $postgres->connect(PostgreSQLDatabase::DSN, PostgreSQLDatabase::USER, PostgreSQLDatabase::PASS, $option);

    $sql = 'INSERT INTO users (username, password) VALUES(:username, :password)';

    $data = [':username' => "test01", ':password' => password_hash("123456789", PASSWORD_DEFAULT)];

    $stmt = $postgres->query($sql, $data);

    if($stmt) {

        echo "postgres: データのインサートが成功しました。\n";

        // シーケンス名を指定して最後に挿入されたIDを取得
        // シーケンス名は通常 "[テーブル名]_[idカラム名]_seq" の形式
        $lastId = $postgres->lastInsertId('users_id_seq');

        echo "postgres: インサートしたレコードのIDは {$lastId} です。\n";
    }

} catch(PDOException $pdoE) {

    echo "postgres: PDOException -> " . $pdoE->getMessage() . "\n";

    echo "postgres: " . $postgres->errorInfo() . "\n";

} catch(Exception $e) {

    echo "postgres: " . $e->getMessage();

} finally {

    // データベースとの接続を切断
    $postgres->disconnect();
}

/******************************
 * SQL Serverを使用した実装
*******************************/
$sqlserver = new SQLServer();
// PDOオブジェクトへ渡すオプションを連想配列で指定
$option = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {

    // 抽象クラスで実装さている、データベースへ接続する処理を実行する
    // SSL証明書の検証を無視する設定を追加
    $sqlserver->connect(SQLServer::DSN, SQLServer::USER, SQLServer::PASS, $option);

    $sql = 'INSERT INTO users (username, password) VALUES(:username, :password)';

    $data = [':username' => 'test01', ':password' => password_hash("123456789", PASSWORD_DEFAULT)];

    $stmt = $sqlserver->query($sql, $data);

    if($stmt) {

        echo "sqlserver: データのインサートが成功しました。\n";

        // シーケンス名を指定して最後に挿入されたIDを取得
        // シーケンス名は通常 "[テーブル名]_[idカラム名]_seq" の形式
        $lastId = $sqlserver->lastInsertId();

        echo "sqlserver: インサートしたレコードのIDは {$lastId} です。\n";
    }

} catch(PDOException $pdoE) {

    echo "sqlserver: PDOException -> " . $pdoE->getMessage() . "\n";

    echo "sqlserver: " . $sqlserver->errorInfo() . "\n";

} catch(Exception $e) {

    echo "sqlserver: " . $e->getMessage() . "\n";

} finally {

    // データベースとの接続を切断
    $sqlserver->disconnect();
}
