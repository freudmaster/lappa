<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdministratorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdministratorsTable Test Case
 */
class AdministratorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdministratorsTable
     */
    protected $Administrators;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Administrators',
        'app.Roles',
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
        $config = TableRegistry::getTableLocator()->exists('Administrators') ? [] : ['className' => AdministratorsTable::class];
        $this->Administrators = TableRegistry::getTableLocator()->get('Administrators', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Administrators);

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
