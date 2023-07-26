<?php

namespace SampleAbstract;

abstract class AbstractClass
{
    // 抽象メソッドの宣言
    // このメソッドはサブクラスで実装が矯正される
    abstract protected function getValue(): string;
    abstract protected function prefixValue($prefix): string;

    // 通常のメソッド
    // このメソッドはサブクラスをインスタンス化後も呼び出せる
    public function printOut()
    {
        print $this->getValue() ."\n";
    }
}
