<?php

/**
 * Start point of our app
 *
 * @author ERRAK Karim <errakkarim@gmail.com>
 */

require 'vendor/autoload.php';
require 'core/bootstrap.php';

use App\Core\App;
use App\Core\Request;
use App\Core\Router;

Router::load('app/routes.php')
    ->direct(Request::uri(App::get('config')['project_folder_name']), Request::type());
