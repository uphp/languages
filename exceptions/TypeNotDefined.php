<?php
namespace UPhp\Languages\Exception;

use \src\UphpException;

class TypeNotDefined extends UphpException
{
    public function __construct($options){
        parent::__construct("Type " . $options["type"] . " not defined.", __CLASS__);
    }
}