<?php

namespace App\Services;
use App\Services\MySecondService;
use Doctrine\ORM\Event\PostFlushEventArgs;

class MyService {

    public function __construct()
    {
        dump('hello!');
        //dump($one);
        //dump($service);
        //$this->secService = $service;
    }

    public function postFlush(PostFlushEventArgs $args)
    {
        dump('hello postflush!');
        dump($args);
    }

    public function clear()
    {
        dump('clear... ');
    }

    //use OptionalServiceTrait;

    //public $logger;
    //public $my;
    
    //public function someAction()
    //{
    //    dump($this->logger);
    //    dump($this->my);
    //}

    //public function someAction()
    //{
    //    dump($this->service->doSomething2());
    //}

    /**
     * @required
     */
    //public function setSecondService(MySecondService $second_service)
    //{
    //    dump($second_service);
    //}
}