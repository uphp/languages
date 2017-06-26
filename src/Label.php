<?php
namespace UPhp\Languages;

class Label{
    private static $language = [];

    public static function dbDefine(string $class, string $lang, Array $arr_language){
        self::$language[$class][$lang] = $arr_language;
    }

    public static function getLanguage($class, $lang){
        return self::$language[$class][$lang];
    }
}