<?php

/**
 * Created by PhpStorm.
 * User: beeant
 * Date: 2016/9/10
 * Time: 9:45
 */

require "dtoField.php";

class dto
{
    private $name;

    private $comment;

    private $keyFields;
    private $blobFields;
    private $baseFields;

    /**
     * dto constructor.
     */
    public function __construct($table)
    {
        $this->name = $table->getName();
        $this->comment = $table->getComment();

        if (null != $table->getKeyColumns()) {
            foreach ($table->getKeyColumns() as $column) {
                $this->keyFields[] = new dtoField($column);
            }
        }

        if (null != $table->getBlobColumns()){

            foreach($table->getBlobColumns() as $column){
                $this->blobFields[] = new dtoField($column);
            }
        }
        if (null != $table->getBaseColumns()) {
            foreach ($table->getBaseColumns() as $column) {
                $this->baseFields[] = new dtoField($column);
            }
        }
    }


}