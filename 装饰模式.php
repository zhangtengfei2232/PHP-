<?php

abstract class Component
{
    public abstract function operation();
}

class ConcreteComponent extends Component
{

    public function operation()
    {
       echo '具体对象的操作' . "\n";
    }
}

abstract class Decorator extends Component
{
    protected $component;

    public function setComponent($component)
    {
        $this->component = $component;
    }

    public function operation()
    {
        if ($this->component != null) {
            $this->component->operation();
        }
    }

}

class ConcreteDecoratorA extends Decorator
{
    public function operation()
    {
        //首先运行原Component的operation(),再执行本类的功能,如AddedBehavior(),相当于对原Component进行装饰
        parent::operation();
        $addedState = 'New State';
        echo '具体装饰对象A的操作' . "\n";
    }
}

class ConcreteDecoratorB extends Decorator
{
    public function operation()
    {
        parent::operation();
        $this->AddedBehavior();
        echo '具体装饰对象B的操作' . "\n";
    }

    private function AddedBehavior()
    {
        echo '新行为' . "\n";
    }
}

$c = new ConcreteComponent();
$Ad = new ConcreteDecoratorA();
$Bd = new ConcreteDecoratorB();

$Ad->setComponent($c);
$Bd->setComponent($Ad);
$Bd->operation();

