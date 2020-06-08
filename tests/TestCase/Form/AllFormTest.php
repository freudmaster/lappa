<?php
declare(strict_types=1);

namespace App\Test\TestCase\Form;

use App\Form\AllForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\AllForm Test Case
 */
class AllFormTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Form\AllForm
     */
    protected $All;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->All = new AllForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->All);

        parent::tearDown();
    }
}
