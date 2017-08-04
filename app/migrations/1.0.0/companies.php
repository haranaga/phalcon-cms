<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class CompaniesMigration_100
 */
class CompaniesMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('companies', [
                'columns' => [
                    new Column(
                        'company_id',
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
                        'company_name',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 200,
                            'after' => 'company_id'
                        ]
                    ),
                    new Column(
                        'company_trade_name',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 200,
                            'after' => 'company_name'
                        ]
                    ),
                    new Column(
                        'company_information',
                        [
                            'type' => Column::TYPE_TEXT,
                            'size' => 1,
                            'after' => 'company_trade_name'
                        ]
                    ),
                    new Column(
                        'company_status',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'default' => "0",
                            'size' => 11,
                            'after' => 'company_information'
                        ]
                    ),
                    new Column(
                        'company_start_at',
                        [
                            'type' => Column::TYPE_DATETIME,
                            'size' => 1,
                            'after' => 'company_status'
                        ]
                    ),
                    new Column(
                        'company_end_at',
                        [
                            'type' => Column::TYPE_DATETIME,
                            'size' => 1,
                            'after' => 'company_start_at'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['company_id'], 'PRIMARY')
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
