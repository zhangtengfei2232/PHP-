<?php
/**
 * 该模式非常简单：一个对象通过添加一个方法（该方法允许另一个对象，即观察者 注册自己）使本身变得可观察。
 * 当可观察的对象更改时，它会将消息发送到已注册的观察者。这些观察者使用该信息执行的操作与可观察的对象无关。
 * 结果是对象可以相互对话，而不必了解原因。
 */

interface IObserver
{
    function onChanged( $sender, $args);
}
interface IObservable
{
    function addObserver( $observer );
}

class UserList implements IObservable
{
    private $_observers = array();
    public function addCustomer( $name )
    {
        foreach ( $this->_observers as $obs)
            $obs->onChanged( $this, $name);
    }
    public function addObserver($observer)
    {
        // TODO: Implement addObserver() method.
        $this->_observers [] = $observer;
    }
}

class UserListLogger implements IObserver
{
    private $observer_name;
    public function __construct( $observer_name )
    {
        $this->observer_name = $observer_name;
    }

    public function onChanged($sender, $args)
    {
        // TODO: Implement onChanged() method.
        echo("'$this->observer_name . '知道了' .  $args' added to user list\n");
    }
}

$ul = new UserList();
$ul->addObserver( new UserListLogger("j") );
$ul->addObserver( new UserListLogger("K") );
$ul->addCustomer( "ZTF");
$ul->addCustomer( "LJ");