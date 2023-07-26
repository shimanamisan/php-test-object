<?php

namespace SampleStatic;

class MyClass
{
    public $myProperty = "インスタンスプロパティ";  // インスタンスプロパティ

    public static $myStaticProperty = "静的プロパティ"; // 静的プロパティ

    // インスタンスメソッド
    public function myMethod()
    {
        return $this->myProperty;
    }

    // 静的メソッド
    public static function myStaticMethodMain()
    {
        // クラス内で静的プロパティを呼び出す方法
        return self::$myStaticProperty . PHP_EOL;
    }

    // 静的メソッド2
    public static function myStaticMethodSub()
    {
        // クラス内で静的メソッドを呼び出す方法
        return self::myStaticMethodMain();
    }
}
