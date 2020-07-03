<?php
namespace dataAccess;

use ReflectionClass;
use ReflectionException;

interface IUser
{
    public function Insert();
    public function getUser();
}

class SqlServerUser implements IUser {

    public function Insert()
    {
        echo 'SQL_SERVER插入';
    }

    public function getUser()
    {
        echo 'SQL_SERVER获取';
    }
}

class MySQLUser implements IUser {

    public function Insert()
    {
        echo 'MySQL插入';
    }

    public function getUser()
    {
        echo 'MySQL获取';
    }
}

class DataAccessFactory {

    private  $db = 'SqlServer';
    public $namespace = 'dataAccess\\';

    public function __construct()
    {
        /**
         * 从配置项中获取 driver
         */
        $config = include 'data_access_config.php';
        $this->db = $config['driver'];
    }

    public  function createUser()
    {
        $className = $this->namespace . $this->db . 'User';
        try {
            $class = new ReflectionClass($className);
            $user = $class->newInstance();
        } catch (ReflectionException $exception) {
            throw new \InvalidArgumentException('暂不支持的数据库类型');
        }
        return $user;
    }
}
$data = new DataAccessFactory();
$sql = $data->createUser();
$sql->Insert();