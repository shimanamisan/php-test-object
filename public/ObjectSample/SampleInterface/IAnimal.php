<?php

namespace SampleInterface;

interface IAnimal
{
    // 定数を定義することが出来ます
    public const BEST_SLEEP = "良質な睡眠";

    // 具体的な実装を定義することは出来ません
    // アクセス修飾子は必ず public にする必要があります
    public function sleep(); // 動物は眠ります
}
