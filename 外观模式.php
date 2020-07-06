<?php

class SubSystemOne
{
    public function MethodOne()
    {
        echo '子系统方法一' . "\n";
    }
}

class SubSystemTwo
{
    public function MethodTwo()
    {
        echo '子系统方法二' . "\n";
    }
}

class SubSystemThree
{
    public function MethodThree()
    {
        echo '子系统方法三' . "\n";
    }
}

class Facade
{
    private $subSystemOne;
    private $subSystemTwo;
    private $subSystemThree;

    function __construct()
    {
        $this->subSystemOne = new SubSystemOne();
        $this->subSystemTwo = new SubSystemTwo();
        $this->subSystemThree = new SubSystemThree();
    }

    public function methodA()
    {
        echo '方法组A() ------' . "\n";
        $this->subSystemOne->MethodOne();
        $this->subSystemThree->MethodThree();
    }

    public function MethodB()
    {
        echo '方法组B() ------' . "\n";
        $this->subSystemTwo->MethodTwo();
        $this->subSystemThree->MethodThree();
    }
}

class Client
{
    public function execute()
    {
        $facade = new Facade();
        $facade->MethodA();
        $facade->MethodB();
    }
}
$client = new Client();
$client->execute();

