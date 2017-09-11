<?php namespace Cms\Models;

class Options extends ModelBase
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=20, nullable=false)
     */
    public $option_id;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=false)
     */
    public $option_name;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $option_value;

    /**
     *
     * @var integer
     * @Column(type="integer", length=20, nullable=false)
     */
    public $site_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();

        // $this->setSchema("phalcon-cms");
        $this->setSource("options");
        $this->belongsTo('site_id', 'Cms\Models\Sites', 'site_id', ['alias' => 'Sites']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Options[]|Options|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Options|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'options';
    }
}
