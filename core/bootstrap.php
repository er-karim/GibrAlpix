<?php

/**
 * Global app bootstrap file
 *
 * @author ERRAK Karim <errakkarim@gmail.com>
 */

use App\Core\App;

App::bind('config', require 'config.php');
