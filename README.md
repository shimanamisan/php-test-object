# php-test-object

[![PHP](https://img.shields.io/badge/PHP-8.1.20-red.svg)](https://www.php.net/downloads.php)
[![Docker](https://img.shields.io/badge/Docker-24.0.2-red.svg)](https://docs.docker.com/engine/release-notes/24.0/)
[![License](https://img.shields.io/badge/License-MIIT-blue.svg)](https://licenses.opensource.jp/MIT/MIT.html)

# 概要

PHP でオブジェクト指向について検証しているリポジトリです。

# 目的

オブジェクト指向の基本的な構文や動作などを学習することを目的としています。

公式ドキュメントを参考に、全てではないですが実際にコードを書きながら検証しました。
また、その内容を以下のブログ記事にまとめています。

- [【PHP】ざっくりオブジェクト指向について①](https://blog.hn-pgtech.com/2019-09-24/)
- [【PHP】ざっくりオブジェクト指向について②](https://blog.hn-pgtech.com/2019-09-29/)
- [【PHP】ざっくりオブジェクト指向について③](https://blog.hn-pgtech.com/2019-10-05/)

# 使用方法

Docker と VS Code の拡張機能 Devcontainer を使用することを前提としています。

1. 適当な作業ディレクトリで、以下のコマンドを実行します。
```bash
$ git clone git@github.com:shimanamisan/php-test-object.git
```

2. コンテナ起動時に読み込まれる.envファイルの設定

    `.devcontainer`ディレクトリ内の`.env.example`をコピーし`.env`へリネームします。

    以下はサンプルです。そのままコピペしても動作しますが、適宜設定を変更して下さい。
    
    ```bash
    # apache
    VIRTUAL_HOST=test.example.com

    # mysql
    TIME_ZONE=Asia/Tokyo
    MYSQL_DATABASE=mysql_db
    MYSQL_USER=docker
    MYSQL_PASSWORD=docker
    MYSQL_ROOT_PASSWORD=rootpass

    # postgresql
    POSTGRES_DB=postgres_db
    POSTGRES_PASSWORD=rootpass # rootユーザーのパスワード

    # sqlserver
    # 使用許諾契約書の承諾を設定
    ACCEPT_EULA=Y
    # SA ユーザーのパスワードを構成（パスワードポリシーを満たさないとコンテナが起動しない）
    MSSQL_SA_PASSWORD=Hn_Pgtech1234
    # SQL Serverのエディションを指定（Enterprise、Standard、Web、Developer、Expresから選択
    MSSQL_PID=Express
    # ロケーションを指定
    MSSQL_LCID=1041
    # 照合順序を指定
    MSSQL_COLLATION=Japanese_CI_AS

    # phpmyadmin
    PMA_ARBITRARY=1
    PMA_HOSTS=db-devcontainer-mysql-test-object
    PMA_USER=docker
    PMA_PASSWORD=docker
    VIRTUAL_HOST_PHPMYADMIN=admin.example.com
    ```

3. `C:\Windows\System32\drivers\etc`内の`host`ファイルに以下の内容を追記します。

    ```bash
    127.0.0.1   test.example.com
    127.0.0.1   admin.example.com
    ```

    これは、`.env`ファイルで指定した`VIRTUAL_HOST`のドメインです。

4. `php-test-object`を VS Code で開き、`F1`キーでコマンドパレット開き、開発コンテナを起動します。
![スクリーンショット 2023-07-30 093122](https://github.com/shimanamisan/php-test-object/assets/49751604/8f2b59ca-8205-494d-9b47-dc385b03ccb0)

5. VS Code のターミナルを開き、起動したコンテナにアタッチされていることを確認します。
![スクリーンショット 2023-07-30 095036](https://github.com/shimanamisan/php-test-object/assets/49751604/401d5ef6-5fa0-4e2a-baf2-698f300c5124)

6. 必要なライブラリをインストールします
    ```bash
    $ cd public
    $ composer install
    ```

7. `public/ObjectSample`ディレクトリ配下の php ファイルを実行します。
    ```bash
    $ cd ObjectSample
    
    # サンプルファイル
    $ php index.php
    
    # 抽象クラスや静的メンバーに関するファイル（データベースへ接続します）
    $ php sampleAbstract.php

    # クラス定数に関するファイル
    $ php sampleConst.php

    # インターフェースに関するファイル
    $ php sampleInterface.php
    ```

# 注意点

このリポジトリでは、Docker コンテナで、MySQL、PostgreSQL、SQLServer を起動しています。MySQL と PostgreSQL では、コンテナ起動時に`users`テーブルを作成するスクリプトを実行しています。

SQLServer では、コンテナ起動時は`users`テーブルが作成されていませんので、以下のSQLを実行してテーブルを作成してください。

直接コンテナ内に接続するか、[DBeaver](https://dbeaver.io/)などを使用して接続して以下のSQLを実行してください。

```SQL
CREATE TABLE users (
    id INT IDENTITY(1,1) PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT GETDATE(),
    updated_at DATETIME
);
```