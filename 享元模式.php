<?php

abstract class Flyweight
{
    public abstract function operation($extrinsicState);
}

class ConcreteFlyweight extends Flyweight
{

    public function operation($extrinsicState)
    {
        echo '具体的 Flyweight';
        var_dump($extrinsicState);
    }
}

class UnsharedConcreteFlyweight extends Flyweight
{

    public function operation($extrinsicState)
    {
        echo '不共享具体的 Flyweight';
        var_dump($extrinsicState);
    }
}

class FlyweightFactory
{
    private $flyweights = array();

    function __construct()
    {
        $this->flyweights['X'] = new ConcreteFlyweight();
        $this->flyweights['Y'] = new ConcreteFlyweight();
        $this->flyweights['Z'] = new ConcreteFlyweight();
    }

    public function getFlyweight($key)
    {
        return $this->flyweights[$key];
    }
}

class Client
{
    public function execute()
    {
        $extrinsicState = 22;         //代码外部状态
        $f = new FlyweightFactory();
        $fx = $f->getFlyweight('X');
        $fx->operation(--$extrinsicState);

        $fy = $f->getFlyweight('Y');
        $fy->operation(--$extrinsicState);

        $fz = $f->getFlyweight('Z');
        $fz->operation(--$extrinsicState);

        $uf = new UnsharedConcreteFlyweight();
        $uf->operation(--$extrinsicState);

    }

}
$client = new Client();
$client->execute();
