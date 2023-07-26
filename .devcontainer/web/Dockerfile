
FROM php:8.1.20-apache-bullseye

# パッケージの更新及び必要ソフトのインストール
RUN apt-get update && apt-get install -y gnupg \
    && apt-get --no-install-recommends -qq -y install locales apt-transport-https gpg apt-transport-https libltdl-dev \
    # mssql odbc driver
    && curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl https://packages.microsoft.com/config/debian/11/prod.list > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get -qq -y update \
    && ACCEPT_EULA=Y apt-get install -y msodbcsql18 mssql-tools18 unixodbc-dev \
    && apt-get install -y --allow-downgrades odbcinst=2.3.7 odbcinst1debian2=2.3.7 unixodbc=2.3.7 unixodbc-dev=2.3.7 \
    && apt-get install -yqq zlib1g-dev libpq-dev libzip-dev mariadb-client unzip zip tree \
    # SQLServerに接続するためにの依存関係 locales apt-transport-https gpg 
    # ↓ Microsoft SQL Server Prerequisites
    &&  echo "ja_JP.UTF-8 UTF-8" > /etc/locale.gen \
    && locale-gen \
    # ↑
    && docker-php-ext-install pdo pdo_mysql mysqli pdo_pgsql pgsql \
    # rewriteモジュールを有効化
    && a2enmod rewrite \
    && docker-php-ext-enable mysqli \
    # Install SQL Server extensions
    # xdebug install
    # SQLServer に接続する為に、sqlsrv と pdo_sqlsrv という2つのPHP拡張機能をインストール
    && pecl install sqlsrv \
    && pecl install pdo_sqlsrv \
    # 以下のように実行していたらエラーになる
    # pecl install xdebug sqlsrv-5.9.0preview pdo_sqlsrv-5.9.0preview && \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug sqlsrv pdo_sqlsrv

# Composer Install
# 公式の Composer イメージを利用
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# rootユーザー実行した際に警告が出ないようにする
ENV COMPOSER_ALLOW_SUPERUSER 1
# Composerのホームディレクトリを変更
ENV COMPOSER_HOME /composer
# コマンドが実行できるようにパスを通す
ENV PATH $PATH:/composer/vendor/bin

# ワークディレクトリを作成
WORKDIR /workspace

# ユーザーの追加
RUN useradd -m -s /bin/bash user01

# Xebugで使用するログファイルの作成とファイルへのアクセス権限を付与する
RUN touch /var/log/xdebug.log && \
    chown user01:user01 /var/log/xdebug.log && \
    chmod 755 /var/log/xdebug.log