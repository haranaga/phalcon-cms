<?php namespace Cms\Models;

class Companies extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=20, nullable=false)
     */
    public $company_id;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $company_name;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $company_trade_name;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $company_information;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $company_status;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $company_start_at;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $company_end_at;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        // $this->setSchema("phalcon-cms");
        $this->setSource("companies");
        $this->hasMany('company_id', 'Sites', 'company_id', ['alias' => 'Sites']);
        $this->hasMany('company_id', 'Users', 'company_id', ['alias' => 'Users']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Companies[]|Companies|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Companies|\Phalcon\Mvc\Model\ResultInterface
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
        return 'companies';
    }

}
