<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FuncionariosPlantoesFixture
 */
class FuncionariosPlantoesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'funcionario_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'plantao_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'funcionario_plantao_idx' => ['type' => 'index', 'columns' => ['funcionario_id'], 'length' => []],
            'funcionario_plantao_1_idx' => ['type' => 'index', 'columns' => ['plantao_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'funcionario_plantao' => ['type' => 'foreign', 'columns' => ['funcionario_id'], 'references' => ['funcionarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'plantao_plantao' => ['type' => 'foreign', 'columns' => ['plantao_id'], 'references' => ['plantoes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb3_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'funcionario_id' => 1,
                'plantao_id' => 1,
            ],
        ];
        parent::init();
    }
}
