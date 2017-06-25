<?php

namespace App\Core\Form;

/**
 * FormBuilder class file
 *
 * @package App\Core\Form
 * @author ERRAK Karim <errakkarim@gmail.com>
 */
class FormBuilder
{
    protected static $_instance;

    protected $formContainer = '';

    /**
     * get instance of FormBuilder
     * @return FormBuilder
     */
    public static function getInstance()
    {
        if (is_null(static::$_instance)) {
            static::$_instance = new FormBuilder;
        }

        return static::$_instance;
    }

    /**
     * open a new form
     * @param  array $form_data
     * @return FormBuilder
     */
    public function open($form_data)
    {
        if (!is_array($form_data) || empty($form_data)) {
            throw new Exception("Error Argument is not an array");
        }

        $this->formContainer = '<form';

        foreach ($form_data as $key => $value) {
            $this->formContainer .= sprintf(' %s="%s"', $key, $value);
        }
        $this->formContainer .= '>';

        return $this;
    }

    /**
     * add new field to the form
     * @param string $field_name
     * @param string $field_type
     * @param array $field_options
     * @return FormBuilder
     */
    public function addField($field_name, $field_type, $field_options = [])
    {
        $this->formContainer .= '<div class="form-group">';
        switch ($field_type) {
            case FieldTypeInterface::TEXTAREA:
                $this->formContainer .= '<textarea';
                break;
            case FieldTypeInterface::SELECT:
                $this->formContainer .= '<select';
                break;
            default:
                if ($field_type == FieldTypeInterface::CHECKBOX || $field_type == FieldTypeInterface::RADIO) {
                    $this->formContainer .= sprintf('<div class="%s"><label>', $field_type);
                }
                $this->formContainer .= sprintf('<input type="%s"', $field_type);
                break;
        }

        $this->formContainer .= sprintf(' name="%s"', $field_name);

        $select_options = false;
        if (array_key_exists('select-options', $field_options)) {
            $select_options = $field_options['select-options'];
            unset($field_options['select-options']);
        }

        if (array_key_exists('data', $field_options)) {
            $data = $field_options['data'];
            unset($field_options['data']);
            foreach ($data as $key => $value) {
                $field_options['data-' . $key] = $value;
            }
        }

        $field_value = '';
        if (array_key_exists('value', $field_options)) {
            $field_value = $field_options['value'];
            unset($field_options['value']);
        }

        $field_label = '';
        if (array_key_exists('label', $field_options)) {
            $field_label = $field_options['label'];
            unset($field_options['label']);
        }

        foreach ($field_options as $key => $value) {
            $this->formContainer .= sprintf(' %s="%s"', $key, $value);
        }

        switch ($field_type) {
            case FieldTypeInterface::TEXTAREA:
                $this->formContainer .= sprintf('>%s</textarea>', $field_value);
                break;
            case FieldTypeInterface::SELECT:
                $this->formContainer .= '>';
                if ($select_options) {
                    foreach ($select_options as $key => $value) {
                        $checked = ($field_value == $key) ? 'checked' : '';
                        $this->formContainer .= sprintf('<option value="%s" %s>%s</option>', $key, $checked, $value);
                    }
                }
                $this->formContainer .= '</select>';
                break;
            default:
                if ($field_type == FieldTypeInterface::CHECKBOX) {
                    $this->formContainer .= sprintf('>%s</label></div>', $field_label);
                } elseif ($field_type == FieldTypeInterface::RADIO) {
                    $this->formContainer .= sprintf('value="%s">%s</label></div>', $field_value, $field_label);
                } else {
                    $this->formContainer .= sprintf('value="%s">', $field_value);
                }
                break;
        }

        $this->formContainer .= '</div>';
        return $this;
    }

    /**
     * close form
     * @return FormBuilder
     */
    public function close()
    {
        $this->formContainer .= '</form>';
    }

    public function getForm()
    {
        return $this->formContainer;
    }
}
