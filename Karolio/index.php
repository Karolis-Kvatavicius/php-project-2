<?php
include '../PhpConsole/__autoload.php';
PhpConsole\Helper::register(); // it will register global PC class
// ...
$var = 'Debug';
PC::debug($var, 'tag');
PC::tag($var);


