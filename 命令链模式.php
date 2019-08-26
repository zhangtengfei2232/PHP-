<?php
/**
 * 命令链 模式以松散耦合主题为基础，发送消息、命令和请求，或通过一组处理程序发送任意内容。
 * 每个处理程序都会自行判断自己能否处理请求。如果可以，该请求被处理，进程停止。您可以为系统添加或移除处理程序，
 * 而不影响其他处理程序。
 */

interface ICommend
{
    function onCommand($name, $args);
}
class CommandChain
{
    private $_commands = array();

    public function addCommand( $cmd )
    {
        $this->_commands []= $cmd;
    }
    public function runCommand($name, $args)
    {
        foreach ($this->_commands as $cmd){
            if($cmd->onCommand($name, $args)) return;
        }
    }
}

class UserCommand implements ICommend
{
    public function onCommand($name, $args)
    {
        echo "11\n";
        // TODO: Implement onCommand() method.
        if($name != "addUser") return false;
        echo("UserCommand handling 'addUser' \n");
        return true;
    }
}

class MailCommand implements ICommend
{
    public function onCommand($name, $args)
    {
        echo "22\n";
        // TODO: Implement onCommand() method.
        if($name != 'mail') return false;
        echo("MailCommand handling 'mail'\n" );
        return true;
    }
}

$cc = new CommandChain();
$cc->addCommand(new UserCommand());
$cc->addCommand(new MailCommand());
$cc->runCommand('addUser', null);
$cc->runCommand('mail', null);

