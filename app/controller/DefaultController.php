<?php

namespace App\Controllers;

use App\Core\App;

/**
 *
 * @package App\Controllers
 * @author ERRAK Karim <errakkarim@gmail.com>
 */
class DefaultController
{
    public function home()
    {
        $site_url = App::get('config')['site_url'];

        require 'app/views/index.view.php';
    }
}
