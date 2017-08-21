<?php
namespace Cms\Forms\Elements;

class TextArea extends \Phalcon\Forms\Element\TextArea
{
    public function render($attributes = null)
    {
        $name = $this->getName();
        \Phalcon\Di::getDefault()->get('assets')->addJs('bower_components/autosize/dist/autosize.min.js');
        \Phalcon\Di::getDefault()->get('assets')->addInlineJs('autosize($("#'.$name.'"));');
        return parent::render($attributes);
    }
}
