<?php

namespace App\Controllers;

/**
 *
 * @package App\Controllers
 * @author ERRAK Karim <errakkarim@gmail.com>
 */
class DefaultController
{
    public function home()
    {
        $content = 'test';

        require 'app/views/index.view.php';
    }
}
