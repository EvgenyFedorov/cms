<?php


namespace test;


class Test
{

    public function __construct()
    {
        $closure = function(){
            echo "Hello, World!";
        };

        $closure();
    }

}

print "<pre>";
$test = new Test();