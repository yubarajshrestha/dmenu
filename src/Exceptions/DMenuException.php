<?php
namespace YubarajShrestha\DMenu\Exceptions;

use Exception;
use YubarajShrestha\DMenu\MenuItem;

class DMenuException extends Exception
{
    public $subject;
    public static function notFeedable($subject)
    {
        return (new static('Object doesn\'t implement `YubarajShrestha\DMenu\Interfaces\DMenuInterface`'))->withSubject($subject);
    }
    public static function notAFeedItem($subject)
    {
        return (new static('`toFeedItem` should return an instance of `YubarajShrestha\DMenu\Interfaces\DMenuInterface`'))->withSubject($subject);
    }
    public static function missingField(Articles $subject, $field)
    {
        return (new static("Field `{$field}` is required"))->withSubject($subject);
    }
    protected function withSubject()
    {
        $this->subject;
        return $this;
    }
}
