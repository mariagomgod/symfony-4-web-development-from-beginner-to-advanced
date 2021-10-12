<?php

namespace App\Services;

class MySecondService implements ServiceInterface {
    
    public function __construct()
    {
        dump('hello from second service');
        //$this->doSomething();
    }

    //public function someMethod()
    //{
    //    return 'hello!';
    //}

    //public function doSomething()
    //{
        //...
    //}

    //public function doSomething2()
    //{
    //    return 'wow!';
    //}
}