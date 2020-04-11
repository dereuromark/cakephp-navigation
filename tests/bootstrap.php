<?php
/**
 * Test runner bootstrap.
 *
 * Add additional configuration/setup your application needs when running
 * unit tests in this file.
 */

require dirname(__DIR__) . '/vendor/autoload.php';

//require dirname(__DIR__) . '/config/bootstrap.php';

$_SERVER['PHP_SELF'] = '/';

class_alias(Cake\Controller\Controller::class, 'App\Controller\AppController');
class_alias(Cake\View\View::class, 'App\View\AppView');
