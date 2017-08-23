<?php
namespace Cms\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element;
use Phalcon\Mvc\View\Simple as SimpleView;
use Phalcon\Mvc\View\Engine\Volt as Volt;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Hidden;
use Cms\Forms\Elements\Check;
use Cms\Forms\Elements\TextArea;
use Cms\Forms\Elements\RadioGroup;
use Cms\Forms\Elements\DateTimePicker;
use Cms\Forms\Elements\ImageManager;

class FormBase extends Form
{
    public $elements = [];
    public $model_messages;

    private $class = [
        'Text' => 'Phalcon\Forms\Element\Text',
        'Password' => 'Phalcon\Forms\Element\Password',
        'Hidden' => 'Phalcon\Forms\Element\Hidden',
        'Check' => 'Cms\Forms\Elements\Check',
        'TextArea' => 'Cms\Forms\Elements\TextArea',
        'RadioGroup' => 'Cms\Forms\Elements\RadioGroup',
        'DateTimePicker' => 'Cms\Forms\Elements\DateTimePicker',
        'ImageManager' => 'Cms\Forms\Elements\ImageManager',
        'Email' => 'Phalcon\Forms\Element\Email',
    ];
    public function initialize($element = null, $options = null)
    {
        $this->addDefaultElements();
    }
    protected function addDefaultElements()
    {
        if (count($this->elements)) {
            foreach ($this->elements as $name => $element_class) {
                $this->add(new $this->class[$element_class]($name));
            }
        }
    }
    public function renderHD($name, $options=null)
    {
        $element = $this->get($name);

        $default_options = [
            'label' => $this->t->_($name),
            'help' => '',
            'placeholder' => $this->t->_('Please input', ['name' => $this->t->_($name)]),
        ];

        // attributes
        if (is_array($options)) {
            $options = array_merge($default_options, $options);
        } else {
            $options = $default_options;
        }

        // set attribute from view
        foreach ($options as $key => $value) {
            if ($key != 'label' and $key != 'help') {
                $element->setAttribute($key, $value);
            }
        }

        // error messages from Validation and Model messages
        // Get any generated messages for the current element
        $msg = [];
        $has_error = false;
        if ($this->hasMessagesFor($name)) {
            $messages = $this->getMessagesFor($name);
            if (!empty($messages) and $messages->count()) {
                foreach ($messages as $message) {
                    $msg[] = $message->getMessage();
                    $has_error = true;
                }
            }
        }
        if (count($this->model_messages)) {
            foreach ($this->model_messages as $message) {
                if ($message->getField() == $name or $message->getField()[0] == $name) {
                    $msg[] = $message->getMessage();
                    $has_error = true;
                }
            }
        }

        // require
        $required = false;
        if (!empty($this->getValidation())) {
            $validators = $this->getValidation()->getValidators();
            if (count($validators)) {
                foreach ($validators as $vald) {
                    if ($vald[0] == $element->getName() and get_class($vald[1]) == 'Phalcon\Validation\Validator\PresenceOf') {
                        $required = true;
                        break;
                    }
                }
            }
        }


        /**
         * HTML Generate
         */
        // required mark
        $required_mark = '';
        if ($required) {
            $required_mark = '*';
        }

        // error
        $error_class = '';
        $error_message = '';
        if ($has_error) {
            $error_class = 'hd-color-error';
            $error_message = '';
            foreach ($msg as $message) {
                $error_message .= '<p>'.$message.'</p>';
            }
        }

        // help
        $help = '';
        if (!empty($options['help'])) {
            $help = '<p>'.$options['help'].'</p>';
        }

        $out = '
        <div class="hd-form-group '. $error_class.'">
            <label for="'.$name.'" class="hd-form-label">'.
            $this->t->_($name).$required_mark.
            '</label>
            '.$element->render().
            '<div class="hd-form-message" id="form-message-'.$name.'">'.$help.$error_message.'</div>
        </div>
        ';

        return $out;

        // $pview = clone $this->pview;
        // $params = [
        //     'element' => $element,
        //     'messages' => $msg,
        //     'help' => $options['help'],
        //     'required' => $required,
        // ];
        // $pview->render('element', $params);
        // // echo $pview->getActiveRenderPath();
        // return  $pview->getContent();
        // // zzzreturn $pview->getContent();
    }

    public function setModelMessages($model_messages)
    {
        $this->model_messages = $model_messages;
    }
}
