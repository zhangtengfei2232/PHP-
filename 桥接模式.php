<?php

abstract class Implementor
{
    public abstract function operation();
}

class ConcreteImplementorA extends Implementor                 //模块二
{

    public function operation()
    {
        echo '具体实现 A 的方法执行' . "\n";
    }
}

class ConcreteImplementorB extends Implementor
{

    public function operation()
    {
        echo '具体实现 B 的方法执行' . "\n";
    }
}

class Abstraction                                             //抽象关联类
{
    protected $implementor;

    public function setImplementor($implementor)              //桥接，关联方法
    {
        $this->implementor = $implementor;
    }

    public function operation()
    {
        $this->implementor->operation();
    }
}

class RefinedAbstraction extends Abstraction                  //模块一
{
    public function operation()
    {
        $this->implementor->operation();
    }
}

$ab = new RefinedAbstraction();
$ab->setImplementor(new ConcreteImplementorA());
$ab->operation();
$ab->setImplementor(new ConcreteImplementorB());
$ab->operation();