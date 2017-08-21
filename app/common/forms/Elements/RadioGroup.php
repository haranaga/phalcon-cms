<?php

namespace Cms\Forms\Elements;

class RadioGroup extends \Phalcon\Forms\Element
{
    private $checked = null;
    /**
     * More decoration than the regular render, does similar things, probably incomplete.
     * Supported attributes:
     * string   `label`             The entire group's label
     * array    `elements`      Key, value associated array
     * string   `class`             The CSS selectors for each HTML LABEL element
     *
     * @param array $attributes Render time attributes, will override what was set earlier.
     * @return string A set of HTML radio elements.
     */
    public function __construct($elementName, $attributes = [])
    {
        //  $this->setName($elementName,$attributes);
        parent::__construct($elementName, $attributes);
    }

    public function render($attributes = [])
    {
        // Overrides any attribute set earlier
        if (!empty($attributes)) {
            foreach ($attributes as $key => $val) {
                $this->setAttribute($key, $val);
            }
        }

        $attr = $this->getAttributes();
        $rendered = "";
        $cssClass = '';
        $t = \Phalcon\Di::getDefault()->get('dictionary')->model;
        if (!empty($attr['elements'])) {
            $eleName = $this->getName() . '_';
            $rendered = '<div class="form-control">';
            foreach ($attr['elements'] as $key => $label) {
                $checked = '';
                if ($key == $this->getValue()) {
                    $checked = ' checked="true"';
                }
                // 選択肢の翻訳
                // $dictionary = \Phalcon\Di::getDefault()->get('dictionary')->form;
                // if (property_exists($dictionary, $label)) {
                //     $label = $dictionary->{$label};
                // }
                $rendered .= '<div class="form-check">';
                $rendered .= '<label class="form-check-label" for="'.$eleName . $key.'"'.$cssClass.'><input class="form-check-input" type="radio"'.$checked.' id="'.$eleName . $key. '" name="'.$this->getName().'" value="'.$key.'"> ' .$label . '</label>' ;
                $rendered .= '</div>';
            }
            $rendered .= "</div><!-- .radio -->";
        }
        return $rendered;
    }
}
