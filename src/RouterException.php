<?php

namespace App;

class RouterException extends \Exception
{
    private string $string;

    /**
     * @param string $string
     */
    public function __construct(string $string)
    {
        parent::__construct($string);
    }

    // custom string representation of object
    public function __toString(): string
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}