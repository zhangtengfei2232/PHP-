<?php

/**
 * Class Player
 * Target 客户所期待的接口，可以是具体的或抽象的类，也可以是接口
 */
abstract class Player
{
    public $name;
    function __construct($name)
    {
        $this->name = $name;
    }
    public abstract function attack();
    public abstract function defense();
}

/**
 * Class Forwards
 */
class Forwards extends Player     //前锋
{
    function __construct($name)
    {
        parent::__construct($name);
    }

    public function attack()
    {
        echo $this->name . '进攻' . "\n";
    }

    public function defense()
    {
        echo $this->name . '防守' . "\n";
    }
}

class ForeignCenter                       //Adaptee需要适配的类
{
    private $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function attack()
    {
        echo '外籍中锋' . $this->name . '进攻' . "\n";
    }

    public function defense()
    {
        echo '外籍中锋' . $this->name . '防守' . "\n";
    }

}

/**
 * Class Translator
 * Adapter通过在内部包装一个 Adaptee 对象，把源接口转换成目标接口
 */
class Translator extends Player                      //翻译者
{

    private $foreignCenter;

    function __construct($name)
    {
        parent::__construct($name);
        $this->foreignCenter = new ForeignCenter();
        $this->foreignCenter->setName($name);
    }

    public function attack()
    {
        $this->foreignCenter->attack();
    }

    public function defense()
    {
        $this->foreignCenter->defense();
    }
}

class Client
{
    public function Main()
    {
        $player = new Forwards('詹姆斯');
        $player->attack();
        $FP = new Translator('姚明');
        $FP->attack();
        $FP->defense();
    }
}
$client = new Client();
$client->Main();