<?php

abstract class Component
{
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    public abstract function add($component);
    public abstract function remove($component);
    public abstract function display($depth);
}

class Leaf extends Component
{
    //因为叶子没有再增加分枝和树叶，add 和 remove 没有意义，
    //但是为了消除叶节点和枝节点对象在抽象层的区别，它们具有一致的接口
    public function add($component)
    {
        echo '我不是枝干' . "\n";
    }

    public function remove($component)
    {
        echo '不能从一个叶子节点移除节点' . "\n";
    }

    public function display($depth)
    {
        echo str_repeat('-', $depth) . $this->name . "\n";
    }
}

class Composite extends Component
{
    private $listComponent = array();

    public function add($component)
    {
        $this->listComponent[$component->name] = $component;
    }

    public function remove($component)
    {
        unset($this->listComponent[$component->name]);
    }

    public function display($depth)
    {
        foreach ($this->listComponent as $key => $value) {
            $value->display($depth + 2);
        }
    }
}

$root = new Composite('root');
$root->add(new Leaf('Leaf A'));
$root->add(new Leaf('Leaf B'));
$comp = new Composite('Composite X');
$comp->add(new Leaf('Leaf XA'));
$root->add($comp);
$leaf = new Leaf('Leaf D');
$root->add($leaf);
$root->remove($leaf);
$root->display(1);
