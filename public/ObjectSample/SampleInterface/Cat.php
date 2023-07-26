<?php

namespace SampleInterface;

use SampleInterface\IAnimal;
use SampleInterface\IAnimal2;
use SampleInterface\IAnimal3;

class Cat implements IAnimal, IAnimal2, IAnimal3
{
    public function sleep()
    {
        return "猫は 12~16 時間寝ます。";
    }

    public function run()
    {
        return "猫は素早く走ります。";
    }

    public function eat()
    {
        return "猫はよく食べます。";
    }
}
