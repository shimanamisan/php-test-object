<?php

namespace SampleAbstract;

use SampleAbstract\AbstractDatabase;

/**
 * SampleAbstract 名前空間内の MySQLDatabase クラス。
 *
 * AbstractDatabase を継承し、MySQLへのクエリを実行する具体的なメソッドを提供します。
 *
 * @package SampleAbstract
 */
class MySQLDatabase extends AbstractDatabase
{
    /**
    * MySQLのDSN文字列。
    *
    * @var string
    */
    public const DSN = "mysql:host=db-devcontainer-mysql-test-object;dbname=mysql_db";

    /**
    * MySQLのユーザ名。
    *
    * @var string
    */
    public const USER = "docker";

    /**
    * MySQLのパスワード。
    *
    * @var string
    */
    public const PASS = "docker";

    /**
    * SQLクエリを実行します。
    *
    * @param string $sql  実行するSQLクエリ。
    * @param array  $data SQLクエリにバインドするデータの配列。
    *
    * @throws \Exception クエリの実行に失敗した場合にスローされます。
    *
    * @return \PDOStatement 実行したクエリのPDOStatementオブジェクト。
    */
    public function query($sql, $data)
    {
        $stmt = $this->connection->prepare($sql);

        // PDO::ERRMODE_EXCEPTION を指定している場合は、SQL構文間違いなどはPDOExceptionをスローする
        if(!$stmt->execute($data)) {
            // メモリ不足など何らかな非例外的な失敗が発生した場合は、以下の例外をスローする
            throw new \Exception("クエリの実行に失敗しました");
        }

        return $stmt;
    }

    /**
     * PDO接続のエラー情報を返します
     *
     * @return mixed エラー情報、または接続が存在しない場合のメッセージ
     */
    public function errorInfo()
    {
        if ($this->connection !== null) {
            // errorInfoの戻り値は配列
            return print_r($this->connection->errorInfo(), true);
        } else {
            return "PDOは保持されていません。";
        }
    }

    /**
     * 直前に挿入された行のIDを返します。
     *
     * @return string 直前の INSERT 操作によって生成されたオートインクリメントID。
     */
    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }
}
