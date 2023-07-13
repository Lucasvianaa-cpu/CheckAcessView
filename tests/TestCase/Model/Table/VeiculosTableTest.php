<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VeiculosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VeiculosTable Test Case
 */
class VeiculosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VeiculosTable
     */
    public $Veiculos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Veiculos',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Veiculos') ? [] : ['className' => VeiculosTable::class];
        $this->Veiculos = TableRegistry::getTableLocator()->get('Veiculos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Veiculos);

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
