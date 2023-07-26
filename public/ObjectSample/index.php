<?php

require __DIR__ . '/../vendor/autoload.php';

use BaseClass\Human;
use SampleStatic\MyClass;
use ExtendTrait\ActorSkill;
use ExtendTrait\SingerSkill;

// $human1 = new Human();
// $human2 = new Human("浦島", "太郎");
// $human3 = new Human(last_name: "デップ", first_name: "ジョニー");

// $human1->EchoName(); // 私の名前は、名無しの ごん兵衛 です。
// $human2->EchoName(); // 私の名前は、浦島 太郎 です。
// $human3->EchoName(); // 私の名前は、ジョニー デップ です。

// $human1->first_name = "ヒポポタマス";

// $human1->EchoName();

// echo $human1->getAge() . PHP_EOL; // 20
// $human1->setAge(-1); // Error 年齢に負の値は指定できません。
// $human1->setAge("aaaa"); // Error 数値を指定してください。
// $human1->setAge("30"); // Error 数値を指定してください。

// $human1->setAge(30);
// echo $human1->getAge(). PHP_EOL; // 30

class Man extends Human
{
    use ActorSkill;
    use SingerSkill;

    private $job;

    public function __construct($first_name, $last_name, $age, $job)
    {
        parent::__construct($first_name, $last_name, $age);

        $this->job = $job;
    }

    // スーパークラスのメソッドを使用したい場合は parent::[スーパークラスのメソッド名] と指定する
    public function useParentEchoNam()
    {

        parent::echoName();
    }

    // スーパークラスのメソッドをオーバーライド
    public function echoName()
    {
        echo MyClass::$myStaticProperty. "\n"; // 静的プロパティ

        echo MyClass::myStaticMethodMain(); // 静的プロパティ

        MyClass::$myStaticProperty = "値を変更"; // 呼び出している箇所全てに影響する

        echo "私の名前は、{$this->first_name} {$this->last_name} で、職業は {$this->job} です。" ."\n";
        ;
    }

    public function echoJob()
    {
        echo "私の職業は {$this->job} です。"."\n";
    }

    public function echoMan()
    {
        echo "私は男性です。"."\n";
    }

    public function test()
    {
        // Humanクラスのアクセス権がpublic
        echo $this->first_name; // アクセスできる

        // Humanクラスのアクセス権がprotected
        echo $this->last_name; // アクセスできる

        // Humanクラスのアクセス権がprivate
        // echo $this->age; // Error
    }
}

$man1 = new Man("ジョニー", "デップ", 60, "俳優");
$man1->echoName(); // 私の名前は、ジョニー デップ で、職業は 俳優 です。
// $man1->useParentEchoNam(); // 私の名前は、ジョニー デップ です。年齢は 60 歳です。

// $man1->greatPerformance(); // 私の演技は素晴らしいです。
// $man1->doSing(); // 私は素晴らしい歌声で歌います。

echo MyClass::$myStaticProperty = "私はバグを埋め込みました！" ."\n"; // 値を変更
