<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class CategoriesMigration_100
 */
class CategoriesMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('categories', [
                'columns' => [
                    new Column(
                        'category_id',
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
                        'category_title',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 1000,
                            'after' => 'category_id'
                        ]
                    ),
                    new Column(
                        'category_slug',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 200,
                            'after' => 'category_title'
                        ]
                    ),
                    new Column(
                        'site_id',
                        [
                            'type' => Column::TYPE_BIGINTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 20,
                            'after' => 'category_slug'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['category_id'], 'PRIMARY'),
                    new Index('fk_categories_sites_idx', ['site_id'], null)
                ],
                'references' => [
                    new Reference(
                        'fk_categories_sites',
                        [
                            'referencedTable' => 'sites',
                            'columns' => ['site_id'],
                            'referencedColumns' => ['site_id'],
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
