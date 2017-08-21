<?php
namespace Cms\Forms\Elements;

class ImageManager extends \Phalcon\Forms\Element\Text
{
    public $option;

    public function __construct($elementName, $attributes = [])
    {
        parent::__construct($elementName, $attributes);

        $this->setName($elementName);
        $this->option['displayType'] = 'org'; //default

        $config = \Phalcon\Di::getDefault()->get('config');
        $this->option['url'] = \Phalcon\Di::getDefault()->get('url')->get($config->application->imageUri);
        $this->option['action'] = \Phalcon\Di::getDefault()->get('url')->get($config->backendUri.'/'.$config->application->uploadUri);
    }

    public function setAttribute($attr, $value)
    {
        parent::setAttribute($attr, $value);
        if (!empty($value)) {
            if ($attr === 'value') {
                $this->option['default'] = $value;
            }
        }
    }

    public function setDefault($value)
    {
        parent::setDefault($value);
        $this->option['default'] = $value;
    }

    public function url($value)
    {
        //return $this->option['url'].'/'.$this->option['displayType'].'/'.$value;
        return $this->option['url'].$this->option['displayType'].'/'.$value;
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
                if ($attrName == 'multi') {
                    $this->option['multi'] = $attrValue;
                }
                if ($attrName == 'viewer') {
                    $this->option['viewer'] = $attrValue;
                }
                if ($attrName == 'width') {
                    $this->option['displayWidth'] = $attrValue;
                }
                if ($attrName == 'height') {
                    $this->option['displayHeight'] = $attrValue;
                }
                if ($attrName == 'type') {
                    $this->option['displayType'] = $attrValue;
                }
                $html_attributes .= ' '.$attrName.'="'.$attrValue.'"';
            }
        }


        $option_json = json_encode($this->option);

        $name = $this->getName();

        \Phalcon\Di::getDefault()->get('assets')->addJs('js/backend/jquery.upimageform.js');
        \Phalcon\Di::getDefault()->get('assets')->addInlineJs("$('#$name').upimageform($option_json);");

        $html = <<<EOF
            <div id="$name"></div>
EOF;

        return $html;
    }
}
