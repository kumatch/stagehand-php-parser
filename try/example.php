<?php
define("AAA", 10);

class Foo
{
    public function __construct($a, $b)
    {
        $c = $a + $b;
        print $c;
    }

    public function hoge()
    {
        print "hoge\n";
    }
}

Foo::hoge();
