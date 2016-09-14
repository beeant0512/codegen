
<?php
/**
 * User: xiaobiao
 * Date: 16/9/5
 * Time: 下午1:17
 */
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL | E_STRICT);

require "db.php";
require "config.php";
require "gen/genDto.php";

if ($_POST) {
    $db = new db($_POST['host'], $_POST['username'], $_POST['password'], $_POST['database']);
    include "www/db.php";
} else {
    include "www/login.html";
}