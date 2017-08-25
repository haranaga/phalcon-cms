<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class CategoriesCategoriesMigration_100
 */
class CategoriesCategoriesMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('categories_categories', [
                'columns' => [
                    new Column(
                        'category_category_id',
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
                        'category_id',
                        [
                            'type' => Column::TYPE_BIGINTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 20,
                            'after' => 'category_category_id'
                        ]
                    ),
                    new Column(
                        'category_id_child',
                        [
                            'type' => Column::TYPE_BIGINTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 20,
                            'after' => 'category_id'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['category_category_id'], 'PRIMARY'),
                    new Index('fk_categories_categories_categories_idx', ['category_id'], null),
                    new Index('fk_categories_categories_categories_idx_child', ['category_id_child'], null)
                ],
                'references' => [
                    new Reference(
                        'fk_categories_categories_categories',
                        [
                            'referencedTable' => 'categories',
                            'columns' => ['category_id'],
                            'referencedColumns' => ['category_id'],
                            'onUpdate' => 'NO ACTION',
                            'onDelete' => 'NO ACTION'
                        ]
                    ),
                    new Reference(
                        'fk_categories_categories_categories_child',
                        [
                            'referencedTable' => 'categories',
                            'columns' => ['category_id_child'],
                            'referencedColumns' => ['category_id'],
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
