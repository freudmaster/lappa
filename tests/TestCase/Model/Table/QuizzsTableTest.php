<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuizzsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuizzsTable Test Case
 */
class QuizzsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuizzsTable
     */
    protected $Quizzs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Quizzs',
        'app.Levels',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Quizzs') ? [] : ['className' => QuizzsTable::class];
        $this->Quizzs = TableRegistry::getTableLocator()->get('Quizzs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Quizzs);

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
