<?php

namespace BaseClass;

class Human // 先頭は大文字にするのが慣習（小文字でもエラーにはならない）
{
    public $first_name;

    protected $last_name;

    private $age;

    public function __construct($first_name = "名無しの", $last_name = "ごん兵衛", $age = 20)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->age = $age;
    }

    public function helloWorld()
    {
        echo "こんにちは世界 \n";
    }

    public function echoName()
    {
        echo "私の名前は、{$this->first_name} {$this->last_name} です。年齢は {$this->age} 歳です。". "\n";
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {

        if(!is_int($age)) {
            throw new \Exception("数値を指定してください。");
        }

        if($age < 0) {
            throw new \Exception("年齢に負の値は指定できません。");
        }

        $this->age = $age;
    }
}
