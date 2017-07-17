<?php
namespace UPhp\Languages;

use UPhp\Languages\Exception\TypeNotAccepted;
use UPhp\Languages\Exception\TypeNotDefined;

class LanguageDefine{

    private static $accepted_types = [];
    private static $language = [];
    private static $config = [];

    public static function init(Array $config)
    {
        if (! isset($config["type"])) throw new TypeNotDefined($config);
        if (in_array($config["type"], self::$accepted_types)) {
            self::$config["type"] = $config["type"];
            return new self();
        } else {
            throw new TypeNotAccepted($config);
        }
    }

    public function language($lang){
        //$config["lang"]
        self::$config["lang"] = $lang;
        return $this;
    }

    public function set(string $package, Array $arr_language)
    {
        $type = self::$config["type"];
        $lang = self::$config["lang"];
        self::$language[$type][$lang][$package] = $arr_language;
        return $this;
    }

    public function define(){
        self::$config = null;
    }

    public static function get(string $type, string $lang, string $package)
    {
        return self::$language[$type][$lang][$package];
    }

    public static function addType($types)
    {
        if (is_array($types)) {
            $arr = array_merge(self::$accepted_types, $types);
            self::$accepted_types = $arr;
        } else {
            self::$accepted_types[] = $types;
        }
    }




    public static function componentDefine(string $class, string $component, string $lang, Array $arr_language)
    {
        self::$componentLanguage[$class][$component][$lang] = $arr_language;
    }

    public static function getComponentLanguage($class, $component, $lang, $componentName)
    {
        if (isset(self::$componentLanguage[$class][$component][$lang][$componentName])) {
            return self::$validateLanguage[$class][$component][$lang][$componentName];
        } else {
            return false;
        }

    }
}