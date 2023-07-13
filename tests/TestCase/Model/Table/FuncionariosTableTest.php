<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FuncionariosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FuncionariosTable Test Case
 */
class FuncionariosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FuncionariosTable
     */
    public $Funcionarios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Funcionarios',
        'app.Cargos',
        'app.PlanosSaudes',
        'app.Empresas',
        'app.Users',
        'app.Equipamentos',
        'app.HistoricosPontos',
        'app.Holerites',
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
        $config = TableRegistry::getTableLocator()->exists('Funcionarios') ? [] : ['className' => FuncionariosTable::class];
        $this->Funcionarios = TableRegistry::getTableLocator()->get('Funcionarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Funcionarios);

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
