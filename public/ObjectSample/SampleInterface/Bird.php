<?php

namespace SampleInterface;

use SampleInterface\IAnimal;

class Bird implements IAnimal
{
    public function sleep()
    {
        return "鳥の睡眠時間は短いです。";
    }
}
