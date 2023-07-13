<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlanosSaudesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlanosSaudesTable Test Case
 */
class PlanosSaudesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlanosSaudesTable
     */
    public $PlanosSaudes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PlanosSaudes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PlanosSaudes') ? [] : ['className' => PlanosSaudesTable::class];
        $this->PlanosSaudes = TableRegistry::getTableLocator()->get('PlanosSaudes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PlanosSaudes);

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
}
