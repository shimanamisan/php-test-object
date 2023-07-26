<?php

namespace SampleStatic;

use SampleInterface\Dog;
use SampleInterface\IAnimal;

class AnimalClient
{
    // インターフェースに依存したオブジェクトを渡す
    public static function executeSleep(IAnimal $animalObj)
    {
        // IAnimalインターフェースでは ssleep メソッドが実装されていることが保証されているので呼び出せる
        return $animalObj->sleep();
    }
}
