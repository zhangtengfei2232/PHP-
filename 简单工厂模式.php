<?php

/**
 * 简单工厂方法
 * 简单工厂：是由一个工厂对象决定创建出哪一种产品类的实例。
 * A实例调用B实例的方法，称为A依赖于B。如果使用new关键字来创建一个B实例（硬编码耦合），然后调用B实例的方法。
 * 一旦系统需要重构：需要使用C类来代替B类时，程序不得不改写A类代码。而用工厂模式则不需要关心B对象的实现、创建过程。
 * 使用简单工厂模式的优势：让对象的调用者和对象创建过程分离，当对象调用者需要对象时，直接向工厂请求即可。
 * 从而避免了对象的调用者与对象的实现类以硬编码方式耦合，以提高系统的可维护性、可扩展性。
 * 工厂模式也有一个小小的缺陷：当产品修改时，工厂类也要做相应的修改，违反了开-闭原则。
 * 如上例，需要增加乘法 时，需要修改工厂类 OperationFactory
 * 简单工厂模式适用于业务简单的情况下或者具体产品很少增加的情况。
 */
class Operation {
    private $_numberA = 0;
    private $_numberB = 0;

    public function getNumberA() {
        return $this->_numberA;
    }
    public function getNumberB() {
        return $this->_numberB;
    }

    public function setNumberA($value) {
        $this->_numberA = $value;
    }
    public function setNumberB($value) {
        $this->_numberB = $value;
    }

    public function getResult() { }
}

class OperationAdd extends Operation {

    public function getResult()
    {
        return $this->getNumberA() + $this->getNumberB();
    }
}

class OperationSub extends Operation {

    public function getResult()
    {
        return $this->getNumberA() - $this->getNumberB();
    }
}

class OperationFactory
{
    private $operate;
    public function __construct($operate)
    {
        $this->operate = $operate;
    }
    public function createOperate()
    {
        $operator = new Operation();
        switch ($this->operate){
            case '+':
                $operator =  new OperationAdd();
                break;
            case '-':
                $operator =  new OperationSub();
                break;
        }
        return $operator;
    }
}

$add = (new OperationFactory('+'))->createOperate();
$sub = (new OperationFactory('-'))->createOperate();
$add->setNumberA(1);
$add->setNumberB(2);
echo $add->getResult();