<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class SitesMigration_100
 */
class SitesMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('sites', [
                'columns' => [
                    new Column(
                        'site_id',
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
                        'site_name',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 1000,
                            'after' => 'site_id'
                        ]
                    ),
                    new Column(
                        'site_domain',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 1000,
                            'after' => 'site_name'
                        ]
                    ),
                    new Column(
                        'site_url',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 1000,
                            'after' => 'site_domain'
                        ]
                    ),
                    new Column(
                        'site_title',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 1000,
                            'after' => 'site_url'
                        ]
                    ),
                    new Column(
                        'site_description',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 2000,
                            'after' => 'site_title'
                        ]
                    ),
                    new Column(
                        'site_keywords',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 2000,
                            'after' => 'site_description'
                        ]
                    ),
                    new Column(
                        'site_status',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'size' => 11,
                            'after' => 'site_keywords'
                        ]
                    ),
                    new Column(
                        'site_created_at',
                        [
                            'type' => Column::TYPE_DATETIME,
                            'size' => 1,
                            'after' => 'site_status'
                        ]
                    ),
                    new Column(
                        'site_update_at',
                        [
                            'type' => Column::TYPE_DATETIME,
                            'size' => 1,
                            'after' => 'site_created_at'
                        ]
                    ),
                    new Column(
                        'user_id',
                        [
                            'type' => Column::TYPE_BIGINTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 20,
                            'after' => 'site_update_at'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['site_id'], 'PRIMARY'),
                    new Index('fk_sites_users_idx', ['user_id'], null)
                ],
                'references' => [
                    new Reference(
                        'fk_sites_users',
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
