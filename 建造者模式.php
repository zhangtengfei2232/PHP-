<?php

class Product                                   //产品类
{
    private $parts = array();

    public function add($part)
    {
        $this->parts [] = $part;
    }

    public function show()
    {
        echo "产品创建...\n";
        foreach ($this->parts as $key => $value)
        {
            var_dump($value);
        }
    }
}

abstract class Builder                          //抽象建造类
{
    abstract public function buildPartA();
    abstract public function buildPartB();
    abstract public function getResult();
}

class ConcreteBuilder extends Builder        //具体建造类
{
    private $product;
    function __construct()
    {
        $this->product = new Product();
    }

    public function buildPartA()
    {
        $this->product->add('部件A');
    }

    public function buildPartB()
    {
        $this->product->add('部件B');
    }

    public function getResult()
    {
        return $this->product;
    }
}
class Director
{
    public function Construct($builder)
    {
        $builder->buildPartA();
        $builder->buildPartB();
    }
}

$director = new Director();         //指挥者
$builder = new ConcreteBuilder();   //建造者
$director->Construct($builder);     //创建
$product = $builder->getResult();   //获取产品
$product->show();                   //展示
