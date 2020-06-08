<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExpressionTraduitesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExpressionTraduitesTable Test Case
 */
class ExpressionTraduitesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExpressionTraduitesTable
     */
    protected $ExpressionTraduites;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ExpressionTraduites',
        'app.Languages',
        'app.Expressions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ExpressionTraduites') ? [] : ['className' => ExpressionTraduitesTable::class];
        $this->ExpressionTraduites = TableRegistry::getTableLocator()->get('ExpressionTraduites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ExpressionTraduites);

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
