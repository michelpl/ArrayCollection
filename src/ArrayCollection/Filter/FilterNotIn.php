<?php

namespace ArrayCollection\Filter;

class FilterNotIn extends \FilterIterator
{

    private $filtro;
    private $column;

    public function __construct(Iterator $iterator, $filter, $column)
    {
        parent::__construct($iterator);
        $this->filtro = $filter;
        $this->column = $column;
    }

    public function accept()
    {
        $campo = $this->getInnerIterator()->current();
        if (strcasecmp($campo[$this->column], $this->filtro) == 0) {
            return false;
        }
        return true;
    }

}
