<?php

namespace YubarajShrestha\DMenu;
use Exception;
use YubarajShrestha\DMenu\Exceptions\DMenuException;

class MenuItems
{
    /** @var string */
    public $id;

    /** @var string */
    public $title;

    /** @var string */
    public $link;

    /** @var string */
    public $parameters;

    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public static function create(array $data = [])
    {
        return new static($data);
    }

    public function id(string $id)
    {
        $this->id = $id;
        return $this;
    }

    public function title(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function link(string $link)
    {
        $this->link = $link;
        return $this;
    }

    public function parameters(string $parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    public function validate()
    {
        $requiredFields = ['id', 'title', 'link'];
        foreach ($requiredFields as $requiredField) {
            if (is_null($this->$requiredField)) {
                throw DMenuException::missingField($this, $requiredField);
            }
        }
    }

    public function __get($key)
    {
        if (! isset($this->$key)) {
            throw new Exception("Property `{$key}` doesn't exist");
        }
        return $this->$key;
    }
}
