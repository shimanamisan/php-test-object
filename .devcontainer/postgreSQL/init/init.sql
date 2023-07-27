-- users テーブルが存在しなければ作成する
CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- データベースが存在するかどうかをチェックする匿名ブロック
-- DO $$ BEGIN ... END $$; の形式で作成する
DO
-- 「$$」記号はクォーティングと呼ばれるもの。ドル記号クオーティングは、文字列リテラルを囲むための方法で、特に関数本体や長い文字列を記述する際に便利
-- $$ 記号を使用すると、文字列にシングルクォーテーションが合った場合にエスケープ文字列を記載しなくても良い（'It\'s a beautiful day' → $$It's a beautiful day$$）
$$
BEGIN
    -- EXISTS句は、括弧内のサブクエリが少なくとも一つの行を返す場合に真を返す
    IF EXISTS (
        -- 指定したテーブル名のテーブルがデータベース内に存在するかどうかを確認する
        SELECT FROM information_schema.tables 
        WHERE table_name = 'users' AND table_schema = 'public'
    ) THEN
        -- テーブルが存在する場合、以下の関数を作成する
        -- この関数は、トリガーとして使用され、レコードが更新されるたびにそのレコードのupdated_atカラムを現在の時間に更新する
        CREATE OR REPLACE FUNCTION update_timestamp()
        RETURNS TRIGGER AS $function$
        BEGIN
           NEW.updated_at = NOW(); 
           RETURN NEW;
        END;
        $function$ language 'plpgsql';
        -- テーブルが存在する場合、このトリガーを作成する
        -- しかし、既に同名のトリガーが存在する場合は削除する
        -- これにより、二重にトリガーが作成されることを防ぐ
        DROP TRIGGER IF EXISTS update_users_updated_at ON users;
        CREATE TRIGGER update_users_updated_at
        BEFORE UPDATE ON users
        FOR EACH ROW
        EXECUTE FUNCTION update_timestamp();
    END IF;
END
$$;
