<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MotsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MotsTable Test Case
 */
class MotsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MotsTable
     */
    protected $Mots;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Mots',
        'app.Categories',
        'app.Levels',
        'app.Favories',
        'app.Traductions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Mots') ? [] : ['className' => MotsTable::class];
        $this->Mots = TableRegistry::getTableLocator()->get('Mots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Mots);

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
