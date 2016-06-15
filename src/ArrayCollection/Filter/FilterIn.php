<?php

namespace ArrayCollection\Filter;

class FilterIn extends \FilterIterator
{

    private $filter;
    private $column;

    public function __construct(Iterator $iterator, $filter, $column)
    {
        parent::__construct($iterator);
        $this->filter = $filter;
        $this->column = $column;
    }

    public function accept()
    {
        $campo = $this->getInnerIterator()->current();
        if (strcasecmp($campo[$this->column], $this->filter) == 0) {
            return true;
        }
        return false;
    }

}
