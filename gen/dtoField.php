<?php

/**
 * Created by PhpStorm.
 * User: beeant
 * Date: 2016/9/10
 * Time: 9:46
 */
class dtoField
{
    private $name;

    private $type;

    private $comment;

    /**
     * dtoField constructor.
     * @param $name
     * @param $type
     * @param $comment
     */
    public function __construct($column)
    {
        $this->name = $column->getName();
        $this->type = $column->getJavaType();
        $this->comment = $column->getComment();
    }


}