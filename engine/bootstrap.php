<?php

require_once __DIR__ . '/../vendor/autoload.php';

use engine\Cms;
use engine\di\di;

try{

    /**
     * Dependency injection
     */
    $di = new Di();

    $di->set('test', ['db' => 'db_object']);
    $di->set('test1', ['mail' => 'mail_object']);

    $cms = new Cms($di);
    $cms->run();

}catch (ErrorException $e){
    print $e->getMessage();
}