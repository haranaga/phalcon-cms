<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class ArticlesArticlesMigration_100
 */
class ArticlesArticlesMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('articles_articles', [
                'columns' => [
                    new Column(
                        'article_article_id',
                        [
                            'type' => Column::TYPE_BIGINTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'autoIncrement' => true,
                            'size' => 20,
                            'first' => true
                        ]
                    ),
                    new Column(
                        'article_id',
                        [
                            'type' => Column::TYPE_BIGINTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 20,
                            'after' => 'article_article_id'
                        ]
                    ),
                    new Column(
                        'article_id_child',
                        [
                            'type' => Column::TYPE_BIGINTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 20,
                            'after' => 'article_id'
                        ]
                    ),
                    new Column(
                        'article_article_type',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'default' => "0",
                            'notNull' => true,
                            'size' => 11,
                            'after' => 'article_id_child'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['article_article_id'], 'PRIMARY'),
                    new Index('fk_articles_articles_article_idx', ['article_id'], null),
                    new Index('fk_articles_articles_article_idx_child', ['article_id_child'], null)
                ],
                'references' => [
                    new Reference(
                        'fk_articles_articles_articles',
                        [
                            'referencedTable' => 'articles',
                            'columns' => ['article_id'],
                            'referencedColumns' => ['article_id'],
                            'onUpdate' => 'NO ACTION',
                            'onDelete' => 'NO ACTION'
                        ]
                    ),
                    new Reference(
                        'fk_articles_articles_articles_child',
                        [
                            'referencedTable' => 'articles',
                            'columns' => ['article_id_child'],
                            'referencedColumns' => ['article_id'],
                            'onUpdate' => 'NO ACTION',
                            'onDelete' => 'NO ACTION'
                        ]
                    )
                ],
                'options' => [
                    'TABLE_TYPE' => 'BASE TABLE',
                    'AUTO_INCREMENT' => '',
                    'ENGINE' => 'InnoDB',
                    'TABLE_COLLATION' => 'utf8mb4_general_ci'
                ],
            ]
        );
    }

    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {

    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {

    }

}
