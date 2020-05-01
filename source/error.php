<?php
require_once "../vendor/autoload.php";
require_once "config.php";

$smarty->setCaching(Smarty::CACHING_LIFETIME_SAVED);
$smarty->display('error.tpl');