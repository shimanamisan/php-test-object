<?php

require __DIR__ . '/../vendor/autoload.php';

use SampleConst\MyClass;
use SampleConst\SubClass;
use SampleConst\ConcreteClass;

// インスタンス化しなくともアクセスできる
echo MyClass::CONST1 . PHP_EOL; // クラス定数
echo MyClass::CONST2 . PHP_EOL; //  public const

// MyClass::CONST2 = "値を変更"; // 値の変更は出来ない

// クラス名の文字列を変数に格納
$classname = "SampleConst\\MyClass";
// その変数からクラスにアクセスすることが可能
echo $classname::CONST1 . PHP_EOL; // "クラス定数" を出力

$class = new MyClass();
$class->showConstant(); // private const

// インスタンス化後も外部から呼び出し可能
echo $class::CONST2 . PHP_EOL; // public const
// privateは外部から呼び出せない
// echo $class::CONST3 . PHP_EOL; // error

$subClass = new SubClass();
$subClass->showConstant(); // スーパークラスのクラス定数出力
echo SubClass::BASE_CONSTANT . PHP_EOL; // スーパークラスのクラス定数出力

$test = new ConcreteClass();
echo $test::MY_CONSTANT. PHP_EOL; // Concrete constant // スーパークラスの定数を上書
