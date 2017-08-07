<?php namespace Cms\Models;

class Sections extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=20, nullable=false)
     */
    public $section_id;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    public $section_type;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $section_data;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $section_order;

    /**
     *
     * @var integer
     * @Column(type="integer", length=20, nullable=false)
     */
    public $article_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        // $this->setSchema("phalcon-cms");
        $this->setSource("sections");
        $this->belongsTo('article_id', 'Cms\Models\Articles', 'article_id', ['alias' => 'Articles']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sections[]|Sections|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sections|\Phalcon\Mvc\Model\ResultInterface
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
        return 'sections';
    }

}
