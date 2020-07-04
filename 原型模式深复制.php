<?php

interface ICloneable
{
    public function cloneObj();
    public function setPersonalInfo($name, $age);
    public function setWorkExperience($company);
    public function display();
}

class Person implements ICloneable
{

    private $name;
    private $sex;
    private $work;
    function __construct($work)
    {
        $this->work = $work;
    }

    public function run()
    {
        echo '复制来，复制去，都是自己';
    }

    public function cloneObj()
    {
        $person = new Person($this->work);
        $person->sex = $this->sex;
        $person->name = $this->name;
        return $person;
    }

    public function setPersonalInfo($name, $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    public function setWorkExperience($company)
    {
        $this->work->company = $company;
    }

    public function display()
    {
        echo $this->name . "\n";
        echo $this->sex . "\n";
        echo $this->work->workDate . '进入' . $this->work->company . "\n";

    }
}

class WorkExperience
{
    public $company;
    public $workDate;

}

class Client
{
    public function execute()
    {
        $prototype = new Person(new WorkExperience());
        $prototype->setPersonalInfo('ztf' , '男');
        $prototype->setWorkExperience('百度');
        $clone = $prototype->cloneObj();
        $prototype->display();
        $clone->display();
    }
}
$client = new Client();
$client->execute();

