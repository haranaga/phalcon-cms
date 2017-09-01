<?php namespace Cms\Models;

class Sites extends ModelBase
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=20, nullable=false)
     */
    public $site_id;

    /**
     *
     * @var string
     * @Column(type="string", length=1000, nullable=false)
     */
    public $site_name;

    /**
     *
     * @var string
     * @Column(type="string", length=1000, nullable=false)
     */
    public $site_domain;

    /**
     *
     * @var string
     * @Column(type="string", length=1000, nullable=true)
     */
    public $site_url;

    /**
     *
     * @var string
     * @Column(type="string", length=1000, nullable=true)
     */
    public $site_title;

    /**
     *
     * @var string
     * @Column(type="string", length=2000, nullable=true)
     */
    public $site_description;

    /**
     *
     * @var string
     * @Column(type="string", length=2000, nullable=true)
     */
    public $site_keywords;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $site_status;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $site_created_at;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $site_update_at;

    /**
     *
     * @var integer
     * @Column(type="integer", length=20, nullable=false)
     */
    public $user_id;


    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        // $this->setSchema("phalcon-cms");
        $this->setSource("sites");
        $this->hasMany('site_id', 'Articles', 'site_id', ['alias' => 'Articles']);
        $this->hasMany('site_id', 'Categories', 'site_id', ['alias' => 'Categories']);
        $this->hasMany('site_id', 'Options', 'site_id', ['alias' => 'Options']);
        $this->hasMany('site_id', 'Users', 'site_id', ['alias' => 'Users']);
        $this->belongsTo('user_id', 'Cms\Models\Users', 'user_id', ['alias' => 'Users']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sites[]|Sites|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sites|\Phalcon\Mvc\Model\ResultInterface
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
        return 'sites';
    }
}
