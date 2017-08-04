<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class SectionsMigration_100
 */
class SectionsMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('sections', [
                'columns' => [
                    new Column(
                        'section_id',
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
                        'section_type',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 100,
                            'after' => 'section_id'
                        ]
                    ),
                    new Column(
                        'section_data',
                        [
                            'type' => Column::TYPE_TEXT,
                            'size' => 1,
                            'after' => 'section_type'
                        ]
                    ),
                    new Column(
                        'section_order',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'default' => "0",
                            'size' => 11,
                            'after' => 'section_data'
                        ]
                    ),
                    new Column(
                        'article_id',
                        [
                            'type' => Column::TYPE_BIGINTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 20,
                            'after' => 'section_order'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['section_id'], 'PRIMARY'),
                    new Index('fk_sections_articles1_idx', ['article_id'], null)
                ],
                'references' => [
                    new Reference(
                        'fk_sections_articles1',
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
