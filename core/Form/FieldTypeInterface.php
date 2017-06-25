<?php

namespace App\Core\Form;

/**
 *
 * @package App\Core\Form
 * @author ERRAK Karim <errakkarim@gmail.com>
 */
interface FieldTypeInterface
{
    const TEXT = "text";
    const PASSWORD = "password";
    const EMAIL = "email";
    const RADIO = "radio";
    const CHECKBOX = "checkbox";
    const TEXTAREA = "textarea";
    const SELECT = "select";
    const SUBMIT = "submit";
}
