<?php

/**
 * User: xiaobiao
 * Date: 16/9/5
 * Time: 下午1:03
 */
require_once "dataColumn.php";

class dataTable
{
    private $name;

    private $comment;

    private $keyColumns;

    private $baseColumns;

    private $blobColumns;

    /**
     * table constructor.
     * @param $name
     */
    public function __construct($name, $conn)
    {
        $this->name = $name;
        $columns = $conn->query('show full columns from ' . $name);
        if ($columns->num_rows > 0) {
            // 输出每行数据
            $column = null;
            while ($row = $columns->fetch_assoc()) {
                $column = new dataColumn($row);
                if ($column->getIsKey()) {
                    $this->keyColumns[] = $column;
                } else {
                    $this->baseColumns[] = $column;
                }
            }
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return mixed
     */
    public function getKeyColumns()
    {
        return $this->keyColumns;
    }

    /**
     * @return mixed
     */
    public function getBaseColumns()
    {
        return $this->baseColumns;
    }

    /**
     * @return mixed
     */
    public function getBlobColumns()
    {
        return $this->blobColumns;
    }



}