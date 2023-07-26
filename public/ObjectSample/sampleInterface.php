<?php

require __DIR__ . '/../vendor/autoload.php';

use SampleInterface\Bird;
use SampleInterface\Cat;
use SampleInterface\Dog;
use SampleStatic\AnimalClient;

// $dog = new Dog();
// echo $dog->sleep() . "\n"; // 犬は 12~14 時間寝ます。

// $dog = new Cat();
// echo $dog->sleep() . "\n"; // 猫は 12~16 時間寝ます。

// DogクラスはIAnimalインタフェースを実装しているので引数に渡すことが出来ます
echo AnimalClient::executeSleep(new Dog()). "\n"; // 犬は 12~14 時間寝ます。

echo AnimalClient::executeSleep(new Cat()). "\n"; // 猫は 12~16 時間寝ます。

echo AnimalClient::executeSleep(new Bird()). "\n"; // 鳥の睡眠時間は短いです。
