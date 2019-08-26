<?php

/**
 * 在大型系统中，许多代码依赖于少数几个关键类。需要更改这些类时，可能会出现困难。
 * 例如，假设您有一个从文件读取的 User 类。您希望将其更改为从数据库读取的其他类，
 * 但是，所有的代码都引用从文件读取的原始类。这时候，使用工厂模式会很方便。
 * 工厂模式 是一种类，它具有为您创建对象的某些方法。您可以使用工厂类创建对象，
 * 而不直接使用 new。这样，如果您想要更改所创建的对象类型，只需更改该工厂即可。
 * 使用该工厂的所有代码会自动更改。
 * Interface IUser
 */
interface IUser
{
    function getName();
}
class User implements IUser
{
    private $id;
    /**
     * 有一种工厂模式的变体使用工厂方法。类中的这些公共静态方法构造该类型的对象。如果创建此类型的对象非常重要，
     * 此方法非常有用。例如，假设您需要先创建对象，然后设置许多属性。
     */
//    public static function Load( $id )
//    {
//        return new User( $id );
//    }
//    public static function Create()
//    {
//        return new User( null);
//    }
    public function __construct( $id )
    {
        $this->id = $id;
    }

    public function getName()
    {
        // TODO: Implement getName() method.
        return 'ZTF' . $this->id;
    }
}
class UserFactory
{
    public static function Create( $id )
    {
        return new User( $id );
    }
}

$uo = UserFactory::Create(1);
echo ($uo->getName() . "\n");