<?php
namespace UPhp\Languages;

class Label{
    private static $language = [];

    public static function dbDefine(string $lang, Array $arr_language){
        self::$language[] = [$lang => $arr_language];
    }

    public static function getLanguage($lang){
        return self::$language[$lang];
    }
}