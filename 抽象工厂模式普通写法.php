<?php

class User
{

}
interface IUser
{
    public function Insert($user);
    public function getUser($userId);
}
class SqlServerUser implements IUser
{

    public function Insert($user)
    {
        echo 'SQL_SERVER插入';
    }

    public function getUser($userId)
    {
        echo 'SQL_SERVER获取';
    }
}

class MySQLUser implements IUser
{

    public function Insert($user)
    {
        echo 'MySQL插入';
    }

    public function getUser($userId)
    {
        echo 'MySQL获取';
    }
}

interface IFactory
{
    public function createUser();
}

class SqlServerFactory implements IFactory
{

    public function createUser()
    {
        return new SqlServerUser();
    }
}

class MySQLFactory implements IFactory
{

    public function createUser()
    {
        return new MySQLUser();
    }
}
$user = new User();
$factory = new MySQLFactory();
$IUser = $factory->createUser();      //创建User模型对象
$IUser->Insert($user);                //插入数据
$IUser->getUser(1);            //获取数据
