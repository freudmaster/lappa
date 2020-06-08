<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserLanguagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserLanguagesTable Test Case
 */
class UserLanguagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserLanguagesTable
     */
    protected $UserLanguages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.UserLanguages',
        'app.Languages',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UserLanguages') ? [] : ['className' => UserLanguagesTable::class];
        $this->UserLanguages = TableRegistry::getTableLocator()->get('UserLanguages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->UserLanguages);

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
