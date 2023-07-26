<?php

namespace SampleConst;

use SampleConst\BaseClass;

class SubClass extends BaseClass
{
    public const BASE_CONSTANT = 'スーパークラス定数をオーバーライド';

    // スーパークラスでfinaｌが指定されている定数は上書き出来ない
    // public const FINAL_BASE_CONSTANT = "スーパークラス定数をオーバーライド";

    public function showConstant()
    {
        // サブクラスのスコープで BASE_CONSTANT が定義されているか探す
        // なければスーパークラスで定義されているか見に行く
        echo self::BASE_CONSTANT ."\n";
        // 直接スーパークラスの定数を参照しに行く
        echo parent::BASE_CONSTANT ."\n";
    }
}
