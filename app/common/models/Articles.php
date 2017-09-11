<?php namespace Cms\Models;

class Articles extends ModelBase
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=20, nullable=false)
     */
    public $article_id;

    /**
     *
     * @var string
     * @Column(type="string", length=2000, nullable=false)
     */
    public $article_title;

    /**
     *
     * @var string
     * @Column(type="string", length=2000, nullable=true)
     */
    public $article_description;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $article_body;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $article_date;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $article_show_date;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $article_hide_date;

    /**
     *
     * @var string
     * @Column(type="string", length=2000, nullable=true)
     */
    public $article_image;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $article_type;

    /**
     *
     * @var integer
     * @Column(type="integer", length=20, nullable=false)
     */
    public $site_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=20, nullable=false)
     */
    public $user_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=20, nullable=false)
     */
    public $category_id;

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
        parent::initialize();

        // $this->setSchema("phalcon-cms");
        $this->setSource("articles");
        $this->hasMany('article_id', 'ArticlesArticles', 'article_id', ['alias' => 'ArticlesArticles']);
        $this->hasMany('article_id', 'ArticlesArticles', 'article_id_child', ['alias' => 'ArticlesArticlesChild']);
        $this->hasMany('article_id', 'ArticlesCategories', 'article_id', ['alias' => 'ArticlesCategories']);
        $this->hasMany('article_id', 'Sections', 'article_id', ['alias' => 'Sections']);
        $this->belongsTo('category_id', 'Cms\Models\Categories', 'category_id', ['alias' => 'Categories']);
        $this->belongsTo('site_id', 'Cms\Models\Sites', 'site_id', ['alias' => 'Sites']);
        $this->belongsTo('user_id', 'Cms\Models\Users', 'user_id', ['alias' => 'Users']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Articles[]|Articles|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Articles|\Phalcon\Mvc\Model\ResultInterface
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
        return 'articles';
    }
}
