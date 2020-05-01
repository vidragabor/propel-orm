<?php

use Propel\Runtime\Connection\ConnectionManagerSingle;
use Propel\Runtime\Propel;

$serviceContainer = Propel::getServiceContainer();
$serviceContainer->checkVersion('2.0.0-dev');
$serviceContainer->setAdapterClass('default', 'mysql');
$manager = new ConnectionManagerSingle();
$manager->setConfiguration(array (
  'dsn' => 'mysql:host=db;port=3306;dbname=propelorm',
  'user' => 'propel',
  'password' => 'pw1234',
  'settings' =>
  array (
    'charset' => 'utf8',
    'queries' =>
    array (
    ),
  ),
  'classname' => '\\Propel\\Runtime\\Connection\\ConnectionWrapper',
  'model_paths' =>
  array (
    0 => 'src',
    1 => 'vendor',
  ),
));
$manager->setName('default');
$serviceContainer->setConnectionManager('default', $manager);
$serviceContainer->setDefaultDatasource('default');

$smarty = new Smarty();
$smarty->setTemplateDir('../templates');
$smarty->setCompileDir('../templates/compile');
$smarty->setCacheDir('../templates/cache');
$smarty->setConfigDir('../templates/config');