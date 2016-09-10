<?php
/**
 * User: xiaobiao
 * Date: 16/9/5
 * Time: 下午1:33
 */

require_once "typeAlias.php";

class dataColumn
{
    private $name;
    private $type;
    private $collation;
    private $isNull;
    private $isKey;
    private $default;
    private $extra;
    private $privileges;
    private $comment;
    private $length;
    private $javaType;

    /**
     * column constructor.
     * @param $column
     */
    public function __construct($column)
    {
        $this->name = $column['Field'];
        $rst = $this->columnType($column['Type']);
        $this->type = $rst['type'];
        $this->length = $rst['length'];
        $this->javaType = $rst['javaType'];
        $this->collation = $column['Collation'];
        $this->isNull = $column['Null'] == 'Yes' ? true : false;
        $this->isKey = $column['Key'] == 'PRI' ? true : false;
        $this->default = $column['Default'];
        $this->extra = $column['Extra'];
        $this->privileges = $column['Privileges'];
        $this->comment = $column['Comment'];
    }

    private function columnType($type)
    {
        preg_match('/^(\w*)(\()*([\d|a-zA-Z|\'|\,]*)(\))*\s*(\w*)/i', $type, $matched);
        $javaType = $this->setJavaType($matched[1], $matched[3]);
        return array('type' => $matched[1], 'length' => $matched[3], 'javaType' => $javaType);
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getCollation()
    {
        return $this->collation;
    }


    /**
     * @return mixed
     */
    public function getIsNull()
    {
        return $this->isNull;
    }

    /**
     * @return mixed
     */
    public function getIsKey()
    {
        return $this->isKey;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }


    /**
     * @return mixed
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @return mixed
     */
    public function getPrivileges()
    {
        return $this->privileges;
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
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @return mixed
     */
    public function getJavaType()
    {
        return $this->javaType;
    }

    private function setJavaType($type, $length)
    {
        switch ($type) {
            case 'varchar':
            case 'char':
                if ($length > 1000){
                    return "String";
                }
                break;
        }
        return "type";
    }
}