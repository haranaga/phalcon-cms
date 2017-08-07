<?php namespace Cms\Models;

class CategoriesCategories extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=20, nullable=false)
     */
    public $category_category_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=20, nullable=false)
     */
    public $category_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=20, nullable=false)
     */
    public $category_id_child;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        // $this->setSchema("phalcon-cms");
        $this->setSource("categories_categories");
        $this->belongsTo('category_id', 'Cms\Models\Categories', 'category_id', ['alias' => 'Categories']);
        $this->belongsTo('category_id_child', 'Cms\Models\Categories', 'category_id', ['alias' => 'Categories']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CategoriesCategories[]|CategoriesCategories|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CategoriesCategories|\Phalcon\Mvc\Model\ResultInterface
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
        return 'categories_categories';
    }

}
