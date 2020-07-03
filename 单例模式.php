<?php

/**
 * 单例模式
 * 某些应用程序资源是独占的，因为有且只有一个此类型的资源。例如，通过数据库句柄到数据库的连接是独占的。
 * 您希望在应用程序中共享数据库句柄，因为在保持连接打开或关闭时，它是一种开销，在获取单个页面的过程中更是如此。
 * 单元素模式可以满足此要求。如果应用程序每次包含且仅包含一个对象，那么这个对象就是一个单元素（Singleton）
 */

class Singleton {

    private static $new;                         //申请一个私有的静态成员变量来保存该类的唯一实例

    private function __construct() {}            //声明私有的构造方法，防止类外部创建对象

    public static function getInstance () {      //声明一个静态公共方法，供外部获取唯一实例
        if (! (self::$new instanceof self)) {    //线程安全
            //在这里加锁
            if (! (self::$new instanceof self)) {
                self::$new = new self;
            }
        }

        return self::$new;
    }

    private function __clone() {}               //声明私有的克隆方法，防止对象被克隆

    public function __sleep() {                 //重写__sleep方法，将返回置空，防止序列化反序列化获得新的对象
        return [];
    }
}