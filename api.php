<?php
/**
 *  index.php API 入口
 *
 * @lastmodify            2013-05-01
 * @copyright            (C) 2005-2010 PHPCMS
 * @license                http://www.sz-it.com.cn/
 */
define('DR_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
include DR_PATH . 'caches/configs/base.php';

$op = isset($_GET['op']) && trim($_GET['op']) ? trim($_GET['op']) : exit('Operation can not be empty');
if (isset($_GET['callback']) && !preg_match('/^[a-zA-Z_][a-zA-Z0-9_]+$/', $_GET['callback']))
{
    unset($_GET['callback']);
}

if (!preg_match('/([^a-z_]+)/i', $op) && file_exists(DR_PATH . 'modules/_api/' . $op . '.php'))
{
    include DR_PATH . 'modules/_api/' . $op . '.php';
}
else
{
    exit('API handler does not exist');
}
