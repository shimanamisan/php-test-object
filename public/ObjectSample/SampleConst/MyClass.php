<?php

namespace SampleConst;

class MyClass
{
    // アクセス修飾子を指定しなければデフォルトでpublic
    public const CONST1 = "クラス定数";
    // public
    public const CONST2 = "public const";
    // private
    private const CONST3 = "private const";

    public function showConstant()
    {
        // 定数を定義後はクラス内部からでも値の変更は出来無い
        // self::CONST2 = "値の変更"; // error
        // self::CONST3 = "値の変更"; // error

        echo  self::CONST3 . "\n";
    }
}
