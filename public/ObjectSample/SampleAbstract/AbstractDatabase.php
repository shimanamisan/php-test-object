<?php

namespace SampleAbstract;

use PDO;

/**
 * SampleAbstract 名前空間に存在する抽象データベースクラス
 *
 * この抽象クラスは、具体的なデータベース接続とクエリの実行に関する基本的な機能を提供します。
 * 子クラスは query メソッドを必ず実装する必要があります。
 *
 * @package SampleAbstract
 */
abstract class AbstractDatabase
{
    /**
     * PDO オブジェクトを保持します。
     *
     * @var PDO
     */
    protected $connection;

    /**
    * データベースへの接続を行います。
    *
    * @param string $dns      接続するデータベースのDSN。
    * @param string $username データベース接続に使用するユーザ名。
    * @param string $password データベース接続に使用するパスワード。
    * @param array  $option   PDOのオプション配列。
    *
    * @return void
    */
    public function connect($dns, $username, $password, $option)
    {
        $this->connection = new PDO($dns, $username, $password, $option);
    }

    /**
    * データベースからの切断を行います。
    *
    * @return void
    */
    public function disconnect()
    {
        $this->connection = null;
    }

    /**
    * データベースからエラー情報を取得します。
    *
    * @return array PDO::errorInfo()から返されるエラー情報を含む配列。
    */
    protected function errorLog()
    {
        return $this->connection->errorInfo();
    }

    /**
    * クエリを実行します。
    * このメソッドは、具体的な実装を持たない抽象メソッドであり、子クラスでの実装が必要です。
    *
    * @param string $query クエリ文字列。
    * @param array  $data  クエリにバインドするデータの配列。
    *
    * @return mixed 子クラスにより定義される。
    */
    abstract public function query($query, $data);
}
