<?php

/**
 * Created by PhpStorm.
 * User: beeant
 * Date: 2016/9/10
 * Time: 9:40
 */

require "dto.php";

class genDto
{
    private $tables;

    private $dtos;

    /**
     * genDto constructor.
     * @param $tabls
     */
    public function __construct($tables)
    {
        $this->tables = $tables;
        $this->generate();
    }

    private function generate(){
        foreach($this->tables as $table){
            $this->dtos[] = new dto($table);
        }
    }
}