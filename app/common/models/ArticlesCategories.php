<?php namespace Cms\Models;

class ArticlesCategories extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=20, nullable=false)
     */
    public $article_category_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=20, nullable=false)
     */
    public $article_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=20, nullable=false)
     */
    public $category_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        // $this->setSchema("phalcon-cms");
        $this->setSource("articles_categories");
        $this->belongsTo('category_id', 'Cms\Models\Categories', 'category_id', ['alias' => 'Categories']);
        $this->belongsTo('article_id', 'Cms\Models\Articles', 'article_id', ['alias' => 'Articles']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ArticlesCategories[]|ArticlesCategories|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ArticlesCategories|\Phalcon\Mvc\Model\ResultInterface
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
        return 'articles_categories';
    }
}
