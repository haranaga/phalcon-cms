<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class ArticlesMigration_100
 */
class ArticlesMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('articles', [
                'columns' => [
                    new Column(
                        'article_id',
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
                        'article_title',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 2000,
                            'after' => 'article_id'
                        ]
                    ),
                    new Column(
                        'article_description',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 2000,
                            'after' => 'article_title'
                        ]
                    ),
                    new Column(
                        'article_body',
                        [
                            'type' => Column::TYPE_TEXT,
                            'size' => 1,
                            'after' => 'article_description'
                        ]
                    ),
                    new Column(
                        'article_date',
                        [
                            'type' => Column::TYPE_DATETIME,
                            'size' => 1,
                            'after' => 'article_body'
                        ]
                    ),
                    new Column(
                        'article_show_date',
                        [
                            'type' => Column::TYPE_DATETIME,
                            'size' => 1,
                            'after' => 'article_date'
                        ]
                    ),
                    new Column(
                        'article_hide_date',
                        [
                            'type' => Column::TYPE_DATETIME,
                            'size' => 1,
                            'after' => 'article_show_date'
                        ]
                    ),
                    new Column(
                        'article_image',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 2000,
                            'after' => 'article_hide_date'
                        ]
                    ),
                    new Column(
                        'article_type',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'default' => "0",
                            'notNull' => true,
                            'size' => 11,
                            'after' => 'article_image'
                        ]
                    ),
                    new Column(
                        'site_id',
                        [
                            'type' => Column::TYPE_BIGINTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 20,
                            'after' => 'article_type'
                        ]
                    ),
                    new Column(
                        'user_id',
                        [
                            'type' => Column::TYPE_BIGINTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 20,
                            'after' => 'site_id'
                        ]
                    ),
                    new Column(
                        'category_id',
                        [
                            'type' => Column::TYPE_BIGINTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 20,
                            'after' => 'user_id'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['article_id'], 'PRIMARY'),
                    new Index('fk_articles_sites_idx', ['site_id'], null),
                    new Index('fk_articles_users_idx', ['user_id'], null),
                    new Index('fk_articles_categories_idx', ['category_id'], null)
                ],
                'references' => [
                    new Reference(
                        'fk_articles_categories',
                        [
                            'referencedTable' => 'categories',
                            'columns' => ['category_id'],
                            'referencedColumns' => ['category_id'],
                            'onUpdate' => 'NO ACTION',
                            'onDelete' => 'NO ACTION'
                        ]
                    ),
                    new Reference(
                        'fk_articles_sites',
                        [
                            'referencedTable' => 'sites',
                            'columns' => ['site_id'],
                            'referencedColumns' => ['site_id'],
                            'onUpdate' => 'NO ACTION',
                            'onDelete' => 'NO ACTION'
                        ]
                    ),
                    new Reference(
                        'fk_articles_users',
                        [
                            'referencedTable' => 'users',
                            'columns' => ['user_id'],
                            'referencedColumns' => ['user_id'],
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
