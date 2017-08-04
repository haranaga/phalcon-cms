<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class ArticlesCategoriesMigration_100
 */
class ArticlesCategoriesMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('articles_categories', [
                'columns' => [
                    new Column(
                        'article_category_id',
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
                            'after' => 'article_category_id'
                        ]
                    ),
                    new Column(
                        'category_id',
                        [
                            'type' => Column::TYPE_BIGINTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 20,
                            'after' => 'article_id'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['article_category_id'], 'PRIMARY'),
                    new Index('fk_articles_categories_articles_idx', ['article_id'], null),
                    new Index('fk_articles_categories_categories_idx', ['category_id'], null)
                ],
                'references' => [
                    new Reference(
                        'fk_articles_categories_categories',
                        [
                            'referencedTable' => 'categories',
                            'columns' => ['category_id'],
                            'referencedColumns' => ['category_id'],
                            'onUpdate' => 'NO ACTION',
                            'onDelete' => 'NO ACTION'
                        ]
                    ),
                    new Reference(
                        'fk_articles_categories_posts',
                        [
                            'referencedTable' => 'articles',
                            'columns' => ['article_id'],
                            'referencedColumns' => ['article_id'],
                            'onUpdate' => 'NO ACTION',
                            'onDelete' => 'NO ACTION'
                        ]
                    )
                ],
                'options' => [
                    'TABLE_TYPE' => 'BASE TABLE',
                    'AUTO_INCREMENT' => '1',
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
