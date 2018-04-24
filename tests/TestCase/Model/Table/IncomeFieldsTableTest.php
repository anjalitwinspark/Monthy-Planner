<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IncomeFieldsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IncomeFieldsTable Test Case
 */
class IncomeFieldsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IncomeFieldsTable
     */
    public $IncomeFields;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.income_fields',
        'app.roles',
        'app.incomes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('IncomeFields') ? [] : ['className' => IncomeFieldsTable::class];
        $this->IncomeFields = TableRegistry::get('IncomeFields', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IncomeFields);

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
