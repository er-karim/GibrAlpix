<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Form\FormBuilder;

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

        $form_builder = FormBuilder::getInstance();

        $first_name_options = [
            'class' => 'form-control',
            'id' => 'first-name',
            'placeholder' => 'Nom',
        ];
        $last_name_options = [
            'class' => 'form-control',
            'id' => 'last-name',
            'placeholder' => 'Prénom',
        ];
        $email_options = [
            'class' => 'form-control',
            'id' => 'email',
            'placeholder' => 'Email',
        ];
        $password_options = [
            'class' => 'form-control',
            'id' => 'password',
            'placeholder' => 'Mot de passe',
        ];
        $resume_options = [
            'class' => 'form-control',
            'id' => 'firstName',
            'row' => '5',
            'data' => ['target' => 'test'],
            'placeholder' => 'Déscription',
        ];
        $select_options = [
            'class' => 'form-control',
            'id' => 'level',
            'select-options' => ['Bac+1' => 'Bac+1', 'Bac+2' => 'Bac+2', 'Bac+3' => 'Bac+3', 'Bac+4' => 'Bac+4', 'Bac+5' => 'Bac+5'],
        ];
        $submit_options = [
            'class' => 'btn btn-primary pull-right',
            'id' => 'submit',
            'value' => 'Envoyé',
        ];

        $form = $form_builder
            ->open(['method' => 'post', 'action' => 'send'])
            ->addField('firstname', FormBuilder::TEXT, $first_name_options)
            ->addField('lastname', FormBuilder::TEXT, $last_name_options)
            ->addField('email', FormBuilder::EMAIL, $email_options)
            ->addField('password', FormBuilder::PASSWORD, $password_options)
            ->addField('resume', FormBuilder::TEXTAREA, $resume_options)
            ->addField('level', FormBuilder::SELECT, $select_options)
            ->addField('submit', FormBuilder::SUBMIT, $submit_options)
            ->build()
            ->getForm();

        require 'app/views/index.view.php';
    }

    public function getPost()
    {
        $site_url = App::get('config')['site_url'];

        extract($_POST);

        require 'app/views/info.view.php';
    }
}
