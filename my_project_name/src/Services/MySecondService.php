<?php

namespace App\Services;

class MySecondService {
    
    public function __construct()
    {
        dump('from second service');
        //$this->doSomething();
    }

    public function someMethod()
    {
        return 'hello!';
    }

    //public function doSomething()
    //{
        //...
    //}

    //public function doSomething2()
    //{
    //    return 'wow!';
    //}
}