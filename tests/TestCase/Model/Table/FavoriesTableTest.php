<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FavoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FavoriesTable Test Case
 */
class FavoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FavoriesTable
     */
    protected $Favories;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Favories',
        'app.Users',
        'app.Mots',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Favories') ? [] : ['className' => FavoriesTable::class];
        $this->Favories = TableRegistry::getTableLocator()->get('Favories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Favories);

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
