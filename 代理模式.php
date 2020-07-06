<?php

abstract class Subject
{
    public abstract function Request();
}

class RealSubject extends Subject
{

    public function Request()
    {
        echo '真实的请求';
    }
}

class Proxy extends Subject
{
    private $realSubject;
    public function Request()
    {
        if ($this->realSubject == null) {
            $this->realSubject = new RealSubject();
        }
        $this->realSubject->Request();
    }
}

class Client
{
    public function execute()
    {
        $proxy = new Proxy();
        $proxy->Request();
    }
}
$client = new Client();
$client->execute();

