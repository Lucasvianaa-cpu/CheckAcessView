<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PontosHorasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PontosHorasTable Test Case
 */
class PontosHorasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PontosHorasTable
     */
    public $PontosHoras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PontosHoras',
        'app.HistoricosPontos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PontosHoras') ? [] : ['className' => PontosHorasTable::class];
        $this->PontosHoras = TableRegistry::getTableLocator()->get('PontosHoras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PontosHoras);

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
