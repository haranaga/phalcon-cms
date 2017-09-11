<?php namespace Cms\Models;

class ArticlesArticles extends ModelBase
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=20, nullable=false)
     */
    public $article_article_id;

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
    public $article_id_child;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $article_article_type;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();

        // $this->setSchema("phalcon-cms");
        $this->setSource("articles_articles");
        $this->belongsTo('article_id', 'Cms\Models\Articles', 'article_id', ['alias' => 'Articles']);
        $this->belongsTo('article_id_child', 'Cms\Models\Articles', 'article_id', ['alias' => 'Articles']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ArticlesArticles[]|ArticlesArticles|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ArticlesArticles|\Phalcon\Mvc\Model\ResultInterface
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
        return 'articles_articles';
    }
}
