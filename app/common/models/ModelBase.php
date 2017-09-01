<?php namespace Cms\Models;

class ModelBase extends \Phalcon\Mvc\Model
{

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->useDynamicUpdate(true);
    }
}
