<?php

abstract class Prototype
{
    private $id;
    public $v = PHP_EOL;
    function __construct($id)
    {
        $this->id = $id;
        echo 'create' . PHP_EOL;
    }
    public function getID()
    {
        return $this->id;
    }
    public abstract function cloneObj();
}

class ConcretePrototype extends Prototype
{

    public function run()
    {
        echo '复制来，复制去，都是自己';
    }

    public function cloneObj()
    {
        return clone $this;
    }
}

class Client
{
   public function execute()
   {
       $prototype = new ConcretePrototype('ME');
       $clone = $prototype->cloneObj();
       echo 'ID是' . $clone->getID() . "\n";
       $clone->run();
       echo $prototype->v . '我是原型';
       echo $clone->v . '我是克隆';
   }
}
$client = new Client();
$client->execute();

