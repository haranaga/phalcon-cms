<?php
namespace Cms\Forms\Elements;

class Check extends \Phalcon\Forms\Element\Check
{
    public function render($attributes = null)
    {
        $name = $this->getName();

        $out = '<label for="'.$name.'">'.parent::render($attributes).'
        '.$this->getLabel().'
        </label>';

        return $out;
    }
}
