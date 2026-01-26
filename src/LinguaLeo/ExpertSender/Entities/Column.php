<?php

namespace LinguaLeo\ExpertSender\Entities;

class Column
{
    /** @var string */
    protected $name;
    /** @var bool|float|int|string|null */
    protected $value;

    /**
     * @param string $name
     * @param bool|float|int|string|null $value
     */
    public function __construct($name, $value = null)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function hasValue(): bool
    {
        return $this->value !== null;
    }

    /**
     * @return bool|float|int|string|null
     */
    public function getValue()
    {
        return $this->value;
    }
}
