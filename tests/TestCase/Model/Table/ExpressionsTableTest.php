<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExpressionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExpressionsTable Test Case
 */
class ExpressionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExpressionsTable
     */
    protected $Expressions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Expressions',
        'app.Categories',
        'app.Levels',
        'app.ExpressionTraduites',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Expressions') ? [] : ['className' => ExpressionsTable::class];
        $this->Expressions = TableRegistry::getTableLocator()->get('Expressions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Expressions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
