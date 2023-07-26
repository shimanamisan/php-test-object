<?php

use UnusedImportedClass;

class A
{
    /**
      * 適当なDocComment
      */
    private function hoge(int $x, int $y)
    {
    }

    private $arr = array(1,2,3,);

    /**
    * @param int $a
    * @param string $bar
    */
    public function hoge1($a, $bar)
    {
        if ($a === 1) {
            # 特殊なケース
            return $bar;
        } else {
            //
            return $bar.$bar;
        }
    }
}
