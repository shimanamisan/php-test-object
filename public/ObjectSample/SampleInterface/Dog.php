<?php

namespace SampleInterface;

use SampleInterface\IAnimal;
use SampleInterface\IAnimal3;

class Dog implements IAnimal, IAnimal3
{
    public function sleep()
    {
        return "犬は 12~14 時間寝ます。";
    }

    public function run()
    {
        return "犬の走る速度は人間より速いです。";
    }
}
