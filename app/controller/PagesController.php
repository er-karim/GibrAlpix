<?php

namespace App\Controllers;

use App\Core\App;

/**
 *
 * @package App\Controllers
 * @author ERRAK Karim <errakkarim@gmail.com>
 */
class PagesController
{
    public function home()
    {
        $content = "Test de form builder " . App::get('config')['site_url'];

        require 'app/views/index.view.php';
    }
}
