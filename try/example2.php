<?php
abstract class Foo extends Bar
{
    public function a()
    {
        $a = 0;
        for ($i = 1; $i <= 10; ++$i) {
            if (($i % 2)  == 0) {
                $a += $i * 2;
            } else {
                $a += $i;
            }
        }

        return $a;
    }
}
