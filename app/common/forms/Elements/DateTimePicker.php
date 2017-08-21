<?php
namespace Cms\Forms\Elements;

class DateTimePicker extends \Phalcon\Forms\Element\Text
{
    public function __construct($elementName)
    {
        $this->setName($elementName);
    }

    public function setAttribute($attr, $value)
    {
        parent::setAttribute($attr, $value);
        if (!empty($value)) {
            if ($attr === 'value') {
                parent::setAttribute($attr, date('Y-m-d H:i', strtotime($value)));
            }
        }
    }

    public function setDefault($value)
    {
        parent::setDefault(date('Y-m-d H:i', strtotime($value)));
    }

    public function render($attributes = null)
    {
        $attributes = $this->prepareAttributes($attributes);
        if (!empty($attributes)) {
            foreach ($attributes as $attrName => $attrValue) {
                $this->setAttribute($attrName, $attrValue);
            }
        }

        $attributes = $this->getAttributes();
        $html_attributes = '';
        if (!empty($attributes)) {
            foreach ($attributes as $attrName => $attrValue) {
                if ($attrName == '0') {
                    $attrName = 'id';
                    $input_id = $attrValue;
                }
                $html_attributes .= ' '.$attrName.'="'.$attrValue.'"';
            }
        }

        // $date_format = (!empty($attributes) && array_key_exists('data-date-format', $attributes) ? $attributes['data-date-format'] : 'dd.mm.yyyy');
        // $html = '<div class="input-group input-large date-picker input-daterange" data-date-format="'.$date_format.'"><input type="text" name="'.$this->getName().'_start"'; // data-date="10/11/2012"

        // echo $html_attributes; exit;

        $name = $this->getName();

        \Phalcon\Di::getDefault()->get('assets')->addJs('bower_components/datetimepicker/build/jquery.datetimepicker.full.min.js');
        // \Phalcon\Di::getDefault()->get('assets')->addJs('_components/php-date-formatter/js/php-date-formatter.min.js');
        \Phalcon\Di::getDefault()->get('assets')->addCss('bower_components/datetimepicker/jquery.datetimepicker.css');

        \Phalcon\Di::getDefault()->get('assets')->addInlineJs("
        $(function () {
            $.datetimepicker.setLocale('ja');
            $('#${name}').datetimepicker({
                format: 'Y-m-d H:i'
            });
            $('#${name}_icon').on('click',function(){
               $('#${name}').datetimepicker('show');
            })
        });
        ");


        $html = <<<EOF
            <div class='input-group date'>
                <input type='text' id="$name" name="$name" $html_attributes/>
                <span class="input-group-addon input-sm" id="${name}_icon">
                    <i class="fa fa-fw fa-calendar" aria-hidden="true"></i>
                </span>
            </div>
EOF;

        return $html;
    }
}
