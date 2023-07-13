<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HistoricosPontosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HistoricosPontosTable Test Case
 */
class HistoricosPontosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HistoricosPontosTable
     */
    public $HistoricosPontos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.HistoricosPontos',
        'app.Funcionarios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('HistoricosPontos') ? [] : ['className' => HistoricosPontosTable::class];
        $this->HistoricosPontos = TableRegistry::getTableLocator()->get('HistoricosPontos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HistoricosPontos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
