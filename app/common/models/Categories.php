<?php namespace Cms\Models;

class Categories extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=20, nullable=false)
     */
    public $category_id;

    /**
     *
     * @var string
     * @Column(type="string", length=1000, nullable=false)
     */
    public $category_title;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=false)
     */
    public $category_slug;

    /**
     *
     * @var integer
     * @Column(type="integer", length=20, nullable=false)
     */
    public $site_id;

    /**
     * is in trash box
     * @var integer 0 or 1
     */
    public $is_trash;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        // $this->setSchema("phalcon-cms");
        $this->setSource("categories");
        $this->hasMany('category_id', 'Articles', 'category_id', ['alias' => 'Articles']);
        $this->hasMany('category_id', 'ArticlesCategories', 'category_id', ['alias' => 'ArticlesCategories']);
        $this->hasMany('category_id', 'CategoriesCategories', 'category_id', ['alias' => 'CategoriesCategories']);
        $this->hasMany('category_id', 'CategoriesCategories', 'category_id_child', ['alias' => 'CategoriesCategoriesChild']);
        $this->belongsTo('site_id', 'Cms\Models\Sites', 'site_id', ['alias' => 'Sites']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Categories[]|Categories|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Categories|\Phalcon\Mvc\Model\ResultInterface
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
        return 'categories';
    }
}
