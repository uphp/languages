<?php
namespace UPhp\Languages\Exception;

use \src\UphpException;

class TypeNotAccepted extends UphpException
{
    public function __construct($options){
        parent::__construct("Type " . $options["type"] . " not accepted. Please use Label::addType() to include new type.", __CLASS__);
    }
}