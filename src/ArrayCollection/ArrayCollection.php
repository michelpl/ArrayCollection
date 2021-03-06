<?php

namespace ArrayCollection;

class ArrayCollection extends ArrayIterator
{
    
    private $limitITerator;
    private $limit;
    private $start;

    public function __construct($array = array(), $flags = 0)
    {
        parent::__construct($array, $flags);
    }

    public function getNext($pos)
    {
        foreach ($this->limitIterator($pos + 1, 1) as $item) {
            return $item;
        };
    }

    public function getPrev($pos)
    {
        foreach ($this->limitIterator($pos - 1, 1) as $item) {
            return $item;
        };
    }

    public function limitIterator($start, $limit)
    {
        $this->start = $start;
        $this->limit = $limit;
        return $this->limitITerator = new LimitIterator($this, $start, $limit);
    }

    public function jsonEncode()
    {
        return json_encode($this);
    }

    public function filterIn($filter, $column)
    {
        return new FilterIn($this, $filter, $column);
    }

    public function contains($value)
    {
        return in_array($value, $this->getArrayCopy());
    }

    public function notContains($value)
    {
        return !in_array($value, $this->getArrayCopy());
    }

    public function filterNotIn($filter, $column)
    {
        return new FilterNotIn($this, $filter, $column);
    }

    public function allKeys()
    {
        return array_keys($this->getArrayCopy());
    }

    public function allValues()
    {
        return array_values($this->getArrayCopy());
    }
}
