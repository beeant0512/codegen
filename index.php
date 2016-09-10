<?php
/**
 * User: xiaobiao
 * Date: 16/9/5
 * Time: 下午1:17
 */
error_reporting(E_ALL | E_STRICT);

require "db.php";
require "config.php";
require "gen/genDto.php";

$db = new db('127.0.0.1','root','123456','carbond');
new genDto($db->getTables());