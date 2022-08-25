<?php

namespace engine;

class Cms
{

    /**
     * @var di
     */
    private $di;

    /**
     * Cms constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
    }

    /**
     * Run Cms
     */
    public function run()
    {
        print_r($this->di->get('test1'));
    }

}