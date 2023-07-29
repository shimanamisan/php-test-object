<?php

namespace SampleAbstract;

use SampleAbstract\AbstractDatabase;

/**
 * SampleAbstract 名前空間内の PostgreSQLDatabase クラス。
 *
 * AbstractDatabase を継承し、PostgreSQLへのクエリを実行する具体的なメソッドを提供します。
 *
 * @package SampleAbstract
 */
class PostgreSQLDatabase extends AbstractDatabase
{
    /**
    * PostgreSQLのDSN文字列。
    *
    * @var string
    */
    public const DSN = "pgsql:host=db-devcontainer-postgres-test-object;dbname=postgres_db";

    /**
    * PostgreSQLのユーザ名。
    *
    * @var string
    */
    public const USER = "postgres";

    /**
    * PostgreSQLのパスワード。
    *
    * @var string
    */
    public const PASS = "rootpass";

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
     * 指定されたシーケンスの現在の値を返します。
     *
     * @param string $seq 対象のシーケンス名。
     *
     * @return string 対象のシーケンスの現在の値。
     */
    public function lastInsertId($seq)
    {
        return $this->connection->lastInsertId($seq);
    }
}
