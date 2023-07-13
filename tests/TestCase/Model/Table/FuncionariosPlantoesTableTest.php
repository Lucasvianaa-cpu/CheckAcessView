<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FuncionariosPlantoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FuncionariosPlantoesTable Test Case
 */
class FuncionariosPlantoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FuncionariosPlantoesTable
     */
    public $FuncionariosPlantoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FuncionariosPlantoes',
        'app.Funcionarios',
        'app.Plantoes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FuncionariosPlantoes') ? [] : ['className' => FuncionariosPlantoesTable::class];
        $this->FuncionariosPlantoes = TableRegistry::getTableLocator()->get('FuncionariosPlantoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FuncionariosPlantoes);

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
