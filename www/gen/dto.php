<?php
/**
 * Created by PhpStorm.
 * User: Beeant
 * Date: 2016/9/16
 * Time: 10:26
 */

require "../../db.php";

if ($_GET['table']) {
    session_start();
    if (isset($_SESSION['db'])) {
        $db = unserialize($_SESSION['db']);
        $tables = $db->getTables();
        foreach($tables as $table){
            if($table->getName() == $_GET['table']){
                var_dump($table->getKeyColumns());
                break;
            }
        }
    }
}