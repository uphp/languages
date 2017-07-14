<?php
namespace UPhp\Languages;

class LanguageDefine{
    private static $language = [];
    private static $validateLanguage = [];
    //private static $templateLanguage = [];
    private static $componentLanguage = [];

    public static function dbDefine(string $class, string $lang, Array $arr_language)
    {
        self::$language[$class][$lang] = $arr_language;
    }

    public static function getLanguage($class, $lang)
    {
        return self::$language[$class][$lang];
    }

    public static function validateDefine(string $class, string $function, string $lang, Array $arr_language)
    {
        self::$validateLanguage[$class][$function][$lang] = $arr_language;
    }

    public static function getValidateLanguage($class, $function, $lang, $field)
    {
        if (isset(self::$validateLanguage[$class][$function][$lang][$field])) {
            return self::$validateLanguage[$class][$function][$lang][$field];
        } else {
            return false;
        }

    }

    /*public static function templateDefine(string $template, string $lang, Array $arr_language)
    {
        self::$templateLanguage[$template][$lang] = $arr_language;
    }

    public static function getTemplateLanguage(string $template, string $lang)
    {
        //return self::$templateLanguage[$template][$lang];
        $templateViewResult = "\\UPhp\\ActionView\\Templates\\" . $template . "\\TemplateViewResult";
        return new $templateViewResult(self::$templateLanguage[$template][$lang]);
    }*/

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