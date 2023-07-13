<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HoleritesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HoleritesTable Test Case
 */
class HoleritesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HoleritesTable
     */
    public $Holerites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Holerites',
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
        $config = TableRegistry::getTableLocator()->exists('Holerites') ? [] : ['className' => HoleritesTable::class];
        $this->Holerites = TableRegistry::getTableLocator()->get('Holerites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Holerites);

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
